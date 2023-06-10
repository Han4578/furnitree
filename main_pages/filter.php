<?php
    $_SESSION['query'] = $_GET['search'] ?? '';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cari</title>
    </head>
    <body>
        <template>    
            <div class="result-item">
                <div data-imgCon><img src="" alt="" data-image></div>
                <div data-name></div>
                <div data-company></div>
                <div data-price></div>
            </div>
        </template>
        <?php 
            require '../require/main_menu.php';
            $_SESSION['query'] = $_GET['search'] ?? '';
        ?>
        <div class="main">
            <form class="search-container" action="filter.php" method="get">
                <input type="search" name="search" id="search-bar" placeholder="Search..." value="<?php echo $_SESSION['query']; ?>">
                <button type="submit" class="search">S</button>
            </form>
            <div class="results">
                <?php
                    displayItems("document.querySelector('.results')", "document.querySelector('template')", "SELECT * FROM furniture LEFT JOIN company ON furniture.company_id = company.company_id");
                ?>
            </div>
        </div>
    </body>
</html>