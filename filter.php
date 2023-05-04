<?php
    session_start();
    require 'connect.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="script.js" defer></script>
        <script src="functions.js"></script>
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
        <div class="atas">
            <div class="ikon close" id="menu">
                <img src="./images/Hamburger_icon.png" alt="hamburger-icon">
            </div>
            <h1>FURNITREE</h1>
            <div class="ikon">
                <img src="./images/user_icon.png" id="user" alt="user-icon">
            </div>
        </div>
        <div class="darken close"></div>
        <div id="menu-list">
            <h1 class="menu-logo">Menu</h1>
            <div class="menu-button">home</div>
            <div class="menu-button">filter</div>
            <div class="menu-button">settings</div>
        </div>
        <div class="main">
            <div class="search-container">
                <input type="text" name="search" id="search-bar" placeholder="Search...">
                <button class="search">S</button>
            </div>
            <div class="results">
                <?php
                    $query = $conn->query("SELECT * FROM furniture LEFT JOIN company ON furniture.company_id = company.id");

                    if ($query->num_rows > 0) {
                        while ($row = $query->fetch_assoc()) {
                            $image = $row['image'];
                            $price = $row['price'];
                            $name = $row['name'];
                            $company = $row['company_name'];
                            echo "<script>
                                    displayItems(document.querySelector('.results'), '$name', '$image', $price, '$company', document.querySelector('template'))
                            </script>";
                        }
                    }
                
                ?>
            </div>
        </div>
    </body>
</html>