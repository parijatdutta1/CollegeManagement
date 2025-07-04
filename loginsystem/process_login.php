<?php
// Secure headers

// Start a secure session
session_start();

// Include required files
require 'db_config.php';
require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Sanitize input
function sanitize_input($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['role'] = $_POST['role'];
    $role = sanitize_input($_POST['role'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($role === 'faculty') {
        $faculty_id = sanitize_input($_POST['faculty_id'] ?? '');
        if ($faculty_id && $password) {
            handleFacultyLogin($faculty_id, $password);
        }
    } elseif ($role === 'administrator' || $role === 'principal') {
        $email = sanitize_input($_POST['email'] ?? '');
        if ($email && $password) {
            handleAdminOrPrincipalLogin($role, $email, $password);
        }
    }
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
    window.onload = function() {
        Swal.fire({
            icon: 'error',
            title: 'Missing Fields',
            text: 'Please fill in all required fields before proceeding.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'loginindex.php';
        });
    };
    </script>";
    exit();
}

function handleFacultyLogin($faculty_id, $password) {
    global $conn;
    $prefix = explode('/', $faculty_id)[0];
    $table_name = $prefix . '_faculty';
    
    $stmt = $conn->prepare("SELECT * FROM $table_name WHERE faculty_id = ?");
    if (!$stmt) die("Query preparation failed: " . $conn->error);

    $stmt->bind_param('s', $faculty_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $faculty_data = $result->fetch_assoc();
        if ($password === $faculty_data['pass']) {
            sendOTP($faculty_data['email'], 'Faculty Portal', 'otp_verification.php', $faculty_id);
        }
    }
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
    window.onload = function() {
        Swal.fire({
            icon: 'error',
            title: 'invalid_credentials',
            text: 'Please fill correct details.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'loginindex.php';
        });
    };
    </script>";
    exit();
}

function handleAdminOrPrincipalLogin($role, $email, $password) {
    global $conn;
    $table = $role === 'administrator' ? 'administrators' : 'principal';
    $column = $role === 'administrator' ? 'password' : 'pass';

    $stmt = $conn->prepare("SELECT * FROM $table WHERE email = ? AND $column = ?");
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        sendOTP($email, ucfirst($role) . ' Login', 'otp_verification_' . $role . '.php', null);
    }
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
    window.onload = function() {
        Swal.fire({
            icon: 'error',
            title: 'invalid_credentials',
            text: 'Please fill correct details.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'loginindex.php';
        });
    };
    </script>";
    exit();
}

function sendOTP($email, $subject, $redirect, $id = null) {
    $otp = random_int(100000, 999999);
    $_SESSION['otp'] = $otp;
    if ($id) $_SESSION['faculty_id'] = $id;
    else $_SESSION['email'] = $email;

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'supriyojanaa@gmail.com';
        $mail->Password = 'udkzgwyqbxuduwut';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('supriyojanaa@gmail.com', $subject);
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Login';
        $mail->Body = "
    <div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 8px; text-align: center; max-width: 400px; margin: auto;'>
        <h2 style='color: #007BFF;'>Login OTP Verification</h2>
        <p style='font-size: 16px; color: #333;'>Use the OTP below to complete your login:</p>
        <p style='font-size: 22px; font-weight: bold; color: #28a745; background: #eafaea; padding: 10px; border-radius: 5px; display: inline-block;'>$otp</p>
        <p style='font-size: 14px; color: #555;'>This OTP is valid for <strong>5 minutes</strong>. Do not share it with anyone.</p>
        <p style='font-size: 12px; color: #888;'>If you didn't request this OTP, please ignore this email.</p>
    </div>
";

        $mail->send();

        header("Location: verify_otp.php");
        exit();
    } catch (Exception $e) {
        header('Location: loginindex.php?error=otp_failed');
        exit();
    }
}
