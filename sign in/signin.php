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
    
    if (key_exists('isLoggedIn', $_SESSION)) {
        echo "<script>
                history.back()
            </script>";
        die;
    }
    ?>

    <div class="main">
        <form action="./signin_check.php" method="post" enctype="multipart/form-data" class="vertical">
            <div class="center">Log masuk</div>
            <div class="container">
                <div class="vertical space-between">
                    <label for="email">Nama/ <br>E-mel:</label>
                    <label for="password">Kata Laluan:</label>
                </div>
                <div class="vertical space-between">
                    <input class="custom input" type="text" name="email" id="email" required autofocus>
                    <div>
                        <input class="custom input" type="password" name="password" id="password" required>
                        <input type="checkbox" name="Togglepw" id="toggle">
                    </div>
                </div>
            </div>
            <div></div>
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
<script>
    let togglepw = document.querySelector('#toggle')
    let password = document.querySelector('#password')

    togglepw.addEventListener('click', () => togglePassword(togglepw, password))
</script>

</html>