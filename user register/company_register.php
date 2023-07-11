<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../register.css">
    <title>Daftar Sebagai Penjual</title>
</head>

<body>
    <?php
    require "../require/register_menu.php";

    if (checkLogin()) {
        echo "<script>
                history.back()
            </script>";
        die;
    }
    ?>
    <br>
    <div class="main">
        <form action="./u_reg.php?aras=2" method="post" enctype="multipart/form-data" class="vertical">
            <div class="center">Daftar Sebagai Penjual</div>
            <div class="container">
                <div class="vertical space-between">
                    <label for="name">Nama:</label>
                    <label for="password">Kata Laluan:</label>
                    <label for="pnumber">Nombor Telefon:</label>
                    <label for="email">E-mel:</label>
                </div>
                <div class="vertical space-between">
                    <input class="custom input" type="text" name="name" id="name" maxlength="30" placeholder="Tidak lebih daripada 30 huruf" required autofocus>
                    <div>
                        <input class="custom input" type="password" name="password" id="password" maxlength="20" placeholder="Tidak lebih daripada 20 huruf" required>
                    </div>
                    <input class="custom input" type="tel" name="pnumber" id="pnumber" pattern="[0-9]{10}" minlength="9" maxlength="10" placeholder='Tanpa  " - "' title="0123456789" required>
                    <input class="custom input" type="text" name="email" id="email" title="user@example.com" maxlength="40" required>
                </div>
            </div>
            <div class="space-between">
                <button type="reset">Set semula</button>
                <button type="submit">Hantar</button>
            </div>
            <div class="space-between">
                <a href="../user register/user_register.php">Daftar sebagai pengguna</a>
                <a href="../sign in/signin.php">Log masuk</a>
            </div>
        </form>
    </div>
    <script>
        let pnumber = document.querySelector('#pnumber')

        pnumber.addEventListener('keydown', e => {
            excludeSymbols(e)
        })
    </script>
</body>

</html>