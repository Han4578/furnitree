<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../register.css">
    <script src="../functions.js" defer></script>
    <title>Register your account here</title>
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
        <form action="./signin_check.php" method="post" enctype="multipart/form-data" class="vertical">
            <div class="center"><b>Log masuk</b></div>
            <div class="container">
                <div class="vertical center">
                    <label for="email">Nama/<br>E-mel:</label>
                    <br>
                    <br>
                    <label for="password">Kata <br>Laluan:</label>
                </div>
                <div class="vertical center">
                    <input class="custom input max-width" type="text" name="email" id="email" maxlength="30" required autofocus>
                    <br>
                    <br>
                    <input class="custom input" type="password" name="password" maxlength="20" id="password" required>
                </div>
            </div>
            <div class="space-between">
                <button type="reset">Set semula</button>
                <button type="submit">Hantar</button>
            </div>
            <div class="space-between">
                <a href="../user register/company_register.php">Daftar sebagai penjual</a>
                <a href="../user register/user_register.php">Daftar sebagai pengguna</a>
            </div>
        </form>
    </div>



</body>
</html>