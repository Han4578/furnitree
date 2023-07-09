<?php
    require '../require/connect.php';
    session_start();

    $id = $_GET['id'];

    $query = $conn->query("SELECT picture, aras FROM pengguna WHERE id = $id")->fetch_assoc();

    $delete = $query['picture'];
    $path = realpath("../images/$delete");
    unlink($path);

    if ($query['aras'] == 2) {
        $query2 = $conn->query("SELECT logo, id FROM brand WHERE account = $id");

        if ($query2->num_rows > 0) {
            $row2 = $query2->fetch_assoc();
            $delete = $row2['logo'];
            $path = realpath("../images/$delete");
            unlink($path);
            
            $brandID = $row2['id'];
            $furnitures = $conn->query("SELECT image FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id WHERE furniture_info.brand = $brandID");
            
            while ($row = $furnitures->fetch_assoc()) {
                $delete = $row['image'];
                $path = realpath("../images/$delete");
                unlink($path);
            }
        }
    
    }

    $stmt = $conn->query("DELETE FROM pengguna WHERE id = '$id'");

    
    if ($stmt) {
        $location = ($_SESSION['id'] == $id)? '../require/logout.php' : '../manage/user.php';
        echo "<script> 
            alert('akaun berjaya dipadamkan')
            window.location = '$location'
        </script>";

    }
?>