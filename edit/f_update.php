<?php
    require "../require/connect.php";
    session_start();

    $productID = $_GET['id'];
    $info = $_GET['info'];
    $name = $conn->real_escape_string($_POST['name']);
    $brand = $conn->real_escape_string($_POST['brand']);
    $price = $_POST['price'];
    $description = $conn->real_escape_string($_POST['description']);
    $color = $_POST['color'];
    $image = $_FILES['image']['name'];
    $count = 0;

    $check = $conn->query("SELECT * FROM furniture_info WHERE name = '$name' AND brand = $brand AND id != $productID");
    if ($check->num_rows > 0) alertError("Produk dengan nama yang sama sudah wujud dalam jenama ini");
    
    $query = "UPDATE furniture_info SET name = '$name', brand = $brand, price = $price, description = '$description' WHERE id = $info";

    $stmt = $conn->query($query);

    $query2 = $conn->query("SELECT color, image, id FROM furniture WHERE info = $info");
    while ($row = $query2->fetch_assoc()) {
        $id = $row['id'];
        $c = $color[$count];
        $i = ($image[$count] !== '')? date('YmdHis').'.' : $row['image']; //img name
        $t = ($image[$count] !== '')? explode('.', $image[$count])[1]: ''; // type
        $imgTempName = $_FILES['image']['tmp_name'][$count];
        $newName = $i.$t;

        if ($image[$count] !== '') {
            if (!exif_imagetype($imgTempName)) alertError("Fail yang dimuat naik bukan imej");
            $delete = $conn->query("SELECT image FROM furniture WHERE id = $id")->fetch_assoc()['image'];
            $path = realpath("../images/$delete");
            unlink($path);
            $stmt2 = $conn->query("UPDATE furniture SET color = $c, image = '$newName' WHERE id = $id");
            move_uploaded_file($imgTempName, '../images/' . $newName);
        }

        $count++;
        
    }

    if ($stmt) {
        echo "<script>
        alert('Produk berjaya dikemas kini.');
        history.go(-2)
        </script>";
    }
?>