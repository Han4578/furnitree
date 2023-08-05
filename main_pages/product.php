<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
            require "../require/main_menu.php";

            if (!key_exists('id', $_GET)) alertError('Produk ini tidak wujud');

            $productID = $_GET['id'];
            $query1 = $conn->query("SELECT furniture_info.name as name, price, image, furniture_info.description AS description, furniture.id AS id, brand.name AS brand, brand.id AS brandID, category FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN brand ON furniture_info.brand = brand.id WHERE furniture.id = $productID  GROUP BY name");
            
            if ($query1->num_rows == 0) alertError('Produk ini tidak wujud');       

            $row1 = $query1->fetch_assoc();
            $brandID = $row1['brandID'];
        ?>
        <title><?php echo $row1['name']; ?></title>
        <template id="temp1">
            <div class="color-img">
                <img src="" alt="">
            </div>
        </template>
        <template id="temp2">
            <div class="related-item">
                <div data-imgCon>
                    <img src="" alt="" data-image>
                </div>
                <div data-name></div>
                <div data-brand></div>
                <div data-price></div>
            </div>
        </template>
        <br>
        <div class="back pointer print" onclick="history.back()"><img src="../images/back.png" alt="">Balik</div>
        <div class="action-bar print">
            <?php if (checkLogin()) {
                if ($_SESSION['level'] == 3 or $_SESSION['brandID'] == $brandID) { ?>
                    <div class="action-button" onclick="edit()">
                        <img src="../images/edit-pencil.svg" alt="">
                    </div>
            <?php  
                } 

                if ($_SESSION['level'] == 1) { 
                    $userID = $_SESSION['id'];
                    $pilihan = $conn->query("SELECT * FROM pilihan WHERE pengguna = $userID AND produk = $productID")->num_rows;

                    if ($pilihan == 0) {
                    ?>
                    <div class="counter">
                        <span class="sub"> - </span>
                        <span class="number"> 1 </span>
                        <span class="addition"> + </span>
                    </div>
                    <?php } ?>
                    <div class="action-button <?php 

                        if($pilihan > 0) echo "green";
                    ?>" onclick="<?php echo ($pilihan > 0)? "deleteChosen()" : "choose()" ; ?>;" title="<?php echo ($pilihan > 0)? "Batalkan pilihan": "Tambah pilihan"; ?>">
                        <img src="../images/choose.png" alt="">
                    </div>
            <?php  
                } 
            }
            ?>
                <div class="action-button" onclick="printInfo()">
                    <img src="../images/print.png" alt="" title="Cetak">
                </div>
        </div>
        <div class="main split">
            <div class="product-info">
                <div class="space-between product-column">
                    <div>
                        <div class="name"><?php echo htmlspecialchars($row1['name']); ?></div>
                        <div class="brand">Dari <a href="./brand.php?id=<?php echo $brandID; ?>" class="brand"><?php echo htmlspecialchars($row1['brand']); ?></a></div>
                    </div>
                    <div class="price"><?php displayPrice($row1['price'], "document.querySelector('.price')"); ?></div>
                </div>
                <div class="description">
                    Diskripsi: <br>
                    <?php 
                        echo (!empty($row1['description']))? htmlspecialchars($row1['description']) : "Tiada deskripsi";
                    ?>
                </div>
                <div class="color-list">
                    <?php 
                        $name = $conn->real_escape_string($row1['name']);
                        $query2 = $conn->query("SELECT image, furniture.id AS id FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id WHERE furniture_info.name = '$name'");

                        if ($query2->num_rows > 0) {
                            while ($row2 = $query2->fetch_assoc()) {
                                $image = $row2['image'];
                                $id = $row2['id'];
                                $highlight = false;
        
                                if($id == $_GET['id']) {
                                    $highlight = true;    
                                }
        
                                echo "<script>
                                        displayAlt(document.querySelector('.color-list'), '$image', document.querySelector('#temp1'), '$id', $highlight)
                                    </script>";
                                
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="product-container">
                <div class="product-image">
                    <img src="../images/<?php echo $row1['image'] ?>" alt="">
                </div>

            </div>
        </div>
        <div class="related print">
            Yang berkaitan: 
            <br>
            <br>
            <div class="recommended-list">
                <?php
                    $category = $row1['category'];
                    displayItems("document.querySelector('.recommended-list')", "document.querySelector('#temp2')", "SELECT furniture_info.name as name, price, image, furniture.id AS id, brand.name AS brand, furniture.color FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN brand ON furniture_info.brand = brand.id WHERE furniture_info.name != '$name' AND (furniture_info.brand = $brandID OR furniture_info.category = $category) GROUP BY name");
                ?>
            </div>
        </div>
        <script>
            let alts = document.querySelector('.color-list')
            let img = document.querySelector('.product-image').firstElementChild
            let addition = document.querySelector('.addition') ?? document.createElement('div')
            let number = document.querySelector('.number') ?? document.createElement('div')
            let sub = document.querySelector('.sub') ?? document.createElement('div')
            let counter = 1

            function edit() {
                window.location = '../edit/furniture.php?id=' + <?php echo $productID; ?>
            }

            function choose() {
                window.location = '../require/pilihan_insert.php?id=' + <?php echo $productID; ?> + "&num=" + counter
            }

            function deleteChosen() {
                window.location = '../require/pilihan_delete.php?produk=' + <?php echo $productID; ?>
            }


            for (const alt of alts.children) {
                alt.addEventListener('click', () => {
                    window.location = "./product.php?id=" + alt.id
                })
            }

            addition.addEventListener('click', () => {
                number.innerText = ++counter
            })

            sub.addEventListener('click', () => {
                if (--counter < 1) counter = 1
                number.innerText = counter
            })
        </script>
    </body>
</html>