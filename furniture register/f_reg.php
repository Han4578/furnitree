<?php
    $name = $_POST['name'];
    $category = $_POST['category'];
    $color = $_POST['color'];
    $company = $_POST['company'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $indoors = $_POST['indoors'];
    

    $imgName =  $image['name'];
    $imgTempName =  $image['tmp_name'];

    require "../connect.php";

    if (!exif_imagetype($imgTempName)) {
         die('File uploaded was not an image');
    }
    else {
        $stmt = $conn->prepare('INSERT INTO furniture(name, color, image, company_id, category, price, indoors)
        VALUES(?, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('sisiidi', $name, $color, $imgName, $company, $category, $price, $indoors);
        $stmt->execute();
        $conn->close();
        $stmt->close();
        if (move_uploaded_file($imgTempName, 'images/'.$imgName)) echo "<script>
        alert('file uploaded succesfully');
        window.location = 'furniture_register.php';
        </script>";

    }
