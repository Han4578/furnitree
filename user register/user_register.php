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
        require "../menu.php";
    ?>

    <form action="./u_reg.php" method="post" enctype="multipart/form-data" class="vertical">

        <div class="container">
            <div class="vertical space-between">
                <label for="name">Nama:</label>
                <label for="password">Kata Laluan:</label>
                <label for="pnumber">Nombor telefon:</label>

            </div>
            <div class="vertical space-between">
                <input type="text" name="name" id="name" maxlength="30" placeholder="Tidak lebih daripada 30 aksara" required>
                <div>
                    <input type="password" name="password" id="password" maxlength="20" placeholder="Tidak lebih daripada 20 aksara" required>
                    <input type="checkbox" name="togglePw" id="Togglepw">
                </div>
                <input type="number" name="pnumber" id="pnumber" max="99999999999" onblur="roundNumber(this, value)">
            </div>
        </div>
        <div class="space-between">
            <button type="submit">Hantar</button>
            <button type="reset">Reset</button>
        </div>
    </form>

</body>
<script>
    let togglepw = document.querySelector('#Togglepw')
    let password = document.querySelector('#password')
    let pnumber = document.querySelector('#pnumber')

    togglepw.addEventListener('click', () => togglePassword(togglepw, password))
    pnumber.addEventListener('keydown', e => {
        excludeSymbols(e)
    })
</script>

</html>