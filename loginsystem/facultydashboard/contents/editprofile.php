<?php

include '../db_config.php'; // Database connection file

// Fetch user details from session or database
$user_id = $_SESSION['faculty_id'];
$prefix = explode('/', $user_id)[0];
$table_name = $prefix . '_faculty';

if (!$table_name || !$user_id) {
    die("Error: College code or user ID not set in session.");
}

$query = mysqli_query($conn, "SELECT * FROM $table_name WHERE faculty_id='$user_id'");
$user = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $dept = mysqli_real_escape_string($conn, $_POST['dept']);
    $password = $_POST['password'] ? $_POST['password'] : $user['pass'];

    // Update user details in database
    $update_query = "UPDATE $table_name SET full_name='$name', email='$email', dept='$dept', pass='$password' WHERE faculty_id='$user_id'";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Profile updated successfully!');
                window.location.href = 'index.php';
                </script>";
    } else {
        $_SESSION['error'] = "Error updating profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <script src="https://kit.fontawesome.com/41a88dee8e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/editprofile_style.css">

    
    <script>
        function makeEditable(icon) {
            const fieldContainer = icon.parentElement;
            const label = fieldContainer.querySelector("label");
            const input = fieldContainer.querySelector("input");
            label.style.display = 'none';
            input.style.display = 'block';
            input.focus();
        }
    </script>
</head>
<body>
    <div class="profile-container">
        <form method="POST">
            <div class="edit-field">
                <span>Name:</span>
                <label><?php echo $user['full_name']; ?></label>
                <input type="text" name="name" value="<?php echo $user['full_name']; ?>">
                <i class="fas fa-edit edit-icon" onclick="makeEditable(this)"></i>
            </div>

            <div class="edit-field">
                <span>Email:</span>
                <label><?php echo $user['email']; ?></label>
                <input type="email" name="email" value="<?php echo $user['email']; ?>">
                <i class="fas fa-edit edit-icon" onclick="makeEditable(this)"></i>
            </div>

            <div class="edit-field">
                <span>Department:</span>
                <label><?php echo $user['dept']; ?></label>
                <input type="text" name="dept" value="<?php echo $user['dept']; ?>">
                <i class="fas fa-edit edit-icon" onclick="makeEditable(this)"></i>
            </div>

            <div class="edit-field">
                <span>Password:</span>
                <input type="password" name="password" placeholder="Enter new password">
                <i class="fas fa-edit edit-icon"></i>
            </div>

            <button type="submit" class="update-btn">Update Profile</button>
        </form>
    </div>
</body>
</html>
