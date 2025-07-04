<?php
require 'db_connection.php';

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch project proposals
$sql = "SELECT id, proposal_id, project_name, project_description, proposal_file_path, submission_date FROM project_proposals";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Proposals</title>

    <link rel="stylesheet" href="assets/css/project_proposals_style.css">
    <style>
        /* Global Styles */
       
    </style>
</head>
<body>

<div class="pp-container">
    <h2>Project Proposals</h2>
    <div class="pp-table-container">
        <table class="pp-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Proposal ID</th>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>File</th>
                    <th>Submission Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0) { 
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['proposal_id']; ?></td>
                            <td><?php echo htmlspecialchars($row['project_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['project_description']); ?></td>
                            <td>
                                <a class="btn-download" href="../facultydashboard/contents/<?php echo $row['proposal_file_path']; ?>" download>Download</a>
                            </td>
                            <td><?php echo $row['submission_date']; ?></td>
                        </tr>
                    <?php } 
                } else { ?>
                    <tr>
                        <td colspan="6" class="no-data">No project proposals found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php $conn->close(); ?>
</body>
</html>