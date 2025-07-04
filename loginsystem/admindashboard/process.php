<?php

// Include the database configuration file
require 'db_config.php';

// Function to check if a table exists
function tableExists($conn, $table_name) {
    $result = $conn->query("SHOW TABLES LIKE '$table_name'");
    return $result && $result->num_rows > 0;
}

// Process form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Add College
    if (isset($_POST['add_college'])) {
        $college_code = trim($_POST['college_code']);
        $college_name = trim($_POST['college_name']);

        $sql = "INSERT INTO partner_colleges (Code, Partner_Colleges) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $college_code, $college_name);

        if ($stmt->execute()) {
            echo "<script>alert('College added successfully');
            window.location.href = 'index.php';
            </script>";
           
        } else {
            echo "<script>alert('Failed to add college');
            window.location.href = 'index.php';
            </script>";
            
        }
    }

    // 2. Create Role Table
    elseif (isset($_POST['create_role'])) {
        $college_code = trim($_POST['college_code']);
        $role = strtolower(trim($_POST['role']));
        $table_name = $college_code . '_' . $role;

        if ($role === 'faculty') {
            $sql = "SELECT * FROM partner_colleges WHERE LOWER(Code) = LOWER(?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $college_code);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                if (!tableExists($conn, $table_name)) {
                    $sql = "CREATE TABLE $table_name (
                            faculty_id VARCHAR(50) NOT NULL PRIMARY KEY,
                            email VARCHAR(100) NOT NULL UNIQUE,
                            full_name VARCHAR(100) NOT NULL,
                            dept VARCHAR(50) NOT NULL,
                            pass VARCHAR(50) NOT NULL,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                        )";

                    if ($conn->query($sql)) {
                        echo "<script>alert('Faculty table created successfully');
                        window.location.href = 'index.php';
                        </script>";
                        
                    } else {
                        echo "<script>alert('Failed to create faculty table');
                        window.location.href = 'index.php';
                        </script>";
                        
                    }
                } else {
                    echo "<script>alert('Faculty table already exists');
                    window.location.href = 'index.php';
                    </script>";
                    
                }
            } else {
            echo "<script>alert('College code does not exist');
                    window.location.href = 'index.php';
                    </script>";
            }
            $stmt->close();
        } elseif ($role === 'principal') {
            // Step 1: Check if the college code exists in `partner_colleges`
            $sql_check_partner = "SELECT * FROM partner_colleges WHERE LOWER(Code) = LOWER(?)";
            $stmt_partner = $conn->prepare($sql_check_partner);
            $stmt_partner->bind_param('s', $college_code);
            $stmt_partner->execute();
            $partner_result = $stmt_partner->get_result();

            if ($partner_result->num_rows > 0) {
                // Step 2: Check if the principal already exists in `principles`
                $sql_check_principle = "SELECT * FROM principal WHERE LOWER(college_code) = LOWER(?)";
                $stmt_principle = $conn->prepare($sql_check_principle);
                $stmt_principle->bind_param('s', $college_code);
                $stmt_principle->execute();
                $principle_result = $stmt_principle->get_result();

                if ($principle_result->num_rows > 0) {
                    echo "<script>alert('Principal already exists for the selected college');
                    window.location.href = 'index.php?section=create_role';
                    </script>";
                } else {
                    // Show the form for entering the principal's name
                    echo '
                    <form method="POST" action="">
                        <input type="hidden" name="college_code" value="' . htmlspecialchars($college_code) . '">
                        <input type="hidden" name="role" value="' . htmlspecialchars($role) . '">
                        <label for="principal_name">Principal Name:</label>
                        <input type="text" name="principal_name" id="principal_name" required>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                        <label for="pass">Password:</label>
                        <input type="password" id="pass" name="pass" required>
                        <button type="submit" name="submit_principal">Submit</button>
                    </form>';
                    exit();
                }
                $stmt_principle->close();
            } else {
                echo "<script>alert('College code does not exist');
                window.location.href = 'index.php?section=create_role';
                </script>";
            }
            $stmt_partner->close();
        }
    }

    // 3. Add Principal to `principles` table
    elseif (isset($_POST['submit_principal'])) {
        $principal_name = trim($_POST['principal_name']);
        $college_code = trim($_POST['college_code']);
        $pass = trim($_POST['pass']);
        $email = trim($_POST['email']);

        $sql_insert_principle = "INSERT INTO principal (college_code, principal_name, email, pass) VALUES (?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert_principle);
        $stmt_insert->bind_param('ssss', $college_code, $principal_name, $email, $pass);

        if ($stmt_insert->execute()) {
            echo "<script>alert('Principal added successfully');
           window.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>alert('Failed to add principal');
           window.location.href = 'index.php'
            </script>";
        }
    }
    // 3. Edit College
    elseif (isset($_POST['edit_college'])) {
        $id = intval($_POST['id']);
        $college_code = trim($_POST['college_code']);
        $college_name = trim($_POST['college_name']);

        $sql = "UPDATE partner_colleges SET Code = ?, Partner_Colleges = ? WHERE Id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssi', $college_code, $college_name, $id);

        if ($stmt->execute()) {
            echo "<script>alert('College updated successfully');
            window.location.href = 'index.php'
             </script>";
        } else {
            echo "<script>alert('Failed to update college');
            window.location.href = 'index.php'
             </script>";
            
        }
    }

    // 4. Delete College
    elseif (isset($_POST['delete_college'])) {
        $id = intval($_POST['id']);

        $sql = "DELETE FROM partner_colleges WHERE Id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            echo "<script>alert('College deleted successfully');
            window.location.href = 'index.php'
             </script>";
           
        } else {
            echo "<script>alert('Failed to delete college');
            window.location.href = 'index.php'
             </script>";
            
        }
    }

    
    


    // 5. Update Faculty Entry
    elseif (isset($_POST['update_entry'])) {
        // Ensure database connection is included
    
        $id = trim($_POST['id']);
        $name = trim($_POST['full_name']);
        $dept = trim($_POST['dept']);
        $email = trim($_POST['email']);
        $table_name = trim($_POST['table_name']);
    
        // Check if required fields are set
        if (empty($id) || empty($name) || empty($dept) || empty($email) || empty($table_name)) {
            die("<script>alert('Missing required fields. Please try again.'); window.location.href = 'index.php';</script>");
        }
    
        // Prepare and execute the query
        $sql = "UPDATE `$table_name` SET email = ?, full_name = ?, dept = ? WHERE faculty_id = ?";
        $stmt = $conn->prepare($sql);
    
        if (!$stmt) {
            die("<script>alert('SQL Error: " . $conn->error . "'); window.location.href = 'index.php';</script>");
        }
    
        $stmt->bind_param('ssss', $email, $name, $dept, $id);
    
        if ($stmt->execute()) {
            echo "<script>alert('Entry updated successfully'); window.location.href = 'index.php';</script>";
        } else {
            die("<script>alert('Failed to update entry: " . $stmt->error . "'); window.location.href = 'index.php';</script>");
        }
    }
    
    // 6. Delete Faculty Entry
    elseif (isset($_POST['delete_entry'])) {
        $id = intval($_POST['id']);
        $table_name = trim($_POST['table_name']);

        $sql = "DELETE FROM $table_name WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            echo "<script>alert('Entry deleted successfully');
            window.location.href = 'edit_faculty.php'
             </script>";
            
        } else {
            echo "<script>alert('Failed to delete entry');
            window.location.href = 'edit_faculty.php'
             </script>";
            
        }
    }

    // Default fallback for unhandled cases
    else {
        echo "<script>alert('Invalid request');
            window.location.href = 'index.php'
             </script>";
        
    }
}

// Close database connection
$conn->close();
?>
