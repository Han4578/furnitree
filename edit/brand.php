<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        require "../require/main_menu.php";

        if (key_exists('id', $_GET)) {
            $exists = true;
            $brandID = $_GET['id'];
            $query1 = $conn->query("SELECT * FROM brand WHERE id = $brandID");
            ($query1->num_rows > 0)? $row1 = $query1->fetch_assoc(): $exists = false; 
        } 

        if (!key_exists('id', $_GET) or !$exists) alertError('Jenama ini tidak wujud');

        if (!checkLogin() or ($_SESSION['brandID'] != $brandID and $_SESSION['level'] < 3)) accessDenied();
    ?>

    <br>
    <div class="action-bar">
        <div class="action-button delete">
            <img src="../images/delete.png" alt="">
        </div>
    </div>
    <div class="back pointer" onclick="history.back()"><img src="../images/back.png" alt="">Balik</div>
    <form class="main" enctype="multipart/form-data" method="post" action="./b_update.php?id=<?php echo $brandID; ?>">
        <input type="file" name="image" id="image" class="none" accept="image/*">
        <div class="brand-container">
            <div class="brand-logo">
                <label for="image" class="brand camera">
                    <img src="../images/camera.png" alt="">
                </label>
                <img src="../images/<?php echo $row1['logo'] ?>" id="brand-image" alt="">
            </div>
            <div class="brand-info">
                <div class="brand-name">
                    <label for="name">Nama Jenama: </label>
                    <input type="text" value="<?php echo htmlspecialchars($row1['name']) ?>" name="name" id="name" class="input" maxlength="50" required>
                </div>
                <hr>
                <div class="brand-name">                    
                    <label for="name">Pautan ke Web Rasmi: </label>
                    <input type="url" value="<?php echo $row1['official'] ?>" maxlength="100" name="official" id="name" class="input ">
                </div>
            </div>
        </div>
        <div class="card max-width">
            <div>
                <label for="description">Deskripsi</label>
                <br>
                <br>
                <textarea name="description" id="description" class="description" cols="50" rows="25" maxlength="1000"><?php echo $row1['description']; ?></textarea>
            </div>
            <div class="social-list">
                <div>Pautan Media Sosial</div>
                <div class="row ">
                    <img class="social-link" src="../images/fb logo.webp" alt="">
                    <label for="fb">Facebook:</label>
                    <input class="input" type="url" id="fb" name="fb" maxlength="100" value="<?php echo $row1['fb']; ?>">
                </div>
                <div class="row">
                    <img class="social-link" src="../images/twitter logo.png" alt="">
                    <label for="twitter">Twitter:</label>
                    <input class="input " type="url" id="twitter" name="twitter" maxlength="100" value="<?php echo $row1['twitter']; ?>">
                </div>
                <div class="row">
                    <img class="social-link" src="../images/insta logo.jpg" alt="">
                    <label for="insta">Instagram:</label>
                    <input class="input " type="url" id="insta" name="insta" maxlength="100" value="<?php echo $row1['instagram']; ?>">
                </div>
                <div class="row">
                    <img class="social-link" src="../images/yt logo.png" alt="">
                    <label for="yt">Youtube:</label>
                    <input class="input " type="url" id="yt" name="yt" maxlength="100" value="<?php echo $row1['yt']; ?>">
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
        let img = document.querySelector("#brand-image")
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