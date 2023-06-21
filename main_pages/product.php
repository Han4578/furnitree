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

        if (!key_exists('id', $_GET)) {
            die("Produk ini tidak wujud");
        }

        $productID = $_GET['id'];
        $query1 = $conn->query("SELECT furniture_info.name as name, price, image, description, furniture.id AS id, pengguna.name AS company FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN pengguna ON furniture_info.company = pengguna.id WHERE furniture.id = $productID  GROUP BY name");
        $row1 = $query1->fetch_assoc()
    ?>
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
            <div data-company></div>
            <div data-price></div>
        </div>
    </template>
    <br>
    <div class="main split">
        <div class="product-info">
            <div class="space-between">
                <div>
                    <div class="name"><?php echo $row1['name'] ?></div>
                    <div class="company">Dari <?php echo $row1['company'] ?></div>
                </div>
                <div class="price"><?php echo $row1['price'] ?></div>
            </div>
            <div>
                Diskripsi: <br>
                <?php 
                    echo ($row1['description'] !== "")? $row1['description'] : "Tiada deskripsi";
                ?>
            </div>
            <div class="color-list">
                <?php 
                    $name = $row1['name'];
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
    <div class="related">
        Yang berkaitan: <br>
        <div class="related-list">
            <?php
                displayItems("document.querySelector('.related-list')", "document.querySelector('#temp2')", "SELECT furniture_info.name as name, price, image, furniture.id AS id, pengguna.name AS company FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN pengguna ON furniture_info.company = pengguna.id  GROUP BY name");
            ?>
        </div>
    </div>
    <div class="space-around max-width">
        <div></div>
        <button class="print custom button" onclick="printInfo()">Cetak</button>
    </div>
    <div class="edit">
        <img src="../images/edit-pencil.svg" alt="">
    </div>
    <script>
        let price = document.querySelector(".price")
        let alts = document.querySelector('.color-list')
        let img = document.querySelector('.product-image').firstElementChild
        let edit = document.querySelector('.edit')

        edit.addEventListener('click', () => {
            window.location = '../edit/furniture.php?id=' + <?php echo $productID; ?>
        })

        price.innerText = "RM" + parseFloat(price.innerText).toFixed(2)

        for (const alt of alts.children) {
            alt.addEventListener('click', () => {
                img.src = alt.dataset.src
                for (const a of alts.children) {
                    a.classList.remove('highlighted')
                    if (a == alt) a.classList.add('highlighted')
                }
            })
        }
    </script>
</body>
</html>