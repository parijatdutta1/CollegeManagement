<?php
session_start();

// Rest of the file code


require 'db_config.php';


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
