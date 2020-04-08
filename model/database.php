<?php
    
    $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root';
    $password = 'Mongmo12';
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('c:/xampp/htdocs/Midterm_Project/errors/database_error.php');
        exit();
    }
?>
