<?php
    $name = $_POST['name'];
    $category = $_POST['category'];
    $color = $_POST['color'];
    $company = $_POST['company'];
    $price = $_POST['price'];
    $image = $_FILES['image'];


    $imgName =  date('YmdHis');
    $imgType =  (explode('.', $image['name']))[1];

    $imgTempName =  $image['tmp_name'];

    $newName = $imgName.'.'.$imgType;

    require "../require/connect.php";

    if (!exif_imagetype($imgTempName)) die('Fail yang dimuat naik bukan imej');

    $check = $conn->query("SELECT * FROM furniture_info WHERE name = '$name' AND company = $company");
    
    if ($check->num_rows > 0) die ("Perabot dengan nama yang sama sudah wujud");
    
    $stmt1 = $conn->query("INSERT INTO furniture_info(name, company, price, category) 
    VALUES ('$name','$company',$price,'$category')");

    $info = $conn->query("SELECT id FROM furniture_info WHERE name = '$name' AND company = $company")->fetch_assoc();

    $id = $info['id'];

    $stmt2 = $conn->query("INSERT INTO furniture(color, image, info) 
    VALUES ($color, '$newName', $id)");


    if (move_uploaded_file($imgTempName, '../images/' . $newName) and $stmt1 and $stmt2) echo "<script>
        alert('Perabot berjaya didaftar');
        window.location = '../manage/furniture.php';
        </script>";
?>