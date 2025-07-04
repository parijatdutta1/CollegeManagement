<?php 
    include('functions.php');

    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    $conn = new mysqli('localhost', 'root', '', 'events_db');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get event details
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM events WHERE id=$id");
        $event = $result->fetch_assoc();
    }

    // Update event details
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $date = $_POST['event_date'];
        $title = $_POST['event_title'];
        $details = $_POST['event_details'];

        $conn->query("UPDATE events SET date='$date', title='$title', description='$details' WHERE id=$id");
        header('location: home.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Edit Event</h2>
    </div>
    <div class="content">
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
            <label>Event Date:</label><br>
            <input type="date" name="event_date" value="<?php echo $event['date']; ?>" required><br><br>
            <label>Event Title:</label><br>
            <input type="text" name="event_title" value="<?php echo $event['title']; ?>" required><br><br>
            <label>Event Details:</label><br>
            <textarea name="event_details" required><?php echo $event['description']; ?></textarea><br><br>
            <button type="submit">Update Event</button>
        </form>
    </div>
</body>
</html>
