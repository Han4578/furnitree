<?php
    $name = $_POST['name'];
    $password = $_POST['password'];

    $conn = require('connect.php');

    if (isset($name)) {
        $user = mysqli_real_escape_string($conn, $name); 
        $pass = mysqli_real_escape_string($conn, $password); 
    }
?>