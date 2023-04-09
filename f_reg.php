<?php
    $name = $_POST['name'];
    $category = $_POST['category'];
    $color = $_POST['color'];
    $company = $_POST['company'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    

    $imgName =  $image['name'];
    $imgTempName =  $image['tmp_name'];

    require 'connect.php';

    if (!exif_imagetype($imgTempName)) {
         die('File uploaded was not an image');
    }
    else {
        $stmt = $conn->prepare('INSERT INTO furniture(name, color, image, company_id, category, price)
        VALUES(?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('sisiid', $name, $color, $imgName, $company, $category, $price);
        $stmt->execute();
        if (move_uploaded_file($imgTempName, 'images/'.$imgName)) echo 'file uploaded succesfully';
        else echo 'file failed to upload';
        $conn->close();
        $stmt->close();

    }

?>