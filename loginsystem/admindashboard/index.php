<?php
session_start();
require_once '../auth_check.php';
// Removed redundant session variable assignment
// $_SESSION['user_logged_in'] = true;

require 'db_config.php';

// Implement input validation for any displayed data
// Example: Validate notifications if they are fetched from the database
// $notifications = $db->query("SELECT message FROM notifications ORDER BY created_at DESC LIMIT 5");
// while ($row = $notifications->fetch_assoc()) {
//     echo "<li>" . htmlspecialchars($row['message']) . "</li>";
// }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <!-- <script src="assets/js/scripts.js"></script> -->
</head>
<body>
<?php include 'navbar.php'; ?>
    <?php include 'sidebar.php'; ?>
</body>
</html>
