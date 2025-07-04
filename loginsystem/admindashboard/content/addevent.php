<?php 
    

    

    // Database connection
   require 'db_connection.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle Add Event
    $success = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_event'])) {
        $event_date = $_POST['event_date'];
        $event_title = $_POST['event_title'];
        $event_details = $_POST['event_details'];

        $sql = "INSERT INTO events (date, title, description) VALUES ('$event_date', '$event_title', '$event_details')";
        if ($conn->query($sql) === TRUE) {
            $success = "Event added successfully!";
        } else {
            $success = "Error: " . $conn->error;
        }
    }

    // Handle Delete Event
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $conn->query("DELETE FROM events WHERE id=$id");
        header('location: index.php'); // Redirect back to the same page after deletion
        exit();
    }

    // Fetch Events
    $events = $conn->query("SELECT * FROM events");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" href="assets/css/addevent_style.css">
    <style>
 
    </style>
</head>
<body>
    
    <div class="content">
        
        

        <!-- Add Event Section -->
        <h3>Add New Event</h3>
        <?php if (!empty($success)) echo "<p class='success'>$success</p>"; ?>
        <form method="POST" action="">
            <label>Event Date:</label><br>
            <input type="date" name="event_date" required><br><br>
            <label>Event Title:</label><br>
            <input type="text" name="event_title" required><br><br>
            <label>Event Details:</label><br>
            <textarea name="event_details" required></textarea><br><br>
            <button type="submit" name="add_event">Add Event</button>
        </form>

        <!-- Manage Events Section -->
        <h3>Manage Events</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $events->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <!-- Edit and Delete Links -->
                        <a href="edit_event.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                        <a href="index.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this event?');">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
