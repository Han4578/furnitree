<?php
    require '../require/connect.php';
    session_start();

    $id = $_GET['id'];

    $stmt = $conn->query("DELETE FROM company WHERE id = '$id'");

    if ($stmt) {
        echo "<script> 
            alert('Jenama sudah dipadamkan')
            window.location = '../main_pages/main_page.php'
        </script>";

    }
?>