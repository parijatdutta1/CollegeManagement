<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Report Submission</title>

    <link rel="stylesheet" href="assets/css/progress_report_style.css">
    <style>
   
    </style>
</head>
<body>
    <div class="container">
        <h2>Progress Report Submission</h2>
        <form id="progress-form" method="POST" action="contents/submit_progress.php" enctype="multipart/form-data">
            <label for="proposal-id">Proposal ID:</label>
            <input type="text" id="proposal-id" name="proposal-id" required>

            <label for="report-date">Report Date:</label>
            <input type="date" id="report-date" name="report-date" required>

            <label for="project-progress">Progress (%):</label>
            <input type="number" id="project-progress" name="project-progress" min="0" max="100" required>

            <label for="challenges">Challenges (optional):</label>
            <textarea id="challenges" name="challenges"></textarea>

            <label for="progress-file">Upload Progress Report:</label>
            <input type="file" id="progress-file" name="progress-file" required>

            <button type="submit">Submit Progress</button>
        </form>
    </div>
</body>
</html>
