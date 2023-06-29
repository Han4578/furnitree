<?php
    require '../require/connect.php';
    session_start();

    $id = $_GET['id'];

    $stmt = $conn->query("DELETE FROM pengguna WHERE id = '$id'");

    
    if ($stmt) {
        $location = ($_SESSION['id'] == $id)? '../require/logout.php' : '../manage/user.php';
        echo "<script> 
            alert('akaun sudah dipadamkan')
            window.location = '$location'
        </script>";

    }
?>