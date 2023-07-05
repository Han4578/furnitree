<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urusan Perabot</title>
</head>

<body>
    <?php
        require '../require/main_menu.php';

        if (!checkLogin() or $_SESSION['level'] == '1') {
            echo "
            <script>
                alert('Anda tidak dibenarkan mengakses maklumat ini')
                history.back()
            </script>";
            die;
        }
    ?>


<div class="main">
        <div class="list-options">
            <button onclick="window.location='../furniture register/furniture_register.php'">Tambah Perabot</button>
            <button onclick="printInfo()">Cetak</button>
        </div>
        <div class="columns">
            <span class="column">No.</span>
            <span class="column email">Nama</span>
            <span class="column">Warna</span>
            <span class="column">Jenama</span>
            <span class="column">Harga</span>
            <span class="column email">Imej</span>
            <span class="column">Tindakan</span>
        </div>
        <div class="rows">
            <hr>
            <?php
            $id = $_SESSION['id'];
                $query = "SELECT furniture.id AS id, furniture_info.name AS name, color.name AS color, brand.name as company, price, image FROM furniture LEFT JOIN furniture_info on furniture.info = furniture_info.id LEFT JOIN brand ON furniture_info.company = brand.id LEFT JOIN color ON furniture.color = color.id";
                if ($_SESSION['level'] == 2) $query .= " WHERE pengguna.id = $id";
                $query .= " ORDER BY furniture_info.name";
                displayFurniture("document.querySelector('.rows')", $query, true);
            ?>
        </div>
    </div>
</body>
</html>