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

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Extract data
$id = $data['id'];
$leader_name = $data['leader_name'];
$team_name = $data['team_name'];
$project_details = $data['project_details'];
$funding_status = $data['funding_status'];

// Prepare the update statement
$stmt = $conn->prepare("UPDATE seed_funding 
        SET leader_name=?, 
            team_name=?, 
            project_details=?, 
            funding_status=? 
        WHERE id=?");
$stmt->bind_param('ssssi', $leader_name, $team_name, $project_details, $funding_status, $id);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
