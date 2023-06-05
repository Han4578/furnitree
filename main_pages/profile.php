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
    <title>Profil</title>
</head>
<body>
    <div class="main">
        <div class="background equal">
            <div class="info">
                <div class="vertical space-around">
                    <div>Nama:  </div>
                    <div>Kata laluan:  </div>
                    <div>E-mel:  </div> 
                    <div>Number telefon: </div>
                </div>
                <div class="vertical space-around">
                    <div><?php echo $_SESSION['name'] ?></div>
                    <div><?php echo $_SESSION['password'] ?></div>
                    <div><?php echo $_SESSION['email'] ?></div>
                    <div>0<?php echo $_SESSION['pnumber'] ?></div>
                </div>
            </div>
            <div class="pfp">
                <img src="../images/<?php echo $_SESSION['pfp']; ?>" alt="gambar profil">
            </div>
            <div class="edit">
                <img src="../images/edit-pencil.svg" alt="">
            </div>
        </div>
    </div>
    <script>
        let edit = document.querySelector('.edit')

        edit.addEventListener('click', () => {
            window.location = '../edit/profile.php'
        })
    </script>
</body>
</html>