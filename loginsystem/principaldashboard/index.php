<?php
session_start();
require_once '../auth_check.php';
// Rest of the file code
$_SESSION['user_logged_in'] = true;

require '../../db_config.php';


// $notifications = $db->query("SELECT message FROM notifications ORDER BY created_at DESC LIMIT 5");
// while ($row = $notifications->fetch_assoc()) {
//     echo "<li>{$row['message']}</li>";
// }


?>
<!DOCTYPE html>
<html>
<head>
    <title>Faculty Dashboard</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">

    <script src="assets/js/scripts.js"></script>

    

    
    <?php include 'sidebar.php'; ?>
   
</body>
</html>
