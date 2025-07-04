<?php


try {
    $db = mysqli_connect('localhost', 'root', '', 'multi_login');
} catch (mysqli_sql_exception $e) {
    die("Connection failed: " . $e->getMessage());
}



?>