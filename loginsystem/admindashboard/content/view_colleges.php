<?php


require 'db_connection.php';


// Fetch data
$colleges = $conn->query("SELECT * FROM partner_colleges");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Existing Colleges</title>
    <link rel="stylesheet" href="assets/css/view_collegesstyles.css">
    
    <script>
        function filterTable() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const table = document.getElementById('collegesTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const codeCell = rows[i].getElementsByTagName('td')[1];
                const nameCell = rows[i].getElementsByTagName('td')[2];
                const code = codeCell ? codeCell.textContent.toLowerCase() : '';
                const name = nameCell ? nameCell.textContent.toLowerCase() : '';

                if (code.includes(searchInput) || name.includes(searchInput)) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Existing Colleges</h2>
            <div class="search-container">
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Search by code or name..." 
                    onkeyup="filterTable()"
                >
                <span class="search-icon">&#128269;</span>
            </div>
        </div>
        <table id="collegesTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Partner Colleges</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $colleges->fetch_assoc()): // Fetch data from the database
                ?>
                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['Code']; ?></td>
                    <td><?php echo $row['Partner_Colleges']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
