<?php
    session_start();

    $id = $_GET['id'];

    $_SESSION['stmt'] = "SELECT furniture_info.name as name, furniture.id AS id, brand.name AS brand, price, furniture.image, furniture.color AS color FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN brand ON furniture_info.brand = brand.id LEFT JOIN category ON furniture_info.category = category.id WHERE category.id = $id";
    $_SESSION['query'] = '';
    $_SESSION['color'] = '';
    $_SESSION['brand'] = '';
    $_SESSION['category'] = $id;
    $_SESSION['from'] = '';
    $_SESSION['to'] = '';

    header("location:../main_pages/filter.php");
?>