<?php
    require '../require/connect.php';
    session_start();

    $id = $_SESSION['id'];

    $stmt = $conn->query("DELETE FROM pengguna WHERE id = '$id'");

    if ($stmt) {
        echo "<script> 
            alert('akaun sudah dipadamkan')
            window.location = '../require/logout.php'
        </script>";

    }
?>