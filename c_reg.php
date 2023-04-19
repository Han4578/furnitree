<?php
    $name = $_POST['name'];

    $image = $_FILES['image'];

    $imgName =  $image['name'];
    $imgTempName =  $image['tmp_name'];

    require 'connect.php';

    if (!exif_imagetype($imgTempName)) {
        die('File uploaded was not an image');

    }else {
        $stmt = $conn->prepare("INSERT INTO company(name, logo) 
        VALUES(?, ?)");
        $stmt->bind_param('ss',$name, $imgName);
        $stmt->execute();
        $conn->close();
        if (move_uploaded_file($imgTempName, 'images/'.$imgName)) echo "<script>
        alert('file uploaded succesfully');
        window.location = 'company_register.php';
        </script>";
    }
?>