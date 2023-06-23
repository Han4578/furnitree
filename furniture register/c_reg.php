<?php
    require "../require/connect.php";

    $id = $_GET['id'];
    $color = $_POST['color'];
    $image = $_FILES['image'];

    $imgName =  $image['name'];
    $imgTempName =  $image['tmp_name'];

    if (!exif_imagetype($imgTempName)) die('Fail yang dimuat naik bukan imej');


    $stmt = $conn->query("INSERT INTO furniture(color, image, info) VALUES ($color, '$imgName', $id)");

    if (move_uploaded_file($imgTempName, '../images/' . $imgName) and $stmt) echo "<script>
    alert('Warna berjaya ditambah');
    </script>";
?>

<script>
    history.go(-2)
</script>