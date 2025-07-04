<?php
// Load environment variables (make sure to set these in your .env file)
$host = getenv('DB_HOST') ?: "sql203.infinityfree.com";
$user = getenv('DB_USER') ?: "if0_38271752";
$password = getenv('DB_PASS') ?: "JISRANDD0978";
$dbname = getenv('DB_NAME') ?: "if0_38271752_test";

// Enable error reporting for debugging (Disable in production)
error_reporting(0);
ini_set('display_errors', 0);

// Create a secure database connection using MySQLi
$conn = new mysqli($host, $user, $password, $dbname);

// Check for connection errors without exposing details
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error, 3, "/var/log/php_errors.log");
    die("Database connection error. Please try again later.");
}

// Set character encoding for security
$conn->set_charset("utf8mb4");

?>
