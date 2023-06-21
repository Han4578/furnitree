<?php
    require "../require/connect.php";

    $id = $_GET['id'];
    $color = $_POST['color'];
    $image = $_FILES['image'];

    $imgName =  $image['name'];
    $imgTempName =  $image['tmp_name'];

    if (!exif_imagetype($imgTempName)) die('Fail yang dimuat naik bukan imej');


    $conn->query("INSERT INTO furniture(color, image, info) VALUES ($color, '$imgName', $id)");

?>

<script>
    history.go(-2)
</script>