<?php
require 'db_connection.php'; // Database connection
header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self';");

// Fetch inquiries from the database
$query = "SELECT id, name, email, message, created_at FROM inquiries ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiries</title>

    <link rel="stylesheet" href="assets/css/inquiries_style.css">
    <style>
       
    </style>
</head>
<body>

    <h2>Inquiries</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['message']); ?></td>
            <td><?= htmlspecialchars($row['created_at']); ?></td>
            <td><button class="reply-btn" data-email="<?= htmlspecialchars($row['email']); ?>">Reply</button></td>

        </tr>
        <?php endwhile; ?>
    </table>

    <!-- Overlay for Modal -->
    <div id="overlay" class="overlay" onclick="closeModal()"></div>

    <!-- Reply Modal -->
    <div id="replyModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Reply to Inquiry</h3>
        <form id="replyForm" method="POST" action="content/inquiry_reply.php">
            <input type="hidden" id="recipientEmail" name="recipientEmail">
            <label for="replyMessage">Message:</label>
            <textarea id="replyMessage" name="replyMessage" required rows="4"></textarea>
            <button type="submit">Send Reply</button>
        </form>
    </div>


<script src="assets/js/inquiries_script.js"></script>

</body>
</html>

<?php $conn->close(); ?>