<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemas kini perabot</title>
</head>
<body>
    <?php
        require "../require/register_menu.php";

        if (!key_exists('id', $_GET)) {
            echo "<script>
                    alert('Produk ini tidak wujud')
                    history.back()
                </script>";
            die;
        }

        $productID = $_GET['id'];
        $query1 = $conn->query("SELECT info, furniture_info.name as name, price, image, furniture_info.description, furniture_info.id AS id, brand.name AS brand, brand.id AS brandID FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN brand ON furniture_info.brand = brand.id WHERE furniture.id = $productID  GROUP BY name");
        
        if ($query1->num_rows == 0) {
            echo "<script>
                    alert('Produk ini tidak wujud')
                    history.back()
                </script>";
            die();
        }      
        $row1 = $query1->fetch_assoc();

        if (!checkLogin() or ($_SESSION['brandID'] != $row1['brandID'] and $_SESSION['level'] < 3)) accessDenied();

    ?>
    <br>
    <div class="action-bar">
        <div class="action-button delete" onclick="deleteFurniture()">
            <img src="../images/delete.png" alt="">
        </div>
            </div>
    <div class="back pointer" onclick="history.back()"><img src="../images/back.png" alt="">Balik</div>
    <form action="./f_update.php?info=<?php echo $row1['info']?>&id=<?php echo $productID?>" method="post" enctype="multipart/form-data" onsubmit="checkError()">
        <div class="main card">
            <div class="product-info">
                <div class="input-split">
                    <div class="edit-furniture">
                        <label class="input" for="name">Nama: </label>
                        <?php if ($_SESSION['level'] == 3) { ?>
                            <label class="input" for="brand">Jenama: </label>
                        <?php } ?>
                        <label class="input" for="price">Harga: </label>
                        <label class="input" for="description">Deskripsi: </label>
                    </div>
                    <div class="edit-furniture">
                        <input class="input" id="name" name="name" value="<?php echo $row1['name'] ?>" required></input>
                        
                        <select class="input border <?php if ($_SESSION['level'] == 2) echo "none" ?>" name="brand" id="brand" required>
                            <?php
                                $brandQuery = $conn->query("SELECT name, id FROM brand");
                                while ($row3 = $brandQuery->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row3['id'] ?>"  <?php if ($row3['name'] == $row1['brand']) echo "selected" ?>><?php echo $row3['name'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                        <input class="input" id="price" name="price" value="<?php echo $row1['price'] ?>" required></input>
                        <textarea name="description" id="description" cols="51" rows="10" maxlength="1000"><?php echo $row1['description'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="product-info">
                <div class="edit-furniture">
                    <div class="space-between">
                        <div>Warna</div>
                        <div class="add pointer" onclick="window.location='../furniture register/color_register.php?id=<?php echo $row1['info'] ?>'">+</div>
                    </div>
                    <?php
                        $name = $row1['name'];
                        $query2 = $conn->query("SELECT image, color.id AS color, furniture.id AS id FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN color ON furniture.color = color.id WHERE furniture_info.name = '$name'");
                        $i = 1;
                        $length = $query2->num_rows;
                        if ($length > 0) {
                            while ($row2 = $query2->fetch_assoc()) {
                                $image = $row2['image'];
                                $id = $row2['id'];
                    ?>
                    <hr>
                    <div class="row">
                        <select name="color[]" data-color>
                            <?php
                                $query3 = $conn->query("SELECT color.name AS name, color.id AS id FROM color");
                                $f = 1;
                                while ($row3 = $query3->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row3['id'] ?>" <?php if ($row3['id'] == $row2['color']) echo 'selected' ?>><?php echo $row3['name'] ?></option>
                                    <?php
                                    $f++;
                                }
                            ?>
                        </select>
                        <input class="none" type="file" id="image<?php echo $i ?>" name="image[]" accept="image/*">
                        <div class="center">
                            <label for="image<?php echo $i ?>" class="camera furniture">
                                        <img src="../images/camera.png" alt="">
                            </label>
                            <img class="square image<?php echo $i ?>" data-pfp src="../images/<?php echo $image; ?>" alt="gambar warna">
                        </div>
                        <?php 
                            if ($length > 1) {
                        ?>
                                <div class="variant-delete" id="<?php echo $id ?>">
                                    <img src="../images/delete.png" alt="delete">
                                </div>
                            <?php 
                            } else {
                            ?>
                                <div class="variant-white" id="<?php echo $id ?>">
                                </div>  

                        <?php 
                            }
                        ?>
                    </div>
                    <?php
                                $i++;
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="options">
            <button class="button" type="button" onclick="history.back()">Batalkan</button>
            <button class="button" type="submit">Kemas kini</button>
        </div>
        
    </form>
    <script>
        let del = document.querySelectorAll('.variant-delete') ?? document.createElement('div')
        let edit = document.querySelectorAll("input[type='file']")
        let colorSelect = document.querySelectorAll("[data-color]")

        for (const d of del) {
            d.addEventListener('click', () => {
                let result = confirm('Hapuskan warna ini? Maklumat tidak akan dikemas kini dan tindakan ini tidak boleh dibatalkan')
    
                if (result) {
                    window.location = './w_delete.php?id=' + d.id
                }
            })
        }

        for (const e of edit) {
            e.onchange = () => {
                console.log(e.id);
                let img = document.querySelector('.'+ e.id)
                img.src = URL.createObjectURL(e.files[0]); 
            }
        }

        for (const c of colorSelect) {
            c.addEventListener('change', () => {

                c.classList.remove('error')

                for (const d of colorSelect) {

                    if (d == c) continue

                    d.classList.remove('error')

                    if (d.value == c.value) {
                        c.classList.add('error')
                        d.classList.add('error')
                    }
                    
                }

            })
        }

        function checkError() {
            let errors = document.querySelectorAll('.error')
            
            if (errors.length > 0) {
                alert("Warna perabot tidak boleh berulang")
                event.preventDefault()
            }
        }

        function deleteFurniture() {
            let result = window.confirm("Hapuskan perabot ini?")
            if (result) window.location = './f_delete.php?name=' + '<?php echo $row1['name'] ?>' + '&brand=' + '<?php echo $row1['brandID'] ?>'
        }
    </script>
</body>
</html>