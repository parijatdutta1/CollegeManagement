<?php

// Rest of the file code
?>

<?php
// Include the database configuration file
require 'db_config.php';

require '../PHPMailer/PHPMailer/src/Exception.php';
require '../PHPMailer/PHPMailer/src/PHPMailer.php';
require '../PHPMailer/PHPMailer/src/SMTP.php';

// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Path to Composer autoload or PHPMailer autoload file

// Function to check if a table exists
function tableExists($conn, $table_name) {
    $result = $conn->query("SHOW TABLES LIKE '$table_name'");
    return $result && $result->num_rows > 0;
}

// Function to generate a new Faculty ID
function generateFacultyID($conn, $college_id) {
    $current_year = date("Y");
    $table_name = $college_id . '_faculty';

    if (!tableExists($conn, $table_name)) {
        return "Error: Faculty table does not exist for this college.";
    }

    $query = "SELECT faculty_id FROM $table_name WHERE faculty_id LIKE '$college_id/$current_year/%' ORDER BY faculty_id DESC LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $last_id = $result->fetch_assoc()['faculty_id'];
        $last_number = (int)substr($last_id, strrpos($last_id, '/') + 1);
        $new_number = str_pad($last_number + 1, 4, "0", STR_PAD_LEFT);
    } else {
        $new_number = "0001";
    }

    return "$college_id/$current_year/$new_number";
}

// Function to generate a random password
function generatePassword($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle($characters), 0, $length);
}

// Function to send email using PHPMailer
function sendEmail($to_email, $faculty_id, $password) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'supriyojanaa@gmail.com'; // Replace with your email
        $mail->Password = 'udkzgwyqbxuduwut'; // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('supriyojanaa@gmail.com', 'Faculty Portal');
        $mail->addAddress($to_email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Faculty Account Details';
        $mail->Body    = "
            <h2>Welcome to Our College</h2>
            <p>Your faculty account has been created successfully.</p>
            <p><strong>Faculty ID:</strong> $faculty_id</p>
            <p><strong>Password:</strong> $password</p>
            <p>Please log in and change your password immediately.</p>
        ";
        $mail->AltBody = "Your faculty account has been created.\n\nFaculty ID: $faculty_id\nPassword: $password\nPlease log in and change your password.";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Process form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_faculty'])) {
    $college_code = trim($_POST['college_code']);
    $full_name = trim($_POST['full_name']);
    $dept = trim($_POST['dept']);
    $email = trim($_POST['email']);

    // Generate Faculty ID
    $faculty_id = generateFacultyID($conn, $college_code);

    if (strpos($faculty_id, "Error:") === 0) {
        echo "<script>alert('$faculty_id');
        window.location.href = 'index.php?section=add_faculty';
        </script>";
        exit();
    }

    // Generate a random password
    $password = generatePassword();

    // Insert the faculty record into the database
    $table_name = $college_code . '_faculty';
    $sql = "INSERT INTO $table_name (faculty_id, email, full_name, dept, pass) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param('sssss', $faculty_id, $email, $full_name, $dept, $password);

    if ($stmt->execute()) {
        // Send email to the user
        if (sendEmail($email, $faculty_id, $password)) {
            echo "<script>alert('Faculty added successfully with ID: $faculty_id. Login details have been sent to the user.');
            window.location.href = 'index.php?section=add_faculty';
            </script>";
        } else {
            echo "<script>alert('Faculty added successfully, but email could not be sent.');
            window.location.href = 'index.php?section=add_faculty';
            </script>";
        }
    } else {
        echo "<script>alert('Failed to add faculty');
        window.location.href = 'index.php?section=add_faculty';
        </script>";
    }
    $stmt->close();
}

// Close database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Faculty</title>

    <link rel="stylesheet" href="assets/css/add_faculty_style.css">
    <style>
      
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Faculty</h2>
        <form action="" method="POST">
            <label for="college_code">College Code:</label>
            <input type="text" id="college_code" name="college_code" placeholder="Enter college code" required>

            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" placeholder="Enter full name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter email address" required>

            <label for="dept">Department:</label>
            <input type="text" id="dept" name="dept" placeholder="Enter department" required>

            <button type="submit" name="add_faculty">Add Faculty</button>
        </form>
    </div>
</body>
</html>

