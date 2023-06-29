<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urusan pengguna</title>
</head>

<body>
    <?php
        require '../require/main_menu.php';

        if (!checkLogin() or $_SESSION['level'] == 1) {
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
            <button onclick="printInfo()">Cetak</button>
        </div>
        <div class="columns">
            <span class="column">No.</span>
            <span class="column">Nama</span>
            <span class="column">Kata laluan</span>
            <span class="column">No. telefon</span>
            <span class="column">Aras</span>
            <span class="column email">E-mail</span>
            <span class="column email">Imej</span>
            <span class="column">Tindakan</span>
        </div>
        <div class="rows">
            <hr>
            <?php
                displayUsers("document.querySelector('.rows')", "SELECT * FROM pengguna ORDER BY name")
            ?>
        </div>
    </div>
</body>
</html>