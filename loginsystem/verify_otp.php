<?php
// Secure headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline';");

// Start a secure session
session_start();

// Function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_otp = sanitize_input($_POST['otp'] ?? '');

    if (!isset($_SESSION['otp']) || !$user_otp) {
        header('Location: loginindex.php?error=missing_otp');
        exit();
    }

    // Validate OTP
    if ($user_otp == $_SESSION['otp']) {
        // OTP is valid
        unset($_SESSION['otp']); // Invalidate the OTP after use

        // Redirect based on user role
        if (isset($_SESSION['faculty_id'])) {
            $_SESSION['user_logged_in'] = true;
            header('Location: facultydashboard/index.php');
        } elseif ($_SESSION['role'] === 'administrator') {
            $_SESSION['user_logged_in'] = true;
            header('Location: admindashboard/index.php');
        } elseif ($_SESSION['role'] === 'principal') {
            $_SESSION['user_logged_in'] = true;
            header('Location: principaldashboard/index.php');
        } else {
            header('Location: loginindex.php?error=unknown_role');
        }
        exit();
    } else {
        // Invalid OTP
        header('Location: loginindex.php?error=invalid_otp');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="assets/css/verify_otp_style.css">

    <style>
      
    </style>
</head>
<body>
    <div class="otp-container">
        <h2 class="text-3xl font-bold text-gray-800">OTP Verification</h2>
        <?php if (isset($_GET['error'])): ?>
            <p class="error-message">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </p>
        <?php endif; ?>
        <form method="POST" action="" class="mt-4">
            <label for="otp" class="block text-gray-700 text-sm font-bold mb-2">Enter the OTP sent to your email:</label>
            <input type="text" id="otp" name="otp" placeholder="6-digit OTP" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4">Verify OTP</button>
        </form>

    </div>
</body>
</html>