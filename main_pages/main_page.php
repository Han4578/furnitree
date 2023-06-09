<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FURNITREE</title>
</head>

<body>
    <template>
        <div class="item">
            <div data-imgCon>
                <img src="" alt="" data-image>
            </div>
            <div data-name></div>
            <div data-brand></div>
            <div data-price></div>
        </div>
    </template>
    <?php
        require '../require/main_menu.php';
    ?>
    <div class="main">
        <?php
            require "../require/search_bar.php";
        ?>
        <div class="banner">
            <img class="ad" src="../images/banner.png" alt="BEEG SALE" onclick="window.location = './product.php?id=6'">
        </div>
        <div class="section">
            <div class="space-between">
                <span>Tambahan terkini</span>
                <a class="pointer" href="./filter.php">lihat semua →</a>
            </div>
            <div class="recommended-list">
                <?php
                    displayItems("document.querySelector('.recommended-list')", "document.querySelector('template')", "SELECT furniture_info.name as name, price, image, furniture.id AS id, brand.name AS brand, furniture.color FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN brand ON furniture_info.brand = brand.id GROUP BY name ORDER BY furniture_info.id DESC LIMIT 10");
                ?>
            </div>
        </div>
        <div class="section">
            <br>
            <hr>
            <div class="category-list">
                <?php
                    $menuQuery = $conn->query("SELECT * FROM category");
                    
                    while ($menuRow = $menuQuery->fetch_assoc()) {
                        ?> 
                        <div class="category" data-category-item id="<?php echo $menuRow['id'];?>" onclick="redirect.category(this.id)"><img src="../images/<?php echo $menuRow['image'] ?>" alt=""><span><?php echo $menuRow['name'] ?></span></div>
                        <?php
                    }
                ?>
            </div>
        </div>

    </div>
</body>

</html>