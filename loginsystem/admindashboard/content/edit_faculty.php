<?php

// Database connection (update with your DB credentials)
require 'db_config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture and sanitize the input
$college_code = isset($_POST['college_code']) ? strtolower(trim($_POST['college_code'])) : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/edit_faculty_style.css">
    <style>
 
    </style>
    <script>
        function filterById() {
    const searchInput = document.getElementById('searchInput').value.trim().toLowerCase();
    const table = document.getElementById('facultyTable');
    const rows = table.getElementsByTagName('tr');
    const noIdMessage = document.getElementById('noIdMessage');

    let found = false;

    for (let i = 1; i < rows.length; i++) {
        const idCell = rows[i].getElementsByTagName('td')[0];
        const id = idCell ? idCell.textContent.trim().toLowerCase() : '';

        if (searchInput === '') {
            rows[i].style.display = ''; // Show all rows if input is empty
            found = true;
        } else if (id === searchInput) {
            rows[i].style.display = '';
            found = true;
        } else {
            rows[i].style.display = 'none';
        }
    }

    noIdMessage.style.display = found ? 'none' : 'block';
}

    </script>
</head>
<body>
    <div class="container">
        <?php if (!$college_code): ?>
            <div class="form-container">
                <h2>Enter College Code</h2>
                <p>To view faculty data, please enter the college code below.</p>
                <form method="POST" action="">
                    <div class="input-group">
                        <input 
                            type="text" 
                            name="college_code" 
                            placeholder="Enter College Code" 
                            required 
                            class="form-input"
                        >
                        <button type="submit" class="form-button">Submit</button>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <h2>Faculty Data for College Code: <?php echo htmlspecialchars($college_code); ?></h2>
            <div class="search-container">
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Search by unique ID..." 
                    onkeyup="filterById()"
                >
            </div>
            <div id="noIdMessage">ID not found.</div>
            <?php
            $table_name = $conn->real_escape_string($college_code . '_faculty');
            $result = $conn->query("SELECT * FROM $table_name");

            if ($result && $result->num_rows > 0): ?>
                <table id="facultyTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Full Name</th>
                            <th>Dept</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <form method="POST" action="process.php">
                            <tr>
                                <td><?php echo $row['faculty_id']; ?></td>
                                <td>
                                    <input 
                                        type="text" 
                                        name="email"
                                        value="<?php echo htmlspecialchars($row['email']); ?>" 
                                        class="action-input"
                                    >
                                </td>
                                <td>
                                    <input 
                                        type="text" 
                                        name="full_name"
                                        value="<?php echo htmlspecialchars($row['full_name']); ?>" 
                                        class="action-input"
                                    >
                                </td>
                                <td>
                                    <input 
                                        type="text" 
                                        name="dept"
                                        value="<?php echo htmlspecialchars($row['dept']); ?>" 
                                        class="action-input"
                                    >
                                </td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td class="action-icons">
                                    <form method="POST" action="process.php" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $row['faculty_id']; ?>">
                                        
                                        <input type="hidden" name="table_name" value="<?php echo $table_name; ?>">
                                        <button type="submit" name="update_entry">
                                            <img src="assets/edit-icon.svg" alt="Edit">
                                        </button>
                                    </form>
                                    <form method="POST" action="process.php" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $row['faculty_id']; ?>">
                                        <input type="hidden" name="table_name" value="<?php echo $table_name; ?>">
                                        <button type="submit" name="delete_entry">
                                            <img src="assets/delete-icon.svg" alt="Delete">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            </form>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="no-data">No records found for the given College Code.</div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>
