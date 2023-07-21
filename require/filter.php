<?php
    require "connect.php";
    session_start();

    $_SESSION['query'] = $_POST['search'] ?? '';

    $query = $_POST['search'] ?? '';
    $color = $_POST['color'] ?? '';
    $brand = $_POST['brand'] ?? '';
    $to =  $_POST['to'] ?? '';
    $from = (!empty($_POST['from']))? $_POST['from']: 0;
    $category = $_POST['category'] ?? '';
    $and = false;

    $stmt = "SELECT furniture_info.name as name, furniture.id AS id, brand.name AS brand, category.name AS category, price, furniture.image, furniture.color AS color FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN brand ON furniture_info.brand = brand.id LEFT JOIN category ON furniture_info.category = category.id WHERE ";

    if (!empty($color)) {
        $color = implode(", ", $color);
        $stmt  .= "color IN ($color)";
        $and = true;
    }
    if (!empty($brand)) {
        if ($and) $stmt .= " AND ";
        $brand = implode(", ", $brand);
        $stmt  .= "brand IN ($brand)";
        $and = true;
    }
    if (!empty($category)) {
        if ($and) $stmt .= " AND ";
        $category = implode(", ", $category);
        $stmt  .= "category IN ($category)";
        $and = true;
    }
    if (!empty($query)) {
        if ($and) $stmt .= " AND ";
        $q = str_replace("%", "\%", $conn->real_escape_string($query));
        $stmt  .= " furniture_info.name LIKE '%$q%'";
        $and = true;
    }
    if ($to !== '') {
        if ($and) $stmt .= " AND ";
        $stmt  .= "price BETWEEN $from AND $to ";
    } else $stmt .= "price > $from";

    $_SESSION['stmt'] = $stmt;
    $_SESSION['query'] = $query;
    $_SESSION['color'] = $color;
    $_SESSION['brand'] = $brand;
    $_SESSION['category'] = $category;
    $_SESSION['from'] = (!empty($_POST['from']))? $_POST['from'] : '';
    $_SESSION['to'] = (!empty($_POST['to']))? $_POST['to'] : '';
    
    header('location: ../main_pages/filter.php')
?>