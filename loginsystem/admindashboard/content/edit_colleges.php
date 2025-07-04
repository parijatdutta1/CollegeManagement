<?php

// Rest of the file code
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Colleges Data</title>
    <link rel="stylesheet" href="assets/css/edit_collegesstyles.css">
    
    <script>
        // Function to filter the table based on the search input (by ID only)
        function filterTable() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const table = document.getElementById('collegesTable');
            const rows = table.getElementsByTagName('tr');
            const noIdMessage = document.getElementById('noIdMessage');

            // Initially hide all rows
            for (let i = 1; i < rows.length; i++) {
                rows[i].style.display = 'none';
            }

            // If the search input is empty, show all rows
            if (searchInput === '') {
                for (let i = 1; i < rows.length; i++) {
                    rows[i].style.display = ''; // Show all rows
                }
                noIdMessage.style.display = 'none'; // Hide the "Id not Found" message
                return; // Exit the function early
            }

            let found = false; // To track if a matching row is found

            // Loop through all table rows, except the first one (header row)
            for (let i = 1; i < rows.length; i++) {
                const idCell = rows[i].getElementsByTagName('td')[0]; // ID column (first column)
                const id = idCell ? idCell.textContent.toLowerCase() : ''; // Get the ID value

                // If the ID matches the search input, show the row
                if (id.includes(searchInput)) {
                    rows[i].style.display = ''; // Show the matching row
                    found = true;
                    break; // Stop the loop after finding the first match
                }
            }

            // If no match was found, show the "Id not Found" message
            if (!found) {
                noIdMessage.style.display = 'block'; // Show the message
            } else {
                noIdMessage.style.display = 'none'; // Hide the message if a match is found
            }
        }
    </script>
</head>
<body>
    <div class="table-container">
        <div class="header">
            <h2>Edit Colleges Data</h2>
            <div class="search-container">
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Search by ID..." 
                    onkeyup="filterTable()"
                >
                <span class="search-icon">&#128269;</span>
            </div>
        </div>
        <div id="noIdMessage" class="no-id-message"><h3>Id Not Present</h3></div>
        <table id="collegesTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Partner Colleges</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $colleges = $conn->query("SELECT * FROM partner_colleges");
                while ($row = $colleges->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td>
                        <input 
                            type="text" 
                            name="college_code" 
                            value="<?php echo $row['Code']; ?>" 
                            class="action-input" 
                            required
                        >
                    </td>
                    <td>
                        <input 
                            type="text" 
                            name="college_name" 
                            value="<?php echo $row['Partner_Colleges']; ?>" 
                            class="action-input" 
                            required
                        >
                    </td>
                    <td class="action-icons">
                        <form method="POST" action="process.php">
                            <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                            <button type="submit" name="edit_college">
                                <img src="assets/edit-icon.svg" alt="Edit">
                            </button>
                        </form>
                        <form method="POST" action="process.php">
                            <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                            <button type="submit" name="delete_college">
                                <img src="assets/delete-icon.svg" alt="Delete">
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
