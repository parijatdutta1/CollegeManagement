<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);




// Include PHPMailer for sending emails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Load PHPMailer
require '../db_config.php'; // Database connection

// Check connection
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Database Connection Failed: " . $conn->connect_error]));
}

// Secure email function
function sendEmail($recipientEmails, $subject, $message) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        // Use environment variables for credentials
        $mail->Username = getenv('SMTP_USER'); 
        $mail->Password = getenv('SMTP_PASS');

        if (!$mail->Username || !$mail->Password) {
            throw new Exception("SMTP credentials missing. Check environment variables.");
        }

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($mail->Username, 'Project Notification');
        foreach ($recipientEmails as $email) {
            $mail->addAddress($email);
        }

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
    } catch (Exception $e) {
        error_log("Email Error: " . $mail->ErrorInfo);
    }
}

// Handle POST request (AJAX-based)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'], $_POST['id'])) {
    $action = $_POST['action'];
    $id = intval($_POST['id']);
    
    if ($action === 'accept' || $action === 'reject') {
        $status = ($action === 'accept') ? 'Accepted' : 'Rejected';

        // Fetch faculty IDs
        $query = "SELECT leader_faculty_id, team_member_ids FROM project_allocation WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($leaderFacultyId, $teamMemberIds);
        $stmt->fetch();
        $stmt->close();

        // Extract faculty IDs
        $teamMemberIdsArray = array_filter(explode(',', str_replace(['[', ']', '"'], '', $teamMemberIds)));
        $allFacultyIds = array_merge([$leaderFacultyId], $teamMemberIdsArray);

        // Fetch emails
        $emails = [];
        foreach ($allFacultyIds as $facultyId) {
            $facultyId = trim($facultyId);
            $tableName = explode('/', $facultyId)[0] . '_faculty';
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

        // Update status in the database
        $updateQuery = "UPDATE project_allocation SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("si", $status, $id);

        if ($stmt->execute()) {
            // Send email notification
            $subject = "Project Status Updated";
            $message = "<h3>Your project has been <span style='color:" . ($status === 'Accepted' ? '#28a745' : '#dc3545') . ";'>$status</span>.</h3>";
            sendEmail($emails, $subject, $message);
            echo json_encode(["success" => true, "message" => "Status updated and email sent."]);
        } else {
            echo json_encode(["success" => false, "message" => "Error updating status: " . $stmt->error]);
        }
        $stmt->close();
    }
    exit;
}

// Fetch projects
$sql = "SELECT * FROM project_allocation";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Allocation</title>
    <link rel="stylesheet" href="assets/css/stylesallquery.css">
    <meta http-equiv="Content-Security-Policy" content="script-src 'self'">
    <script src="assets/js/allqueries.js" defer></script>
</head>
<body>
    <div class="container">
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
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['leader_faculty_id']) ?></td>
                    <td><?= htmlspecialchars($row['topic']) ?></td>
                    <td><?= htmlspecialchars($row['team_member_ids']) ?></td>
                    <td class="status-<?= strtolower($row['status']) ?>"><?= htmlspecialchars($row['status']) ?></td>
                    <td><?= htmlspecialchars($row['created_at']) ?></td>
                    <td>
                        <button class="action-btn" data-id="<?= $row['id'] ?>" data-action="accept">Accept</button>
                        <button class="action-btn" data-id="<?= $row['id'] ?>" data-action="reject">Reject</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    
</body>
</html>

<?php $conn->close(); ?>
