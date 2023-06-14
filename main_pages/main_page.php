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
            <div data-company></div>
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
            <img class="ad" src="../images/banner.png" alt="BEEG SALE">
        </div>
        <div class="section">
            <div class="space-between">
                <span>Recommended items</span>
                <span>see more</span>
            </div>
            <div class="recommended-list">
                <?php
                    displayItems("document.querySelector('.recommended-list')", "document.querySelector('template')", "SELECT furniture_info.name as name, price, image, furniture_info.id AS id, pengguna.name AS company FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN pengguna ON furniture_info.company = pengguna.id  GROUP BY name");
                ?>
            </div>
        </div>
        <div class="section">
            <div>Categories</div>
            <div class="category-list">
                <div class="category"></div>
                <div class="category"></div>
                <div class="category"></div>
                <div class="category"></div>
                <div class="category"></div>
                <div class="category"></div>
                <div class="category"></div>
                <div class="category"></div>
            </div>
        </div>
        <div class="section">
            <div class="space-between">
                <span>Outdoor furnitures</span>
                <span>see more</span>
            </div>
            <div class="recommended-list">
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
            </div>
        </div>
        <div class="section">
            <div class="space-between">
                <span>Furniture sets</span>
                <span>see more</span>
            </div>
            <div class="recommended-list">
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
            </div>
        </div>

    </div>
</body>

</html>