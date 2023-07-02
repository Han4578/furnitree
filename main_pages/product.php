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

        if (!key_exists('id', $_GET)) {
            echo "<script>
                    alert('Produk ini tidak wujud')
                    history.back()
                </script>";
        }

        $productID = $_GET['id'];
        $query1 = $conn->query("SELECT furniture_info.name as name, price, image, furniture_info.description AS description, furniture.id AS id, company.name AS company, company.id AS companyID FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN company ON furniture_info.company = company.id WHERE furniture.id = $productID  GROUP BY name");
        
        if ($query1->num_rows == 0) {
            echo "<script>
                    alert('Produk ini tidak wujud')
                    history.back()
                </script>";
            die();
        }       

        $row1 = $query1->fetch_assoc();
        $companyID = $row1['companyID'];
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
            <div data-company></div>
            <div data-price></div>
        </div>
    </template>
    <br>
    <div class="back pointer" onclick="history.back()"><img src="../images/back.png" alt=""> Balik</div>
    <div class="main split">
        <div class="product-info">
            <div class="space-between">
                <div>
                    <div class="name"><?php echo $row1['name']; ?></div>
                    <div class="company">Dari <a href="./brand.php?id=<?php echo $companyID; ?>" class="company"><?php echo $row1['company']; ?></a></div>
                </div>
                <div class="price"><?php displayPrice($row1['price'], "document.querySelector('.price')"); ?></div>
            </div>
            <div class="description">
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
        Yang berkaitan: 
        <br>
        <br>
        <div class="recommended-list">
            <?php
                displayItems("document.querySelector('.recommended-list')", "document.querySelector('#temp2')", "SELECT furniture_info.name as name, price, image, furniture.id AS id, company.name AS company, furniture.color FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN company ON furniture_info.company = company.id WHERE furniture_info.name != '$name' GROUP BY name");
            ?>
        </div>
    </div>
    <div class="space-around max-width">
        <div></div>
        <button class="print custom button" onclick="printInfo()">Cetak</button>
    </div>
    <?php if (($_SESSION['level'] ?? 1) == 3 or ($_SESSION['id'] ?? 0) == $row1['companyID']) { ?>
        <div class="edit">
            <img src="../images/edit-pencil.svg" alt="">
        </div>
    <?php } ?>
    <script>
        let alts = document.querySelector('.color-list')
        let img = document.querySelector('.product-image').firstElementChild
        let edit = document.querySelector('.edit') ?? document.createElement('div')

        edit.addEventListener('click', () => {
            window.location = '../edit/furniture.php?id=' + <?php echo $productID; ?>
        })


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