<?php
    require "../require/connect.php";

    $id = $_GET['id'];
    $color = $_POST['color'];
    $image = $_FILES['image'];

    $imgName = date('YmdHis');
    $imgType =  (explode('.', $image['name']))[1]
;

    $imgTempName =  $image['tmp_name'];

    $newName = $imgName.'.'.$imgType;

    if (!exif_imagetype($imgTempName)) alertError('Fail yang dimuat naik bukan imej');

    $query = $conn->query("SELECT id FROM furniture WHERE color = $color AND info = $id");

    if ($query->num_rows > 0) {
        alertError("Warna ini sudah wujud untuk produk ini");
    }


    $stmt = $conn->query("INSERT INTO furniture(color, image, info) VALUES ($color, '$newName', $id)");


    if (move_uploaded_file($imgTempName, '../images/' . $newName) and $stmt) echo "<script>
    alert('Warna berjaya ditambah');
    </script>";
?>

<script>
    history.go(-2)
</script>