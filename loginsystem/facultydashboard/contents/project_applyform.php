<?php
// Include database configuration
require 'db_config.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $leader_faculty_id = $_POST['leader_faculty_id']; // Faculty ID from the session
    $topic = trim($_POST['topic']);
    $team_member_ids = $_POST['team_member_ids'] ? json_encode($_POST['team_member_ids'], JSON_UNESCAPED_SLASHES) : null;


    // Insert into `project_allocation` table
    $sql = "INSERT INTO project_allocation (leader_faculty_id, topic, team_member_ids) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $leader_faculty_id, $topic, $team_member_ids);

    if ($stmt->execute()) {
        echo "<script>alert('Project application submitted successfully!');</script>";
    } else {
        echo "<script>alert('Failed to submit project application. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Application Form</title>
    <link rel="stylesheet" href="assets/css/stylesprojectapply.css"> <!-- Linking External CSS -->
</head>
<body>
    <div class="project-form-container">
        <form method="POST" action="" class="project-form" onsubmit="return showConfirmation(event)">
            <h2 class="form-title">Project Application</h2>
            
            <input type="hidden" name="leader_faculty_id" value="<?php echo $_SESSION['faculty_id']; ?>" />

            <label for="project-topic" class="form-label">Project Topic:</label>
            <input type="text" name="topic" id="project-topic" class="form-input" placeholder="Enter project topic" required />

            <label for="team-members" class="form-label">How many team members?</label>
            <select id="team-members" class="form-select" onchange="generateTeamFields()">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>

            <div id="team-member-fields"></div>

            <button type="submit" class="form-button">Apply</button>
        </form>
    </div>

    <div id="confirmation-modal" class="modal" style="display: none;">
        <div class="modal-content">
            <h3>Confirm Your Submission</h3>
            <p id="confirmation-details"></p>
            <button onclick="submitForm()">Confirm</button>
            <button onclick="closeModal()">Edit</button>
        </div>
    </div>

    <script>
        function generateTeamFields() {
            const teamCount = document.getElementById('team-members').value;
            const container = document.getElementById('team-member-fields');
            container.innerHTML = ''; // Clear existing fields

            for (let i = 0; i < teamCount; i++) {
                const input = document.createElement('input');
                input.type = 'text';
                input.name = 'team_member_ids[]';
                input.placeholder = `Enter Team Member ${i + 1} ID`;
                input.classList.add('team-member-input');

                container.appendChild(input);
            }
        }

        function showConfirmation(event) {
            event.preventDefault(); // Prevent form submission
            
            const topic = document.getElementById('project-topic').value;
            const teamCount = document.getElementById('team-members').value;
            let teamMembers = document.querySelectorAll('.team-member-input');
            
            let details = `<strong>Project Topic:</strong> ${topic}<br>`;
            details += `<strong>Team Members:</strong> ${teamCount}<br>`;

            teamMembers.forEach((input, index) => {
                details += `Member ${index + 1} ID: ${input.value}<br>`;
            });
            
            document.getElementById('confirmation-details').innerHTML = details;
            document.getElementById('confirmation-modal').style.display = 'block';
        }

        function submitForm() {
            document.querySelector('.project-form').submit();
        }

        function closeModal() {
            document.getElementById('confirmation-modal').style.display = 'none';
        }
    </script>
</body>
</html>




