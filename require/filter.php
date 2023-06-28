<?php
    require "connect.php";
    session_start();

    $_SESSION['query'] = $_POST['search'] ?? '';

    $query = $_POST['search'] ?? '';
    $color = $_POST['color'] ?? '';
    $brand = $_POST['brand'] ?? '';
    $from =(!empty($_POST['from']))? $_POST['from'] : 0;
    $to = (!empty($_POST['to']))? $_POST['to'] : 1000000;
    $category = $_POST['category'] ?? '';
    $and = false;

    $stmt = "SELECT furniture_info.name as name, furniture_info.id AS id, company.name AS company, category.name AS category, price, image FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN company ON furniture_info.company = company.id LEFT JOIN category ON furniture_info.category = category.id WHERE ";

    if (!empty($color)) {
        $color = implode(", ", $color);
        $stmt  .= "color IN ($color)";
        $and = true;
    }
    if (!empty($brand)) {
        if ($and) $stmt .= " AND ";
        $brand = implode(", ", $brand);
        $stmt  .= "company IN ($brand)";
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
        $stmt  .= " name LIKE '%$query%'";
        $and = true;
    }

    if ($and) $stmt .= " AND ";
    $stmt  .= "price BETWEEN $from AND $to";
    
    $_SESSION['stmt'] = $stmt;
    $_SESSION['query'] = $query;
    $_SESSION['color'] = $color;
    $_SESSION['brand'] = $brand;
    $_SESSION['category'] = $category;
    $_SESSION['from'] = (!empty($_POST['from']))? $_POST['from'] : '';
    $_SESSION['to'] = (!empty($_POST['to']))? $_POST['to'] : '';
    
    
    header('location: ../main_pages/filter.php')
?>