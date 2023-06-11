<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../register.css">
    <script src="../functions.js" defer></script>
    <title>Daftar Sebagai Pengguna</title>
</head>

<body>
    <?php
    require "../require/register_menu.php";
    ?>
<div class="main">
    
        <form action="./u_reg.php" method="post" enctype="multipart/form-data" class="vertical">
            <div class="center">Daftar Sebagai Pengguna</div>
            <div class="container">
                <div class="vertical space-between">
                    <label for="name">Nama:</label>
                    <label for="password">Kata Laluan:</label>
                    <label for="pnumber">Nombor Telefon:</label>
                    <label for="pnumber">E-mel:</label>
    
                </div>
                <div class="vertical space-between">
                    <input type="text" name="name" id="name" maxlength="30" placeholder="Tidak lebih daripada 30 aksara" required>
                    <div>
                        <input type="password" name="password" id="password" maxlength="20" placeholder="Tidak lebih daripada 20 aksara" required>
                        <input type="checkbox" name="togglePw" id="toggle">
                    </div>
                    <input type="tel" name="pnumber" id="pnumber" pattern="[0-9]{10}" minlength="9" placeholder='Tanpa  " - "' title="0123456789" required>
                    <input type="email" id="email" name="email" title="user@example.com" required />
                </div>
            </div>
            <div class="space-between">
                <button type="reset">Set semula</button>
                <button type="submit">Hantar</button>
            </div>
            <div class="space-between">
                <a href="../company register/company_register.php">Daftar sebagai syarikat</a>
                <a href="../sign in/signin.php">Log masuk</a>
            </div>
        </form>
</div>
</body>
<script>
    let togglepw = document.querySelector('#toggle')
    let password = document.querySelector('#password')
    let pnumber = document.querySelector('#pnumber')

    togglepw.addEventListener('click', () => togglePassword(togglepw, password))
    pnumber.addEventListener('keydown', e => {
        excludeSymbols(e)
    })
</script>

</html>