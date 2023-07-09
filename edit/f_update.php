<?php
    require "../require/connect.php";
    session_start();

    $productID = $_GET['id'];
    $info = $_GET['info'];
    $name = $conn->real_escape_string($_POST['name']);
    $brand = $conn->real_escape_string($_POST['brand']);
    $price = $_POST['price'];
    $description = $_POST['description'];
    $color = $_POST['color'];
    $image = $_FILES['image']['name'];
;
    $count = 0;
    
    $query = "UPDATE furniture_info SET name = '$name', brand = $brand, price = $price, description = '$description' WHERE id = $info";

    $stmt = $conn->query($query);


    $query2 = $conn->query("SELECT color, image, id FROM furniture WHERE info = $info");
    while ($row = $query2->fetch_assoc()) {
        $id = $row['id'];
        $c = $color[$count];
        $i = ($image[$count] !== '')? date('YmdHis').'.' : $row['image'];
        $t = ($image[$count] !== '')? explode('.', $image[$count])[1]: '';
        $newName = $i.$t;

        if ($image[$count] !== '') {
            $delete = $conn->query("SELECT image FROM furniture WHERE id = $id")->fetch_assoc()['image'];
            $path = realpath("../images/$delete");
            unlink($path);
        }

        $stmt2 = $conn->query("UPDATE furniture SET color = $c, image = '$newName' WHERE id = $id");
        $imgTempName = $_FILES['image']['tmp_name'][$count];
        if ($imgTempName !== "") move_uploaded_file($imgTempName, '../images/' . $newName);
        $count++;
        
    }



    if ($stmt) {
        echo "<script>
        alert('Perabot berjaya dikemas kini.');
        history.go(-2)
        </script>";
    }

?>