<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../register.css">
    <title>Import Warna</title>
</head>
<body>
    <?php
        include "../require/register_menu.php";
    ?>

    <div class="main">
        <form action="./ca_import.php" method="post" enctype="multipart/form-data" class=" vertical">
            <div class="vertical space-between max-height">
                <div class="center">Import Warna Produk Dari Fail CSV Sebagai Admin</div>
                <div class="space-between">
                    <label for="import">Fail:</label>
                    <input type="file" name="import" id="import" accept=".csv" required>
                </div>  
                <div class="space-between">
                    <label for="images">Gambar:</label>
                    <input type="file" name="images[]" id="images" accept="image/*" required multiple>
                </div>
                <p>
                    Sila mengenal pasti format fail anda ialah "Nama, Jenama, Warna, Nama Gambar"<br>
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