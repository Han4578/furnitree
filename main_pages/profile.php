<?php
    require "../require/register_menu.php";

    $id = $_GET['id'] ?? 1;

    if ($id !== $_SESSION['id'] and $_SESSION['level'] != '3') {
        echo "
        <script>
            alert('Anda tidak dibenarkan mengakses maklumat ini')
            history.back()
        </script>";
        die;
    }

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
                    <?php
                        if ($_SESSION['level'] == 3) echo "<div>Aras: </div>";
                    ?>
                </div>
                <div class="vertical space-around">
                    <div><?php echo $row['pengguna_name'] ?></div>
                    <div><?php echo $row['password'] ?></div>
                    <div><?php echo $row['email'] ?></div>
                    <div>0<?php echo $row['nomhp'] ?></div>
                    <?php
                        $aras = $row['aras'];
                        if ($_SESSION['level'] == 3) echo "<div>$aras</div>";
                    ?>
                </div>
            </div>
            <div class="pfp">
                <img src="../images/<?php echo $row['picture']; ?>" alt="gambar profil">
            </div>
            <div class="edit">
                <img src="../images/edit-pencil.svg" alt="">
            </div>
        </div>
    </div>
    <script>
        let edit = document.querySelector('.edit')

        edit.addEventListener('click', () => {
            window.location = '../edit/profile.php?id=' + <?php echo $id; ?>
        })
    </script>
</body>
</html>