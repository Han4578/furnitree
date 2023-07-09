<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../register.css">
    <title>Import produk</title>
</head>
<body>
    <?php
        include "../require/register_menu.php";

        if (!checkLogin() or $_SESSION['level'] != 2) accessDenied();

    ?>
    <br>
    <div class="back pointer" onclick="history.back()"><img src="../images/back.png" alt="">Balik</div>
    <div class="main">
        <form action="./f_import.php" method="post" enctype="multipart/form-data" class=" vertical">
            <div class="vertical space-between max-height">
                <div class="center">Import Produk Dari Fail CSV</div>
                <div class="space-between">
                    <label for="import">Fail:</label>
                    <input type="file" name="import" id="import" accept=".csv" required>
                </div>  
                <div class="space-between">
                    <label for="images">Gambar:</label>
                    <input type="file" name="images[]" id="images" accept="image/*" required multiple>
                </div>
                <p>
                    Sila mengenal pasti format fail anda ialah "Nama, Warna, Kategori, Harga, Nama Gambar, Deskripsi"<br>
                    Setiap nama gambar mesti sepadan dengan gambar yang dimasukkan. <br>
                    Baris pertama tidak akan dimasukkan.
                </p>
                <div class="space-between">
                    <button type="reset">Reset</button>
                    <button type="submit">Hantar</button>
                </div>
                <br>
            </div>
        </form>
    </div>  
</body>
</html>