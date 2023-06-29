<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        require "../require/main_menu.php";

        if (!key_exists('id', $_GET)) {
            die("Jenama ini tidak wujud");
        }


        $brandID = $_GET['id'];
        $query1 = $conn->query("SELECT * FROM company WHERE id = $brandID");
        $row1 = $query1->fetch_assoc()
    ?>
        <div class="delete">
            <img src="../images/delete.png" alt="">
        </div>
    <form class="main" enctype="multipart/form-data" method="post" action="./b_update.php?id=<?php echo $brandID; ?>">
        <input type="file" name="image" id="image" class="none" accept="image/*">
        <div class="company-container">
            <div class="company-logo">
                <label for="image" class="company camera">
                    <img src="../images/camera.png" alt="">
                </label>
                <img src="../images/<?php echo $row1['logo'] ?>" id="company-image" alt="">
            </div>
            <div class="company-info">
                <div class="company-name">
                    <label for="name">Nama Jenama: </label>
                    <input type="text" value="<?php echo $row1['name'] ?>" name="name" id="name" class="input" required>
                </div>
                <hr>
                <div class="company-name">                    
                    <label for="name">Pautan ke Web Rasmi: </label>
                    <input type="url" value="<?php echo $row1['official'] ?>" name="official" id="name" class="input ">
                </div>
            </div>
        </div>
        <div class="space-between">
            <div>
                <label for="description">Deskripsi</label>
                <br>
                <br>
                <textarea name="description" id="description" class="description" cols="50" rows="25" maxlength="1000"><?php echo $row1['description']; ?></textarea>
            </div>
            <div class="social-list">
                <div>Pautan Media Sosial</div>
                <div class="row wrap">
                    <img class="social-link" src="../images/fb logo.webp" alt="">
                    <label for="fb">Facebook:</label>
                    <input class="input" type="url" id="fb" name="fb" value="<?php echo $row1['fb']; ?>">
                </div>
                <div class="row">
                    <img class="social-link" src="../images/twitter logo.png" alt="">
                    <label for="twitter">Twitter:</label>
                    <input class="input " type="url" id="twitter" name="twitter" value="<?php echo $row1['twitter']; ?>">
                </div>
                <div class="row">
                    <img class="social-link" src="../images/insta logo.jpg" alt="">
                    <label for="insta">Instagram:</label>
                    <input class="input " type="url" id="insta" name="insta" value="<?php echo $row1['instagram']; ?>">
                </div>
                <div class="row">
                    <img class="social-link" src="../images/yt logo.png" alt="">
                    <label for="yt">Youtube:</label>
                    <input class="input " type="url" id="yt" name="yt" value="<?php echo $row1['yt']; ?>">
                </div>
            </div>
        </div>
        <br>
        <div class="options">
            <button class="button" type="button" onclick="history.back()">Batalkan</button>
            <button class="button" type="submit">Kemas kini</button>
        </div>
    </form>
    <script>
        let edit = document.querySelector("#image")
        let img = document.querySelector("#company-image")
        let del = document.querySelector('.delete')

        del.addEventListener('click', () => {
            let result = confirm('Hapuskan Jenama ini?')
    
        if (result) {
            window.location = './b_delete.php?id=' + <?php echo $brandID ?>
        }
        })

        edit.onchange = () => {
            img.src = URL.createObjectURL(edit.files[0]); 
        }
    </script>
</body>
</html>