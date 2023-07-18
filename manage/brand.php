<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urusan Produk</title>
</head>

<body>
    <?php
        require '../require/main_menu.php';

        if (!checkLogin() or $_SESSION['level'] < 3) accessDenied();
    ?>


<div class="main">
        <div class="list-options print">
            <button onclick="window.location='../import/brand.php'">Import Jenama</button>
            <button onclick="window.location='../brand register/brand_register.php'">Tambah Jenama</button>
            <button onclick="printInfo()">Cetak</button>
        </div>
        <div class="columns">
            <span class="column">No.</span>
            <span class="column ">Nama</span>
            <span class="column ">Penjual</span>
            <span class="column email grow">Imej</span>
            <span class="column">Tindakan</span>
        </div>
        <div class="rows">
            <hr>
            <?php
            $id = $_SESSION['id'];
                $query = "SELECT brand.id AS id, brand.name AS name, brand.logo AS logo, pengguna.name AS account, pengguna.id AS accountID FROM brand LEFT JOIN pengguna ON brand.account = pengguna.id";
                $query .= " ORDER BY name";
                displayBrands("document.querySelector('.rows')", $query);
            ?>
        </div>
    </div>
</body>
</html>