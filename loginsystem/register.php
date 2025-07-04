<?php
session_start();
require 'db_config.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include Composer's autoload file for PHPMailer
require 'vendor/autoload.php';

// Function to send the email
function sendRegistrationEmail($email, $faculty_id, $password) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'supriyojanaa@gmail.com';
        $mail->Password = 'udkzgwyqbxuduwut';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('supriyojanaa@gmail.com', 'Registration Mail'); // Replace with your sender email/name
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Faculty Registration Details';
        $mail->Body = "
            <h1>Registration Successful</h1>
            <p>Your registration was successful. Here are your details:</p>
            <ul>
                <li><strong>Faculty ID:</strong> $faculty_id</li>
                <li><strong>Password:</strong> $password</li>
            </ul>
            <p>Thank you for registering!</p>
        ";

        $mail->send();
        echo "<script>alert('Registration successful! Details sent to your email.'); window.location.href='loginindex.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Registration successful, but email could not be sent.');</script>";
    }
}

function sendPrincipalEmail($email, $password) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'supriyojanaa@gmail.com';
        $mail->Password = 'udkzgwyqbxuduwut';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('supriyojanaa@gmail.com', 'Registration Mail'); // Replace with your sender email/name
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Principal Registration Details';
        $mail->Body = "
            <h1>Registration Successful</h1>
            <p>Your registration was successful. Here is your password:</p>
            <ul>
                <li><strong>Password:</strong> $password</li>
            </ul>
            <p>Thank you for registering!</p>
        ";

        $mail->send();
        echo "<script>alert('Registration successful! Password sent to your email.'); window.location.href='loginindex.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Registration successful, but email could not be sent.');</script>";
    }
}
// Inside the faculty registration section



function isCollegeCodeValid($conn, $college_code) {
    $query = "SELECT COUNT(*) AS count FROM partner_colleges WHERE Code = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $college_code);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['count'] > 0;
}

// Helper function to generate faculty_id
function generateFacultyId($conn, $college_code) {
    $currentYear = date("Y");
    $tableName = "{$college_code}_faculty";

    $query = "SELECT faculty_id FROM $tableName ORDER BY created_at DESC LIMIT 1";
    $result = $conn->query($query);

    $nextId = 1;
    if ($result && $row = $result->fetch_assoc()) {
        $lastId = $row['faculty_id'];
        $lastNumber = intval(substr($lastId, -4));
        $nextId = $lastNumber + 1;
    }

    return sprintf("%s/%s/%04d", strtolower($college_code), $currentYear, $nextId);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    $role = $_POST['role'];
    $college_code = strtolower($_POST['college_code']); // Convert to lowercase

    if (!isCollegeCodeValid($conn, $college_code)) {
        echo "<script>alert('Invalid college code. Please try again.');</script>";
    }

    if ($role !== 'principal' && $role !== 'faculty') {
        echo "<script>alert('Invalid role selected.'); window.history.back();</script>";
        exit;
    }

    if ($role === 'faculty') {
        $email = strtolower($_POST['email']); // Convert to lowercase
        $full_name = $_POST['full_name'];
        $dept = strtolower($_POST['dept']); // Convert to lowercase
        $pass = $_POST['pass'];
        $created_at = date("Y-m-d H:i:s");

        // createFacultyTable($conn, $college_code);

        $faculty_id = generateFacultyId($conn, $college_code);
        $tableName = "{$college_code}_faculty";

        $query = "INSERT INTO $tableName (faculty_id, email, full_name, dept, pass, created_at)
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssss", $faculty_id, $email, $full_name, $dept, $pass, $created_at);
        if ($stmt->execute()) {
            // Faculty successfully registered
            $faculty_id = generateFacultyId($conn,$college_code); // Replace with the function generating faculty_id
            $password = $_POST['pass'];
            // Send email
            sendRegistrationEmail($email, $faculty_id, $password);
            // echo "<script>alert('Faculty registered successfully with ID: $faculty_id'); window.location.href='loginindex.php';</script>";
            
        } else {
            echo "<script>alert('Error: {$stmt->error}'); window.history.back();</script>";
        }
        $stmt->close();
    // Inside the principal section
} elseif ($role === 'principal') {
    $principal_name = $_POST['principal_name'];
    $email = strtolower($_POST['email']); // Convert to lowercase
    $pass = $_POST['pass']; // Principal password from the form
    $created_at = date("Y-m-d H:i:s"); // Capture current timestamp
    $tableName = "principal";

    // Insert query to save the principal details
    $query = "INSERT INTO $tableName (college_code, principal_name, email, pass, created_at)
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $college_code, $principal_name, $email, $pass, $created_at);

    if ($stmt->execute()) {
        $pass = $_POST['pass'];
        // Send the email with the password to the principal
        sendPrincipalEmail($email, $pass); // Use $pass directly here
        //echo "<script>alert('Principal registered successfully. Password sent to the email.'); window.location.href='loginindex.php';</script>";
    } else {
        error_log("Principal Insert Error: " . $stmt->error);
        echo "<script>alert('Error: {$stmt->error}'); window.history.back();</script>";
    }
    $stmt->close();
}

}


$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form id="registerForm" action="" method="POST">
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="" disabled selected>Select Role</option>
                <option value="faculty">Faculty</option>
                <option value="principal">Principal</option>
            </select>

            <label for="college_code">College Code:</label>
            <input type="text" id="college_code" name="college_code" required>

            <!-- Faculty fields -->
            <div id="faculty-fields" style="display:none;">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" required>

                <label for="dept">Department:</label>
                <input type="text" id="dept" name="dept" required>
            </div>

            <!-- Principal fields -->
            <div id="principal-fields" style="display:none;">
                <label for="principal_name">Principal Name:</label>
                <input type="text" id="principal_name" name="principal_name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <label for="pass">Password:</label>
            <input type="password" id="pass" name="pass" required>

            <label for="confirm_pass">Confirm Password:</label>
            <input type="password" id="confirm_pass" name="confirm_pass" required>

            <button type="submit">Register</button>
            <p id="passwordError" class="error" style="display:none;">Passwords do not match!</p>
        </form>
    </div>

    <script>
        const roleSelect = document.getElementById('role');
        const facultyFields = document.getElementById('faculty-fields');
        const principalFields = document.getElementById('principal-fields');
        const registerForm = document.getElementById('registerForm');
        const pass = document.getElementById('pass');
        const confirmPass = document.getElementById('confirm_pass');
        const passwordError = document.getElementById('passwordError');

        roleSelect.addEventListener('change', () => {
            if (roleSelect.value === 'faculty') {
                facultyFields.style.display = 'block';
                principalFields.style.display = 'none';
            } else if (roleSelect.value === 'principal') {
                facultyFields.style.display = 'none';
                principalFields.style.display = 'block';
            }
        });

        registerForm.addEventListener('submit', (e) => {
            const pass = document.getElementById('pass').value;
            const confirmPass = document.getElementById('confirm_pass').value;

            if (pass !== confirmPass) {
                e.preventDefault();
                passwordError.style.display = 'block';
                passwordError.textContent = 'Passwords do not match!';
            } else {
                passwordError.style.display = 'none';
            }
        });

    </script>
</body>
</html>