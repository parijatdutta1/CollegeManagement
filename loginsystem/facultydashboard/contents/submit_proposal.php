<?php
require '../db_config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the file is uploaded correctly
    if (!isset($_FILES['proposal-file']) || $_FILES['proposal-file']['error'] !== UPLOAD_ERR_OK) {
        echo "No file uploaded or there was an error uploading the file.";
        exit;
    }

    // Retrieve form inputs
    $projectName = $_POST['project-name'] ?? '';
    $projectDescription = $_POST['project-description'] ?? '';
    $proposalFile = $_FILES['proposal-file'];

    // Validate form inputs
    if (empty($projectName) || empty($projectDescription)) {
        echo "All fields are required.";
        exit;
    }

    // Generate Proposal ID: Use the first letters of the project name + a timestamp
    $words = explode(' ', $projectName); // Split the project name into words
    $proposalId = '';
    foreach ($words as $word) {
        $proposalId .= strtoupper($word[0]); // Get the first letter of each word
    }
    $proposalId .= date("YmdHis"); // Append the current timestamp to ensure uniqueness

    // Handle file upload
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true); // Create the directory if it doesn't exist
    }

    $targetFile = $targetDir . basename($proposalFile["name"]);

    if (move_uploaded_file($proposalFile["tmp_name"], $targetFile)) {
        // File upload successful, insert into database
        $stmt = $conn->prepare("INSERT INTO project_proposals (proposal_id, project_name, project_description, proposal_file_path) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $proposalId, $projectName, $projectDescription, $targetFile);

        if ($stmt->execute()) {
            echo "<script>alert('Proposal submitted successfully. Your Proposal ID is: $proposalId ');
                    window.location.href = '../index.php?section=welcome';
                    </script>";
        } else {
            echo "<script>alert('Error inserting record: $stmt->error');
                    window.location.href = '../index.php?section=welcome';
                    </script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file.');
                    window.location.href = '../index.php?section=project_reports';
                    </script>";
    }
}
?>
