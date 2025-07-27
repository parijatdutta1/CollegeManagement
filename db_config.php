<?php
// Load environment variables (make sure to set these in your .env file)
$host = getenv('DB_HOST') ?: "..";
$user = getenv('DB_USER') ?: "..";
$password = getenv('DB_PASS') ?: "..";
$dbname = getenv('DB_NAME') ?: "..";

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
