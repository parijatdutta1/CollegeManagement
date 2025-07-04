<?php
session_start();
require 'db_connection.php'; // Database connection

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer
require '../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipientEmail = $_POST['recipientEmail'];
    $replyMessage = $_POST['replyMessage'];

    // Ensure email and message are not empty
    if (empty($recipientEmail) || empty($replyMessage)) {
        echo "<script>alert('Email and message are required!'); window.history.back();</script>";
        exit();
    }

    // Send email using PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'supriyojanaa@gmail.com';
        $mail->Password = 'udkzgwyqbxuduwut';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('supriyojanaa@gmail.com', 'R&D');
        $mail->addAddress($recipientEmail); // Recipient

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Reply to Your Inquiry';
        $mail->Body = "<p><strong>Reply:</strong></p><p>$replyMessage</p>";

        $mail->send();
        echo "<script>alert('Reply sent successfully!'); window.location.href='../index.php?section=inquiries';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error sending email: {$mail->ErrorInfo}'); window.history.back();</script>";
    }
}
?>