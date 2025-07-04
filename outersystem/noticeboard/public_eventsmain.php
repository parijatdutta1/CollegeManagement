<?php 
$conn = new mysqli('localhost', 'root', '', 'events_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$events = $conn->query("SELECT * FROM events");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Events</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Upcoming Events</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Title</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $events->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
