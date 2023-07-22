<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../register.css">
    <title>Profil</title>
</head>
<body>
    <?php
        require "../require/register_menu.php";
        
        if (key_exists('id', $_GET)) {
            $exists = true;
            $id = $_GET['id'];
            $query = $conn->query("SELECT * FROM pengguna WHERE id = $id");
            ($query->num_rows > 0)? $row = $query->fetch_assoc(): $exists = false; 
        } 

        if (!key_exists('id', $_GET) or !$exists) alertError('Profil ini tidak wujud');

        if (!checkLogin() or ($id !== $_SESSION['id'] and $_SESSION['level'] != '3')) accessDenied();
    ?>
    <br>
    <div class="action-bar">
        <div class="action-button" onclick="edit()">
            <img src="../images/edit-pencil.svg" alt="">
        </div>
    </div>
    <div class="back pointer" onclick="history.back()"><img src="../images/back.png" alt="">Balik</div>
    <div class="main">

        <div class="background equal">
            <div class="info">
                <div class="vertical space-around">
                    <div>Nama:  </div>
                    <div>Kata laluan:  </div>
                    <div>E-mel:  </div> 
                    <div>Nombor telefon: </div>
                    <?php
                        if ($_SESSION['level'] == 3) echo "<div>Aras: </div>";
                    ?>
                </div>
                <div class="vertical space-around">
                    <div><?php echo htmlspecialchars($row['name']) ?></div>
                    <div><?php echo $row['password'] ?></div>
                    <div><?php echo $row['email'] ?></div>
                    <div><?php echo (strlen($row['nomhp']) == 9)? '0'.$row['nomhp']: $row['nomhp']; ?></div>
                    <?php
                        $aras = $row['aras'];
                        if ($_SESSION['level'] == 3) echo "<div>$aras</div>";
                    ?>
                </div>
            </div>
            <div class="pfp">
                <img src="../images/<?php echo $row['picture']; ?>" alt="gambar profil">
            </div>
        </div>
    </div>
    <script>
        function edit() {
            window.location = '../edit/profile.php?id=' + <?php echo $id; ?>
        }
    </script>
</body>
</html>