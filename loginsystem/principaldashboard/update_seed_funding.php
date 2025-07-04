<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Extract data
$id = $data['id'];
$leader_name = $conn->real_escape_string($data['leader_name']);
$team_name = $conn->real_escape_string($data['team_name']);
$project_details = $conn->real_escape_string($data['project_details']);
$funding_status = $conn->real_escape_string($data['funding_status']);

// Update the database
$sql = "UPDATE seed_funding 
        SET leader_name='$leader_name', 
            team_name='$team_name', 
            project_details='$project_details', 
            funding_status='$funding_status' 
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

$conn->close();
?>
