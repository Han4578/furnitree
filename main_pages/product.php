<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require "../require/main_menu.php";
        $productID = $_GET['id'];
        $query = $conn->query("SELECT * FROM furniture LEFT JOIN company ON furniture.company_id = company.company_id WHERE furniture.id = $productID");
        $row = $query->fetch_assoc()
    ?>
    <br>
    <div class="main split">
        <div class="product-info">
            <div class="space-between">
                <div>
                    <div class="name"><?php echo $row['name'] ?></div>
                    <div class="company">Dari <?php echo $row['company_name'] ?></div>
                </div>
                <div class="price">RM<?php echo $row['price'] ?></div>
            </div>
            <div>
                Diskripsi: <br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc facilisis pretium tellus, quis pulvinar diam varius sit amet. In sit amet quam pretium, facilisis ante id, blandit justo. Donec a gravida diam, eget bibendum enim. Pellentesque vulputate commodo massa in tempor. In ut ligula maximus, efficitur mi sagittis, tempus eros.
            </div>
            <div class="color-list">
                <div class="color" style="background-color: red;"></div>
                <div class="color" style="background-color: green;"></div>
            </div>
            <div></div>
        </div>
        <div class="product-container">
            <div class="product-image">
                <img  src="../images/<?php echo $row['image'] ?>" alt="">
            </div>

        </div>
    </div>
    <div class="related">
        Related: <br>
        <div class="related-list">
            <div class="related-item">a</div>
            <div class="related-item">a</div>
            <div class="related-item">a</div>
            <div class="related-item">a</div>
            <div class="related-item">a</div>
            <div class="related-item">a</div>
            <div class="related-item">a</div>
            <div class="related-item">a</div>
            <div class="related-item">a</div>
            <div class="related-item">a</div>
            <div class="related-item">a</div>
            <div class="related-item">a</div>
            <div class="related-item">a</div>
            <div class="related-item">a</div>
            <div class="related-item">a</div>
            <div class="related-item">a</div>
            <div class="related-item">a</div>
        </div>
    </div>
    
</body>
</html>