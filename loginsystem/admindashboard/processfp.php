<?php


require 'db_config.php';

// 3. Edit Principal

    
    if (isset($_POST['edit_principal'])) {
        $college_code = trim($_POST['college_code']);
        $principal_name = trim($_POST['principal_name']);
    
        if (empty($college_code) || empty($principal_name)) {
            echo "<script>alert('College code or Principal name cannot be empty.');
            window.history.back();</script>";
            exit;
        }
    
        $sql = "UPDATE principal SET principal_name = ? WHERE college_code = ?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            echo "<script>alert('Failed to prepare the SQL statement.');
            window.location.href = 'index.php';</script>";
            exit;
        }
    
        $stmt->bind_param('ss', $principal_name, $college_code);
    
        if ($stmt->execute()) {
            echo "<script>alert('Principal Table updated successfully.');
            window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Failed to update Principal Table.');
            window.location.href = 'index.php';</script>";
        }
    
        $stmt->close();
    }
    
    

    // 4. Delete Principal
    elseif (isset($_POST['delete_principal'])) {
        $college_code = trim($_POST['college_code']);

        $sql = "DELETE FROM principal WHERE college_code = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $college_code);

        if ($stmt->execute()) {
            echo "<script>alert('Principal deleted successfully');
            window.location.href = 'index.php'
             </script>";
           
        } else {
            echo "<script>alert('Failed to delete Principal data');
            window.location.href = 'index.php'
             </script>";
            
        }
    }
?> 