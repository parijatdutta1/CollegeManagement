<?php
session_start();
session_unset();
session_destroy();

// Prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

// Secure headers
header('X-Content-Type-Options: nosniff'); // Prevent MIME type sniffing
header('X-Frame-Options: SAMEORIGIN'); // Prevent clickjacking
header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self';");
header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload"); // HSTS
header("X-XSS-Protection: 1; mode=block"); // Enable XSS protection

// Redirect to login page
header("Location: loginindex.php");
exit();
?>
