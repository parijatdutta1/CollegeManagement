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
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            color: #2c3e50;
        }

        /* Container Styling */
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px 30px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            font-size: 28px;
            color: #34495e;
            font-weight: bold;
            margin: 0;
        }

        /* Search Bar Styling */
        .search-container {
            position: relative;
            margin-right: 50px;
            width: 100%;
            max-width: 250px;
        }

        .search-container input {
            width: 100%;
            padding: 12px 15px 12px 40px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 25px;
            outline: none;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        .search-container input:focus {
            border-color: #3498db;
            background-color: #ffffff;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
        }

        .search-container .search-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            font-size: 18px;
            color: #888;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 16px;
            background-color: #ffffff;
        }

        thead th {
            background-color: #3498db;
            color: #ffffff;
            text-align: left;
            padding: 15px;
            border: 1px solid #ddd;
        }

        tbody tr {
            border: 1px solid #ddd;
            transition: all 0.2s ease;
        }

        tbody tr:nth-child(even) {
            background-color: #f7f9fc;
        }

        tbody tr:hover {
            background-color: #eaf2fb;
        }

        tbody td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            thead th, tbody td {
                padding: 10px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .header h2 {
                font-size: 24px;
            }

            .search-container {
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            table {
                font-size: 12px;
            }

            .container {
                padding: 15px;
            }
        }
    </style>
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
