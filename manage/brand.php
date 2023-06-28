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
        <div class="list-options">
            <button onclick="printInfo()">Cetak</button>
        </div>
        <div class="columns">
            <span class="column">No.</span>
            <span class="column ">Nama</span>
            <span class="column email grow">Imej</span>
            <span class="column">Tindakan</span>
        </div>
        <div class="rows">
            <hr>
            <?php
            $id = $_SESSION['id'];
                $query = "SELECT company.id AS id, company.name AS name, company.logo AS logo FROM company";
                if ($_SESSION['level'] == 2) $query .= " LEFT JOIN pengguna ON company.id = pengguna.brand WHERE pengguna.id = $id";
                $query .= " ORDER BY name";
                displayBrands("document.querySelector('.rows')", $query);
            ?>
        </div>
    </div>
</body>
</html>