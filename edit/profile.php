<?php
    require "../require/register_menu.php"
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
        <form class="background" action="./p_update.php" method="post" enctype="multipart/form-data">
            <div class="equal">
                <div class="info">
                    <div class="vertical space-around">
                        <div>Nama:  </div>
                        <div>Kata laluan:  </div>
                        <div>E-mel:  </div>
                        <div>Number telefon: </div>
                    </div>
                    <div class="vertical space-around grow">
                        <input class="custom input" name="name" value="<?php echo $_SESSION['name'] ?>" >
                        <input class="custom input" name="password" type="password" value="<?php echo $_SESSION['password'] ?>" >
                        <input class="custom input" name="email" type="email" value="<?php echo $_SESSION['email'] ?>" >
                        <input class="custom input" name="pnumber" value="0<?php echo $_SESSION['pnumber'] ?>" >
                    </div>
                </div>
                <input type="file" id="image" name="image" accept="image/*">
                <div class="pfp">
                    <label for="image" class="camera">
                        <img src="../images/camera.png" alt="">
                    </label>
                    <img data-pfp src="../images/<?php echo $_SESSION['pfp']; ?>" alt="gambar profil">
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
            window.location = './p_delete.php'
        })

        p.addEventListener('click', redirect.profile)
    </script>
</body>
</html>