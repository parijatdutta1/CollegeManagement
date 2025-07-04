
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Dashboard</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/scripts.js"></script>
    <style>
        /* Reset and Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            background-color: #f3f4f6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1a202c;
            color: #f3f4f6;
            padding: 15px 20px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            display: flex;
            align-items: center;
            font-size: 20px;
            font-weight: bold;
        }

        .navbar .logo svg {
            width: 30px;
            height: 30px;
            margin-right: 8px;
        }

        .navbar .menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navbar .menu .logout {
            background-color: #e53e3e;
            border: none;
            border-radius: 4px;
            color: white;
            padding: 8px 12px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .navbar .menu .logout:hover {
            background-color: #c53030;
        }

        /* Notification Styles */
        .notification {
            position: relative;
            display: flex;
            align-items: center;
            font-size: 18px;
            cursor: pointer;
        }

        .notification .badge {
            background-color: #e53e3e;
            color: white;
            font-size: 12px;
            font-weight: bold;
            padding: 4px 8px;
            border-radius: 50%;
            margin-left: 8px;
        }

        .notification-dropdown {
            position: absolute;
            top: 40px;
            right: 0;
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 250px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .notification-dropdown ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .notification-dropdown li {
            padding: 12px 16px;
            border-bottom: 1px solid #f0f0f0;
            color: #333;
            transition: background 0.2s;
        }

        .notification-dropdown li:hover {
            background-color: #f9f9f9;
        }

        .notification-dropdown li:last-child {
            border-bottom: none;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 60px;
            left: 0;
            width: 220px;
            height: calc(100% - 60px);
            background-color: #2d3748;
            color: white;
            padding: 15px 0;
            box-shadow: 2px 0 6px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border-bottom: 1px solid #4a5568;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #4a5568;
        }

        /* Main Content */
        .content {
            margin-top: 60px;
            margin-left: 220px;
            padding: 20px;
            background-color: white;
            min-height: calc(100vh - 60px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .navbar .menu {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: static;
                display: flex;
                flex-direction: row;
                overflow-x: auto;
            }

            .content {
                margin-left: 0;
                margin-top: 20px;
            }
        }
    </style>
    <script>
        // Toggle notification dropdown
        function toggleNotifications() {
            const dropdown = document.querySelector('.notification-dropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const notification = document.querySelector('.notification');
            const dropdown = document.querySelector('.notification-dropdown');
            if (!notification.contains(event.target)) {
                dropdown.style.display = 'none';
            }
        });
    </script>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512h388.6c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304h-91.4z"/>
            </svg>
            <span>Faculty Dashboard</span>
        </div>
        <div class="menu">
            <div class="notification" onclick="toggleNotifications()">
                🔔 <span class="badge">3</span>
                <div class="notification-dropdown">
                    <ul>
                        <li>New user registered</li>
                        <li>Server backup completed</li>
                        <li>3 unread messages</li>
                    </ul>
                </div>
            </div>
            <form action="logout.php" method="post">
    <button class="logout" type="submit">Logout</button>
</form>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="index.php?section=welcome">Home</a>
        <a href="index.php?section=project_applyform">Project Apply</a>
        <a href="index.php?section=project_reports">Project Proposal Submission</a>
        <a href="index.php?section=progress_report">Progress Report Submission</a>
        <a href="index.php?section=editprofile">Edit My Profile</a>

        
    </div>

    <!-- Main Content -->
    
    <div class="content">
        <?php
        $section = preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['section'] ?? 'welcome');

        $file = "contents/$section.php";

        if (file_exists($file)) {
            include $file;
        } else {
            echo "<h1>Section not found</h1>";
        }
        ?>
    </div>
</body>
</html>
