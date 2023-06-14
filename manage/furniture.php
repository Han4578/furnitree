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
    ?>

    <div class="main">
        <div class="columns">
            <span class="column">No.</span>
            <span class="column email">Nama</span>
            <span class="column">Warna</span>
            <span class="column">Syarikat</span>
            <span class="column">Harga</span>
            <span class="column email">Imej</span>
            <span class="column">Tindakan</span>
        </div>
        <div class="rows">
            <hr>
            <?php
            $id = $_SESSION['id'];
                $query = ($_SESSION['level'] == 3)? "SELECT furniture.id AS id, furniture_info.name AS name, color.name AS color, pengguna.name as company, price, image FROM furniture LEFT JOIN furniture_info on furniture.info = furniture_info.id LEFT JOIN pengguna ON furniture_info.company = pengguna.id LEFT JOIN color ON furniture.color = color.id ORDER BY furniture_info.name" 
                                                    :"SELECT furniture.id AS id, furniture_info.name AS name, color.name AS color, pengguna.name as company, price, image FROM furniture LEFT JOIN furniture_info on furniture.info = furniture_info.id LEFT JOIN pengguna ON furniture_info.company = pengguna.id LEFT JOIN color ON furniture.color = color.id WHERE pengguna.id = $id ORDER BY furniture_info.name";
                displayFurniture("document.querySelector('.rows')", $query);
            ?>
        </div>
    </div>
</body>
</html>