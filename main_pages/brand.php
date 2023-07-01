<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        require "../require/main_menu.php";

        if (!key_exists('id', $_GET)) {
            die("Jenama ini tidak wujud");
        }


        $brandID = $_GET['id'];
        $query1 = $conn->query("SELECT * FROM company WHERE id = $brandID");
        $row1 = $query1->fetch_assoc()
    ?>
    <template>    
        <div class="result-item">
            <div data-imgCon><img src="" alt="" data-image></div>
            <div data-name></div>
            <div data-company></div>
            <div data-price></div>
        </div>
    </template>
    <div class="main">
        <div class="company-container">
            <div class="company-logo">
                <img src="../images/<?php echo $row1['logo'] ?>" alt="">
            </div>
            <div class="company-info">
                <div class="company-name">
                    <a href="<?php echo $row1['official'] ?>" target="_blank"><?php echo $row1['official'] ?></a>
                    <span><?php echo $row1['name'] ?></span>
                    <?php if (checkLogin() and ($_SESSION['level'] == 3 or ($_SESSION['brand']) == $brandID)) { ?>
                        <div class="edit">
                            <img src="../images/edit-pencil.svg" alt="">
                        </div>
                    <?php } ?>
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
        <div class="company-description">
            <?php echo $row1['description']; ?>
        </div>
        <div class="results">
            <?php 
                $categories = $conn->query("SELECT category.name AS name, category FROM furniture_info LEFT JOIN category ON furniture_info.category = category.id WHERE furniture_info.company = $brandID");

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
                    displayItems("document.querySelector('.".str_replace(' ', '', $name)."')", "document.querySelector('template')", "SELECT furniture_info.name as name, furniture.id AS id, company.name AS company, price, furniture.image FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN company ON furniture_info.company = company.id LEFT JOIN category ON furniture_info.category = category.id WHERE category = $cat and furniture_info.company = $brandID"); 
                }

            ?>
        </div>
    </div>
    <script>
        let edit = document.querySelector('.edit') ?? document.createElement('div')

        edit.addEventListener('click', () => {
            window.location = '../edit/brand.php?id=' + <?php echo $brandID; ?>
        })
    </script>
</body>
</html>