<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Progress Reports</title>

    <link rel="stylesheet" href="assets/css/progress_reports_style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            
            background-color: #fff;
            padding: 20px;

            text-align: center;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #6a11cb;
            color: white;
        }

        .btn-download {
            background-color: #6a11cb;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-download:hover {
            background-color: #4b0ca1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Progress Reports</h2>

        <!-- Table to display progress reports -->
        <table>
            <thead>
                <tr>
                    <th>Proposal ID</th>
                    <th>Report Date</th>
                    <th>Progress (%)</th>
                    <th>Challenges</th>
                    <th>Uploaded Report</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example PHP code for fetching data from the database -->
                <?php
                    require '../db_config.php';

                    $sql = "SELECT * FROM progress_reports";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['proposal_id'] . "</td>";
                            echo "<td>" . $row['report_date'] . "</td>";
                            echo "<td>" . $row['project_progress'] . "%</td>";
                            echo "<td>" . nl2br($row['challenges']) . "</td>";
                            echo "<td><a href='../facultydashboard/contents/" . $row['progress_file_path'] . "' target='_blank'>View Report</a></td>";
                            echo "<td><a class='btn-download' href='../facultydashboard/contents/" . $row['progress_file_path'] . "' download>Download PDF</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No progress reports available.</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
