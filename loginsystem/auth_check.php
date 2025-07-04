<?php

if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    session_regenerate_id(true); // Regenerate session ID to prevent session fixation

    header('Location: ../loginindex.php?error=unauthorized');
    exit();
}

// Secure headers
header('X-Content-Type-Options: nosniff'); // Prevent MIME type sniffing
header('X-Frame-Options: SAMEORIGIN'); // Prevent clickjacking

header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload"); // HSTS
header("X-XSS-Protection: 1; mode=block"); // Enable XSS protection
?>
