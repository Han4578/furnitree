<?php
    $name = $_POST['name'];

    $image = $_FILES['image'];

    $imgName =  $image['name'];
    $imgTempName =  $image['tmp_name'];

    require 'connect.php';

    if (!is_array(pathinfo($imgTempName, 'PATHINFO_EXTENSION'), ['jpg', 'png', 'webp', 'jpeg'])) {
        die('File uploaded was not an image ');

    }else {
        $stmt = $conn->prepare('INSERT INTO company(name, logo)');
        $stmt->bind_param('ss',$name, $imgName);
        $stmt->execute();
        if (move_uploaded_file($imgTempName, 'images/'.$imgName)) echo 'file uploaded succesfully';
        $query = $conn->query('SELECT logo FROM company');
        $conn->close();

    }
?>