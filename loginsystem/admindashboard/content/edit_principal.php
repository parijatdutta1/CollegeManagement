<?php

// Rest of the file code
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Colleges Data</title>
    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="assets/css/edit_principal_style.css">
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #4a4a4a;
        }
        .table-container {
            margin: 60px auto;
            max-width: 1100px;
            background: #ffffff;
            padding: 25px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .header h2 {
            font-size: 26px;
            color: #2c3e50;
            letter-spacing: 1px;
        }
        .search-container {
            position: relative;
            margin-right: 45px;
            width: 100%;
            max-width: 220px;
        }
        .search-container input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            font-size: 14px;
            border: 1px solid #dcdcdc;
            border-radius: 25px;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }
        .search-container input:focus {
            border-color: #007bff;
            background-color: #ffffff;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
            outline: none;
        }
        .search-container .search-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            font-size: 16px;
            color: #888;
        }
        .no-id-message {
            color: red;
            font-size: 16px;
            text-align: center;
            margin-top: 20px;
            display: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
        }
        thead th {
            background-color: #007bff;
            color: #fff;
            text-transform: uppercase;
            font-size: 14px;
            padding: 15px 10px;
        }
        tbody td {
            padding: 12px 15px;
            font-size: 14px;
            border-bottom: 1px solid #eaeaea;
        }
        tbody tr:last-child td {
            border-bottom: none;
        }
        tbody tr:hover {
            background-color: #f9fbff;
        }
        .action-icons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        .action-icons button {
            background: none;
            border: none;
            cursor: pointer;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }
        .action-icons button:hover {
            transform: scale(1.1);
            opacity: 0.8;
        }
        .action-icons img {
            width: 22px;
            height: 22px;
        }
        .action-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #dcdcdc;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }
        .action-input:focus {
            border-color: #007bff;
            outline: none;
        }
        @media (max-width: 768px) {
            .table-container {
                padding: 20px;
            }
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
    </style>
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
            <h2>Edit Principal Data</h2>
            <div class="search-container">
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Search by College Code..." 
                    onkeyup="filterTable()"
                >
                <span class="search-icon">&#128269;</span>
            </div>
        </div>
        <div id="noIdMessage" class="no-id-message"><h3>College Code Not Present</h3></div>
        <table id="collegesTable">
            <thead>
                <tr>
                    <th>College Code</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $colleges = $conn->query("SELECT * FROM principal");
                while ($row = $colleges->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['college_code']; ?></td>
                    <td>
                    <form method="POST" action="processfp.php" style="display:inline;">
                        <input 
                            type="text"
                            name="principal_name" 
                            value="<?php echo $row['principal_name']; ?>" 
                            class="action-input" 
                            required
                        >
                    </td>
                    <td> <?php echo $row['created_at']; ?> </td>
                    <td class="action-icons">
                        <form method="POST" action="processfp.php">
                            <input type="hidden" name="college_code" value="<?php echo $row['college_code']; ?>">
                            <button type="submit" name="edit_principal">
                                <img src="assets/edit-icon.svg" alt="Edit">
                            </button>
                        </form>
                        <form method="POST" action="processfp.php">
                            <input type="hidden" name="college_code" value="<?php echo $row['college_code']; ?>">
                            <button type="submit" name="delete_principal">
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
