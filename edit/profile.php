<?php
    require "../require/register_menu.php";

    $id = $_GET['id'];

    $query = $conn->query("SELECT * FROM pengguna WHERE id = $id");
    $row = $query->fetch_assoc();

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
                            if ($_SESSION['level'] == 3) echo "<label for='level'>Aras: </label>";
                        ?>
                    </div>
                    <div class="vertical space-around grow">
                        <input class="custom input" id="name" name="name" value="<?php echo $row['pengguna_name'] ?>" required>
                        <input class="custom input" id="password" name="password" type="password" value="<?php echo $row['password'] ?>" required>
                        <input class="custom input" id="email" name="email" type="email" value="<?php echo $row['email'] ?>"required>
                        <input class="custom input" id="pnumber" name="pnumber" value="0<?php echo $row['nomhp'] ?>" required>
                        
                        <?php
                            if ($_SESSION['level'] == 3) {
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
                <input type="file" id="image" name="image" accept="image/*">
                <div class="pfp">
                    <label for="image" class="camera">
                        <img src="../images/camera.png" alt="">
                    </label>
                    <img data-pfp src="../images/<?php echo $row['picture']; ?>" alt="gambar profil">
                </div>
            </div>
            <div class="options grow">
                <button class="custom button" data-profile2 type="button">Batalkan</button>
                <button class="custom button yes" type="submit">Kemas kini</button>
            </div>
            <div class="delete">
                <img src="../images/delete.png" alt="">
            </div>
        </form>
        <dialog class="confirm">
            <div class="vertical">
                <div class="grow center">Memadamkan akaun?</div>
                <div class="options">
                    <button class="dialog-button" id="no">tidak</button>
                    <button class="dialog-button yes" id="yes">ya</button>
                </div>
            </div>
        </dialog>
    </div>
    <script>
        let edit = document.querySelector("#image")
        let img = document.querySelector('[data-pfp]')
        let del = document.querySelector('.delete')
        let confirm = document.querySelector('.confirm')
        let yes = document.querySelector('#yes')
        let no = document.querySelector('#no')
        let p = document.querySelector('[data-profile2]')
        
        edit.onchange = () => {
            img.src = URL.createObjectURL(edit.files[0]); 
        }

        del.addEventListener('click', () => {
            confirm.open = true
        })

        no.addEventListener('click', () => {
            confirm.open = false
        })

        yes.addEventListener('click', () => {
            window.location = './p_delete.php?id=' + <?php echo $row['id']; ?>
        })

        p.addEventListener('click', () => {
            redirect.profile(<?php echo $row['id']; ?>)
        })
    </script>
</body>
</html>