<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../register.css">
    <title>Daftar Jenama</title>
</head>
<body>
    <?php
        require "../require/register_menu.php";
    
        if (!checkLogin() or $_SESSION['level'] == 1 or ($_SESSION['brandID'] != '' and $_SESSION['level'] == 2)) {
            echo "<script>history.back()</script>";
        }
    ?>
    <br>
    <div class="back pointer" onclick="history.back()"><img src="../images/back.png" alt="">Balik</div>
    <div class="main">
        <form action="./b_reg.php" method="post" enctype="multipart/form-data" class="vertical">
            <div class="center"><b>Daftar Jenama</b></div>
            <div class="input-split ">
                <div class="vertical gap">
                    <label class="input" for="name">Nama: </label>
                    <label class="<?php if ($_SESSION['level'] == 2) echo "none" ?>" for="account">Pengguna:</label>
                    <label class="input" for="image">Gambar: </label>
                    <label for="description">Deskripsi: </label>

                </div>

                <div class="vertical gap">
                    <input class="input" type="text" name="name" id="name" maxlength="50" required>
                    <select class="custom <?php if ($_SESSION['level'] == 2) echo "none" ?>" name="account" id="account" required>
                        <option value="" selected disabled hidden>Pilih Pengguna...</option>
                        <?php
                            displayOptions("SELECT name, id FROM pengguna WHERE aras = 2", "document.getElementById('account')", $_SESSION['id'])
                        ?>
                    </select>
                    <input class="input" type="file" name="image" accept="image/*" id="image" required>
                    <textarea name="description" id="description" cols="30" rows="2" maxlength="1000" placeholder="Tidak lebih daripada 1000 huruf"></textarea>
                </div>
            </div>
            <div class="space-between">
                <button type="reset">Set semula</button>
                <button type="submit">Hantar</button>
            </div>
        </form>
    </div>
</body>
</html>