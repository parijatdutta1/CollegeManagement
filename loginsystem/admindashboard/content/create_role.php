<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Role</title>
    <link rel="stylesheet" href="assets/css/create_rolestyles.css">
</head>
<body>
    <div class="form-container">
        <h2>Create Role</h2>
        <form method="POST" action="process.php">
            <label for="college_code">College Code:</label>
            <input type="text" id="college_code" name="college_code" placeholder="Enter college code" required>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="faculty">Faculty</option>
                <option value="principal">Principal</option>
            </select>

            <button type="submit" name="create_role">Create</button>
        </form>
    </div>
</body>
</html>
