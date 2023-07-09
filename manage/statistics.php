<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urusan Pilihan</title>
</head>

<body>
    <?php
        require '../require/main_menu.php';
        
        if (!checkLogin()) accessDenied();
    ?>


<div class="main">
        <div class="list-options">
            <button onclick="printInfo()">Cetak</button>
        </div>
        <div class="columns">
            <span class="column">No.</span>
            <span class="column email">Nama</span>
            <span class="column email">Produk</span>
            <span class="column email">Imej</span>
            <span class="column">Bilangan</span>
            <span class="column price">Jumlah</span>
            <span class="column">Tindakan</span>
        </div>
        <div class="rows">
            <hr>
            <?php
                $id = $_SESSION['id'];
                $query = "SELECT furniture.id AS id, pengguna.name AS username, pengguna.id AS userID, furniture_info.name AS name, pilihan.bilangan AS amount, brand.name as company, price, picture, image FROM pilihan LEFT JOIN furniture ON furniture.id = pilihan.produk LEFT JOIN furniture_info on furniture.info = furniture_info.id LEFT JOIN brand ON furniture_info.company = brand.id LEFT JOIN pengguna ON pengguna.id = pilihan.pengguna";
                if ($_SESSION['level'] == 1) $query .= " WHERE pilihan.pengguna = $id";

                $query .= " ORDER BY furniture_info.name";

                displayStatistics("document.querySelector('.rows')", $query);
            ?>
        </div>
    </div>
</body>
</html>