<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../register.css">
    <title>Tambah warna</title>
</head>
<body>
    <?php
        include "../require/register_menu.php";
        $id = $_GET['id']
    ?>  
    <br>
    <div class="back pointer" onclick="history.back()"><img src="../images/back.png" alt="">Balik</div>
    <div class="main">
        <form action="./c_reg.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data" class=" vertical">
            <div class="center"><b>Tambah Warna</b></div>
            <div class="container">
                <div class="vertical space-around">
                    <label for="color">Warna: </label>  
                    <label for="img">Gambar: </label>
                </div>
                <div class="vertical space-around">
                    <select class="custom" name="color" id="color" required>
                        <option value="" selected disabled hidden>Pilih warna...</option>
                        <?php
                            $query3 = $conn->query("SELECT color.name AS name, color.id AS id FROM color");
                            while ($row3 = $query3->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row3['id'] ?>"><?php echo $row3['name'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <input type="file" name="image" id="img" accept="image/*" required>
                </div>
            </div>
            <div class="space-between">
                <button type="reset">Reset</button>
                <button type="submit">Hantar</button>
            </div>
        </form>
    </div>  
</body>
</html>