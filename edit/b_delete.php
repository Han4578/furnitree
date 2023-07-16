<?php
    require '../require/connect.php';
    session_start();

    $id = $_GET['id'];

    $delete = $conn->query("SELECT logo FROM brand WHERE id = $id")->fetch_assoc()['logo'];
    $path = realpath("../images/$delete");
    unlink($path);


    $furnitures = $conn->query("SELECT image FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id WHERE furniture_info.brand = $id");
    
    while ($row = $furnitures->fetch_assoc()) {
        $delete = $row['image'];
        $path = realpath("../images/$delete");
        unlink($path);
    }

    $stmt = $conn->query("DELETE FROM brand WHERE id = '$id'");

    $_SESSION['brandID'] = '';

    if ($stmt) {
        echo "<script> 
            alert('Jenama berjaya dipadamkan')
            window.location = '../manage/brand.php'
        </script>";
    }
?>