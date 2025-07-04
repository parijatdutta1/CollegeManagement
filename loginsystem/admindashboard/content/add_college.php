<?php

// Rest of the file code
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add College</title>
    <link rel="stylesheet" href="assets/css/add_college_styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Add College</h2>
        <form method="POST" action="index.php?section=add_college">
            <label for="college_code">College Code:</label>
            <input type="text" id="college_code" name="college_code" placeholder="Enter college code" required>

            <label for="college_name">College Name:</label>
            <input type="text" id="college_name" name="college_name" placeholder="Enter college name" required>

            <button type="submit" name="add_college">Add College</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_college'])) {
        $college_code = $_POST['college_code'];
        $college_name = $_POST['college_name'];

        // Assuming $conn is a valid database connection
        $sql = "INSERT INTO partner_colleges (Code, Partner_Colleges) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('ss', $college_code, $college_name);
            if ($stmt->execute()) {
                echo "<script>
                    alert('College added successfully');
                    window.location.href = 'index.php';
                </script>";
            } else {
                echo "<script>alert('Error adding college: " . $stmt->error . "');</script>";
            }
        } else {
            echo "<script>alert('Database error: " . $conn->error . "');</script>";
        }
    }
    ?>
</body>
</html>
