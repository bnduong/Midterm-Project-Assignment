<?php
    
    $dsn = 'mysql:host=wftuqljwesiffol6.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname='hgr35rs7vgydaqa';
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
