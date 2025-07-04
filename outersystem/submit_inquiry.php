<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '..\loginsystem\vendor\autoload.php'; // Adjust the path as necessary
require 'db_connection.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Insert inquiry into the database
    $stmt = $conn->prepare("INSERT INTO inquiries (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'supriyojanaa@gmail.com';
        $mail->Password = 'udkzgwyqbxuduwut';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('supriyojanaa@gmail.com', 'Inquiry Form');
        $mail->addAddress($email, $name); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Inquiry from R&D Department , JIS University";
        $mail->Body    = " <h3>We have Received Your Inquiry , Thank You for reaching out to us! </h3><br><br>Your Response :<br> <br> Name: $name<br>Email: $email<br>Message: $message";

        $mail->send();
        header('Location: ../index.php');
    } catch (Exception $e) {
        echo "Email sending failed: {$mail->ErrorInfo}";
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
