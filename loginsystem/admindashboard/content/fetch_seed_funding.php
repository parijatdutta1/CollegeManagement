<?php
// Database connection using environment variables
$servername = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';
$dbname = getenv('DB_NAME') ?: 'your_database_name';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$sql = "SELECT * FROM seed_funding";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr data-id='{$row['id']}'>
            <td contenteditable='true' class='editable'>{$row['leader_name']}</td>
            <td contenteditable='true' class='editable'>{$row['team_name']}</td>
            <td contenteditable='true' class='editable'>{$row['project_details']}</td>
            <td contenteditable='true' class='editable'>{$row['funding_status']}</td>
            <td><button class='save-btn' onclick='saveRow(this)'>Save</button></td>
          </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No data found</td></tr>";
}

$conn->close();
?>
