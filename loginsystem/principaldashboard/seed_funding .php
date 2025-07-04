<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seed Funding Management</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      background-color: #f9f9f9;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }
    th {
      background-color: #4CAF50;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    .save-btn {
      padding: 5px 10px;
      background-color: #2196F3;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 3px;
    }
    .save-btn:hover {
      background-color: #0b7dda;
    }
    .editable:hover {
      background-color: #e8f5e9;
      cursor: text;
    }
  </style>
</head>
<body>

<h2>Seed Funding Data</h2>
<table>
  <thead>
    <tr>
      <th>Leader Name</th>
      <th>Team Name</th>
      <th>Project Details</th>
      <th>Funding Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="table-body">
    <?php
    // Fetch data from the seed_funding table
    $sql = "SELECT * FROM seed_funding";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-id='{$row['id']}'>
                <td contenteditable='true' class='editable'>{$row['leader_name']}</td>
                <td contenteditable='true' class='editable'>{$row['team_name']}</td>
                <td contenteditable='true' class='editable'>{$row['project_details']}</td>
                <td contenteditable='true' class='editable'>{$row['funding_status']}</td>
                <td><button class='save-btn' onclick='saveRow(this)'>Save</button></td>
              </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found</td></tr>";
    }
    ?>
  </tbody>
</table>

<script>
  function saveRow(button) {
    // Get the row being edited
    const row = button.parentElement.parentElement;
    const id = row.getAttribute("data-id");
    const cells = row.querySelectorAll(".editable");

    // Extract the edited data
    const data = {
      id: id,
      leader_name: cells[0].textContent.trim(),
      team_name: cells[1].textContent.trim(),
      project_details: cells[2].textContent.trim(),
      funding_status: cells[3].textContent.trim()
    };

    // Send the updated data to the server via AJAX
    fetch("update_seed_funding.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert("Row updated successfully!");
        // Optionally reload data without refreshing the page
        refreshTable();
      } else {
        alert("Error updating row: " + data.error);
      }
    })
    .catch(error => {
      console.error("Error:", error);
    });
  }

  // Function to refresh the table dynamically
  function refreshTable() {
    fetch("fetch_seed_funding.php")
      .then(response => response.text())
      .then(html => {
        document.getElementById("table-body").innerHTML = html;
      })
      .catch(error => console.error("Error fetching table data:", error));
  }
</script>

</body>
</html>

<?php $conn->close(); ?>
