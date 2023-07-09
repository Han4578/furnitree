<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../register.css">  
    <script src="../functions.js"></script>
    <title>Register your furniture here</title>
</head>

<body>
    <?php
    require "../require/register_menu.php";
    ?>
    <br>
    <div class="back pointer" onclick="history.back()"><img src="../images/back.png" alt="">Balik</div>
    <div class="main">
        <form action="./f_reg.php" method="post" enctype="multipart/form-data" class="vertical">
            <div class="center">Daftar Perabot</div>
            <div class="container">
                <div class="vertical space-between">
                    <label class="input" for="name">Nama:</label>
                    <label class="" for="color">Warna:</label>
                    <label class="" for="category">Kategori:</label>
                    <label class="<?php if ($_SESSION['level'] == 2) echo "none" ?>" for="brand">Jenama:</label>
                    <label class="input" for="price">Harga:</label>
                </div>
                <div class="vertical space-between">
                    <input class="custom input" type="text" name="name" id="name" required>
                    <select class="custom" name="color" id="color" required>
                        <option value="" selected disabled hidden>Pilih warna...</option>
                        <?php
                            displayOptions("SELECT * FROM color", "document.getElementById('color')")
                        ?>
                    </select>
                    <select class="custom" name="category" id="category" required>
                        <option value="" selected disabled hidden>Pilih kategori...</option>
                        <?php
                            displayOptions("SELECT * FROM category", "document.getElementById('category')")
                        ?>
                    </select>
                    <select class="custom <?php if ($_SESSION['level'] == 2) echo "none" ?>" name="brand" id="brand" required>
                        <option value="" selected disabled hidden>Pilih jenama...</option>
                        <?php
                            displayOptions("SELECT name, id FROM brand", "document.getElementById('brand')", $_SESSION['brandID'])
                        ?>
                    </select>
                    <input class="custom input" type="number" name="price" id="price" placeholder="RM" min="0.01" step="0.01" onblur="roundNumber(this, value)" required>
                </div>
            </div>
            <div class="vertical">
                <label for="image">Gambar:</label>
                <input type="file" name="image" id="image" accept="image/*" required>
            </div>
            <div class="space-between">
                <button type="reset">Reset</button>
                <button type="submit">Hantar</button>
            </div>
        </form>
    </div>

</body>
<script>
    let price = document.querySelector('#price')

    price.addEventListener('keypress', e => excludeSymbols(e))
</script>

</html>