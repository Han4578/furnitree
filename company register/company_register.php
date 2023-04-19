<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../register.css">
    <title>Register your company here</title>
</head>

<body>
    <form action="./c_reg.php" method="post" enctype="multipart/form-data" class="vertical">

        <div class="container">
            <div class="vertical space-between">
                <label for="name">Name:</label>
                <label for="image">Logo:</label>
                <div></div>
            </div>
            <div class="vertical space-between">
                <input type="text" name="name" id="name">
                <input type="file" name="image" id="image">
                <div></div>
            </div>
        </div>
        <br>


        <div class="space-between">
            <button type="submit">Hantar</button>
            <button type="reset">Reset</button>
        </div>
    </form>
</body>

</html>