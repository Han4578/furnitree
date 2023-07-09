<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        require "../require/main_menu.php";

        if (key_exists('id', $_GET)) {
            $exists = true;
            $brandID = $_GET['id'];
            $query = $conn->query("SELECT * FROM brand WHERE id = $brandID");
            ($query->num_rows > 0)? $row1 = $query->fetch_assoc(): $exists = false; 
        } 

        if (!key_exists('id', $_GET) or !$exists){
            echo "<script>
            alert('Jenama ini tidak wujud')
                    history.back()
                </script>";
            die;
        }

    ?>
    <template>    
        <div class="result-item">
            <div data-imgCon><img src="" alt="" data-image></div>
            <div data-name></div>
            <div data-brand></div>
            <div data-price></div>
        </div>
    </template>
    <title><?php echo $row1['name']; ?></title>
    <br>
    <div class="back pointer" onclick="history.back()"><img src="../images/back.png" alt="">Balik</div>
    <div class="main">

        <div class="action-bar">
            <?php if (checkLogin() and ($_SESSION['level'] == 3 or $_SESSION['brandID'] == $brandID)) { ?>
                <div class="action-button" onclick="edit()">
                    <img src="../images/edit-pencil.svg" alt="">
                </div>
            <?php } ?>
        </div>
        <div class="brand-container">
            <div class="brand-logo">
                <img src="../images/<?php echo $row1['logo'] ?>" alt="">
            </div>
            <div class="brand-info">
                <div class="brand-name">
                    <a href="<?php echo $row1['official'] ?>" target="_blank"><?php echo $row1['official'] ?></a>
                    <span><?php echo $row1['name'] ?></span>
                </div>
                <hr>
                <div class="social">                    
                    <?php if(!empty($row1['fb'])){ ?>
                        <a href="<?php echo $row1['fb']; ?>" target="_blank"><img class="social-link" src="../images/fb logo.webp" alt=""></a>
                    <?php } ?>
                    <?php if(!empty($row1['instagram'])){ ?>
                        <a href="<?php echo $row1['instagram']; ?>" target="_blank"><img class="social-link" src="../images/insta logo.jpg" alt=""></a>
                    <?php } ?>
                    <?php if(!empty($row1['twitter'])){ ?>
                        <a href="<?php echo $row1['twitter']; ?>" target="_blank"><img class="social-link" src="../images/twitter logo.png" alt=""></a>
                    <?php } ?>
                    <?php if(!empty($row1['yt'])){ ?>
                        <a href="<?php echo $row1['yt']; ?>" target="_blank"><img class="social-link" src="../images/yt logo.png" alt=""></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="brand-description">
            <?php echo $row1['description']; ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="results">
            <?php 
                $categories = $conn->query("SELECT category.name AS name, category FROM furniture_info LEFT JOIN category ON furniture_info.category = category.id WHERE furniture_info.brand = $brandID GROUP BY category.id ORDER BY category.id");

                while($category = $categories->fetch_assoc()) {
                    $name = $category['name'];
                    $cat = $category['category'];
            ?> 

            <div class="max-width">
                <h2><?php echo $name; ?></h2>
                <br>
                <hr>
                <div class="<?php echo str_replace(' ', '', $name); ?> cat"></div>
            </div>

            <?php
                    displayItems("document.querySelector('.".str_replace(' ', '', $name)."')", "document.querySelector('template')", "SELECT furniture_info.name as name, furniture.id AS id, brand.name AS brand, price, furniture.image, furniture.color FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN brand ON furniture_info.brand = brand.id LEFT JOIN category ON furniture_info.category = category.id WHERE category = $cat and furniture_info.brand = $brandID"); 
                }
            ?>
        </div>
    </div>
    <script>
        function edit() {
            window.location = '../edit/brand.php?id=' + <?php echo $brandID; ?>
        }
    </script>
</body>
</html>