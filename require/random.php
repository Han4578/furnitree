<?php
    require "../require/connect.php";

    $query = $conn->query("SELECT id FROM furniture");

    $array = [];

    while ($id = $query->fetch_assoc()['id']) {
        array_push($array, $id);
    }

    $randNum = rand(0, count($array) - 1);

    $id = $array[$randNum];

    header("location:../main_pages/product.php?id=$id");
?>