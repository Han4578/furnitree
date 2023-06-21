<?php
    require "../require/connect.php";

    $name = $_GET['name'];

    $result = $conn->query("DELETE FROM furniture_info WHERE name = '$name'");

    if (true) {
        echo "<script>
            alert('Perabot $name sudah dihapuskan')
            window.location = '../manage/furniture.php'
        </script>"; 
    }

    header('location:')
?>
