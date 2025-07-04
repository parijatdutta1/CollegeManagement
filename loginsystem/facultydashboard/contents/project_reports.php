<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quarterly Evaluation and Reporting</title>

    <link rel="stylesheet" href="assets/css/project_reports_style.css">
    <style>
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Quarterly Evaluation and Reporting</h1>

        <!-- Project Proposal Submission Form -->
        <section id="project-proposal">
            <h2>Project Proposal Submission</h2>
            <form id="proposal-form" method="POST" action="contents/submit_proposal.php" enctype="multipart/form-data">
                <label for="project-name">Project Name:</label>
                <input type="text" id="project-name" name="project-name" required>

                <label for="project-description">Project Description:</label>
                <textarea id="project-description" name="project-description" required></textarea>

                <label for="proposal-file">Upload Proposal Document:</label>
                <input type="file" id="proposal-file" name="proposal-file" required>

                <button type="submit">Submit Proposal</button>
            </form>
        </section>
    </div>

    <script>
        document.getElementById("proposal-form").addEventListener("submit", function(event) {
            const projectName = document.getElementById("project-name").value;
            const projectDescription = document.getElementById("project-description").value;

            if (!projectName || !projectDescription) {
                alert("Please fill out all fields before submitting.");
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
