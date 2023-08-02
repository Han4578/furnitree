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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../register.css">
    <title>Kemas Kini Profil</title>
</head>
<body>
    <br>
    <div class="action-bar">
        <div class="action-button delete">
            <img src="../images/delete.png" alt="">
        </div>
    </div>
    <div class="back pointer" onclick="history.back()"><img src="../images/back.png" alt="">Balik</div>
    <div class="main">
        <form class="background" action="./p_update.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
            <div class="equal">
                <div class="info">
                    <div class="vertical space-around">
                        <label for="name">Nama:  </label>
                        <label for="password">Kata laluan:  </label>
                        <label for="email">E-mel:  </label>
                        <label for="pnumber">Numbor telefon: </label>
                        <?php
                            if ($_SESSION['level'] == 3 and $_SESSION['id'] !== $id) echo "<label for='level'>Aras: </label>";
                        ?>
                    </div>
                    <div class="vertical space-around grow">
                        <input class="custom input" id="name" name="name" value="<?php echo htmlspecialchars($row['name']) ?>" maxlength="30" required>
                        <input class="custom input" id="password" name="password" value="<?php echo htmlspecialchars($row['password']) ?>" maxlength="20" required>
                        <input class="custom input" id="email" name="email" type="email" value="<?php echo $row['email'] ?>" maxlength="40" required>
                        <input class="custom input" type="number" id="pnumber" title="0123456789" name="pnumber" value="<?php echo $row['nomhp'] ?>" min="100000000" max="9999999999" required>
                        
                        <?php
                            if ($_SESSION['level'] == 3 and $_SESSION['id'] !== $id) {
                                echo '<select class="custom" id="aras" name="aras">';
                                for ($i=1; $i <= 3; $i++) {
                                    $selected = $row['aras'];
                                    echo "<script>
                                              displayOptions($i, document.querySelector('#aras'), $i, $selected)
                                          </script>";
                                }
                                echo '</select>';
                            }
                        ?>
                        
                    </div>
                </div>
                <input type="file" id="image" class = "none" name="image" accept="image/*">
                <div class="pfp">
                    <label for="image" class="camera">
                        <img src="../images/camera.png" alt="">
                    </label>
                    <img data-pfp src="../images/<?php echo $row['picture']; ?>" alt="gambar profil">
                </div>
            </div>
            <div class="options grow">
                <button class="custom button" data-profile2 type="button">Batalkan</button>
                <button class="custom button" type="submit">Kemas kini</button>
            </div>
        </form>
    </div>
    <script>
        let edit = document.querySelector("#image")
        let img = document.querySelector('[data-pfp]')
        let del = document.querySelector('.delete')
        let p = document.querySelector('[data-profile2]')
        
        edit.onchange = () => {
            img.src = URL.createObjectURL(edit.files[0]); 
        }

        del.addEventListener('click', () => {
            let result = window.confirm("Memadamkan akaun?")

            if(result) {
                window.location = "./p_delete.php?id=" + <?php echo $row['id']; ?>
            }
        })

        p.addEventListener('click', () => {
            history.back()
        })
    </script>
</body>
</html>