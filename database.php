<?php
    $user = 'root';
    $pass = '';
    global $user, $pass;
    $conn = new PDO('mysql:host=localhost;dbname=filesystem', $user, $pass);
    global $conn;
?>