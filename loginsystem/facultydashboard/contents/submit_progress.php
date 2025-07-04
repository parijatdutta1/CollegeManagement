<?php
require '../db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form inputs
    $proposalId = $_POST['proposal-id'] ?? '';
    $reportDate = $_POST['report-date'] ?? '';
    $projectProgress = $_POST['project-progress'] ?? '';
    $challenges = $_POST['challenges'] ?? '';
    $progressFile = $_FILES['progress-file'];

    // Validate form inputs
    if (empty($proposalId) || empty($reportDate) || empty($projectProgress)) {
        echo "<script>alert('All required fields must be filled.'); window.history.back();</script>";
        exit;
    }

    if (!is_numeric($projectProgress) || $projectProgress < 0 || $projectProgress > 100) {
        echo "<script>alert('Project progress must be a number between 0 and 100.'); window.history.back();</script>";
        exit;
    }

    // File upload handling
    $targetDir = "../uploads/progress_reports/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $targetFile = $targetDir . basename($progressFile["name"]);

    if (!move_uploaded_file($progressFile["tmp_name"], $targetFile)) {
        echo "<script>alert('File upload failed!'); window.history.back();</script>";
        exit;
    }

    // Check if a progress report already exists for this proposal_id
    $check_sql = "SELECT proposal_id FROM progress_reports WHERE proposal_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $proposalId);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        // Update existing progress report
        $update_sql = "UPDATE progress_reports SET report_date = ?, project_progress = ?, challenges = ?, progress_file_path = ? WHERE proposal_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sisss", $reportDate, $projectProgress, $challenges, $targetFile, $proposalId);

        if ($update_stmt->execute()) {
            echo "<script>alert('Progress report updated successfully!'); window.location.href='../index.php?section=welcome';</script>";
        } else {
            echo "<script>alert('Failed to update progress report.'); window.history.back();</script>";
        }
    } else {
        // Insert a new progress report
        $insert_sql = "INSERT INTO progress_reports (proposal_id, report_date, project_progress, challenges, progress_file_path) VALUES (?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ssiss", $proposalId, $reportDate, $projectProgress, $challenges, $targetFile);

        if ($insert_stmt->execute()) {
            echo "<script>alert('Progress report submitted successfully!'); window.location.href='../index.php?section=welcome';</script>";
        } else {
            echo "<script>alert('Failed to submit progress report.'); window.history.back();</script>";
        }
    }
}
?>
