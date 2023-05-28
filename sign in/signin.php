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
    ?>

    <form action="./signin_check.php" method="post" enctype="multipart/form-data" class="vertical">

        <div class="container">
            <div class="vertical space-between">
                <label for="email">E-mel:</label>
                <label for="password">Kata Laluan:</label>

            </div>
            <div class="vertical space-between">
                <input type="email" name="email" id="email" required>
                <div>
                    <input type="password" name="password" id="password" required>
                    <!-- <input type="checkbox" name="Togglepw" id="Togglepw"> -->
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="space-between">
            <button type="submit">Hantar</button>
            <button type="reset">Reset</button>
        </div>
    </form>



</body>
<script>
    let togglepw = document.querySelector('#Togglepw')
    let password = document.querySelector('#password')

    togglepw.addEventListener('click', () => togglePassword(togglepw, password))
</script>

</html>