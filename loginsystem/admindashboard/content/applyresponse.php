<?php
// Include PHPMailer for sending emails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Include PHPMailer's autoload file

// Database connection
require 'db_config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to send email
function sendEmail($recipientEmails, $subject, $message) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'supriyojanaa@gmail.com';
        $mail->Password = 'udkzgwyqbxuduwut';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('supriyojanaa@gmail.com', 'Project Notification');
        foreach ($recipientEmails as $email) {
            $mail->addAddress($email); // Add recipient
        }

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
    } catch (Exception $e) {
        echo "Error: Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Function to update the status
if (isset($_POST['action']) && isset($_POST['id'])) {
    $action = $_POST['action'];
    $id = intval($_POST['id']); // Ensure ID is an integer for security

    if ($action === 'accept' || $action === 'reject') {
        $status = $action === 'accept' ? 'Accepted' : 'Rejected';

        // Fetch leader faculty ID and team member IDs
        $query = "SELECT leader_faculty_id, team_member_ids FROM project_allocation WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($leaderFacultyId, $teamMemberIds);
        $stmt->fetch();
        $stmt->close();

        // Parse team member IDs
        $cleanedString = trim($teamMemberIds, '[]');
        $teamMemberIdsArray = explode(',', str_replace('"', '', $cleanedString));

        // Include leader faculty ID in the array
        $allFacultyIds = array_merge([$leaderFacultyId], $teamMemberIdsArray);

        // Fetch email addresses from dynamic tables
        $emails = [];
        foreach ($allFacultyIds as $facultyId) {
            $facultyId = trim($facultyId); // Clean whitespace
            $prefix = explode('/', $facultyId)[0]; // Extract prefix
            $tableName = $prefix . '_faculty'; // Dynamic table name

            $emailQuery = "SELECT email FROM {$tableName} WHERE faculty_id = ?";
            $emailStmt = $conn->prepare($emailQuery);
            $emailStmt->bind_param("s", $facultyId);
            $emailStmt->execute();
            $emailStmt->bind_result($email);
            if ($emailStmt->fetch()) {
                $emails[] = $email;
            }
            $emailStmt->close();
        }

        // Update the status in the database
        $updateQuery = "UPDATE project_allocation SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("si", $status, $id);

        if ($stmt->execute()) {
            // Send email notification
            $subject = "Project Status Update";
            $message = "
    <div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 8px; text-align: center;'>
        <h2 style='color: #007BFF;'>Project Status Update</h2>
        <p style='font-size: 16px; color: #333;'>Your project status has been updated to:</p>
        <p style='font-size: 18px; font-weight: bold; color: " . ($status === 'Accepted' ? '#28a745' : '#dc3545') . ";'>$status</p>
        <p style='font-size: 14px; color: #555;'>Please check the system for more details.</p>
    </div>
";

            sendEmail($emails, $subject, $message);

            echo "<p style='color: green;'>Status updated successfully and email sent!</p>";
        } else {
            echo "<p style='color: red;'>Error updating status: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
}

// Fetch data from project_allocation table with status "In Progress"
$sql = "SELECT * FROM project_allocation WHERE status = 'In Progress'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Allocation</title>
    <link rel="stylesheet" href="assets/css/applyresponse_styles.css">
    
</head>
<body>

<h2>Project Allocation Status</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Leader Faculty ID</th>
            <th>Topic</th>
            <th>Team Members</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['id']) . "</td>
                        <td>" . htmlspecialchars($row['leader_faculty_id']) . "</td>
                        <td>" . htmlspecialchars($row['topic']) . "</td>
                        <td>" . htmlspecialchars($row['team_member_ids']) . "</td>
                        <td class='status-pending'>" . htmlspecialchars($row['status']) . "</td>
                        <td>" . htmlspecialchars($row['created_at']) . "</td>
                        <td class='action-icons'> 
                            <form method='POST' action=''>
                                <input type='hidden' name='action' value='accept'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <button type='submit'>
                                    <img src='assets/accept.png' alt='Accept'>
                                </button>
                            </form>
                            <form method='POST' action=''>
                                <input type='hidden' name='action' value='reject'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <button type='submit'>
                                    <img src='assets/rejected.png' alt='Reject'>
                                </button>
                            </form>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data available</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>

<?php
$conn->close();
?>
 