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
        $_SESSION['stmt'] = $_SESSION['stmt'] ?? '';
        $_SESSION['query'] = $_SESSION['query'] ?? '';
        $_SESSION['brand'] = $_SESSION['brand'] ?? '';
        $_SESSION['color'] = $_SESSION['color'] ?? '';
        $_SESSION['category'] = $_SESSION['category'] ?? '';
        $_SESSION['from'] = $_SESSION['from'] ?? '';
        $_SESSION['to'] = $_SESSION['to'] ?? '';

    ?>
    <div class="main">
        <form action="../require/filter.php" class="search-section" method="post">
            <div class="search-container">
                <input type="text" name="search" id="search-bar" placeholder="Search..." value="<?php echo $_SESSION['query']; ?>">
                <img src="../images/filter.png" class="filter pointer">
                <button type="submit" class="search">S</button>
            </div>
            <div id="filter-menu">
                <div class="filter-menu">
                    <div class="search-column">
                        <div>Warna:</div>
                        <br>
                        <div class="selections S1">
                            <?php
                                $color = $_SESSION['color'];
                                displaySelections('document.querySelector(".S1")', "SELECT * FROM color", 'name', 'id', 'color', $color);
                            ?>
                        </div>
                    </div>
                    <div class="search-column">
                        <div>Jenama:</div>
                        <br>
                        <div class="selections S2">
                            <?php
                                $brand = $_SESSION['brand'];
                                displaySelections('document.querySelector(".S2")', "SELECT * FROM pengguna WHERE aras = '2'", 'pengguna_name', 'id', 'brand', $brand);
                            ?>
                        </div>
                    </div>
                    <div class="search-column">
                        <div>Kategori:</div>
                        <br>
                        <div class="selections S3">
                            <?php
                                $category = $_SESSION['category'];
                                displaySelections('document.querySelector(".S3")', "SELECT * FROM category", 'name', 'id', 'category', $category);
                            ?>
                        </div>
                    </div>
                
                    <div class="search-column">
                        <div>Harga:</div>
                        <br>
                        <div class="selections">
                            <label for="filter-price">Dari RM</label>
                            <input class="custom input" type="number" name="from" id="filter-price" value="<?php echo $_SESSION['from'] ?>">
                            <label for="filter-price">Hingga RM</label>
                            <input class="custom input  " type="number" name="to" id="filter-price" value="<?php echo $_SESSION['to'] ?>">
                        </div>
                    </div>
                </div>
                <div class="space-evenly">
                    <button type="button" data-reset name="" id="" class="custom button">Set semula</button>
                    <button type="submit" name="" id="" class="custom button yes">Terapkan</button>
                </div>
            </div>
        </form>
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
                    displayItems("document.querySelector('.recommended-list')", "document.querySelector('template')", "SELECT * FROM furniture LEFT JOIN company ON furniture.company_id = company.company_id GROUP BY furniture_name");
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