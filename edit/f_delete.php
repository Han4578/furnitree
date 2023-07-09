<?php
    require "../require/connect.php";

    $name = $_GET['name'];
    $brand = $_GET['brand'];

    $id = $conn->query("SELECT id FROM furniture_info WHERE name = '$name' AND brand = $brand")->fetch_assoc()['id'];

    $query2 = $conn->query("SELECT image FROM furniture WHERE info = $id");

    while ($row = $query2->fetch_assoc()) {
        $delete = $row['image'];
        $path = realpath("../images/$delete");
        unlink($path);
    }

    $result = $conn->query("DELETE FROM furniture_info WHERE name = '$name'");

    if (true) {
        echo "<script>
            alert('Perabot $name sudah dihapuskan')
            window.location = '../manage/furniture.php'
        </script>"; 
    }

    header('location:')
?>
