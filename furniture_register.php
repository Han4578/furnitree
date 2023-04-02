<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <script src="./register.js" defer></script>
    <title>Register your furniture here</title>
</head>

<body>

    <form action="./f_reg.php" method="post" enctype="multipart/form-data" class="vertical">

        <div class="container">
            <div class="vertical space-between">
                <label for="name">Name:</label>
                <label for="color">Color:</label>
                <label for="category">Category:</label>
                <label for="company">Company:</label>
                <label for="price">Price:</label>
            </div>
            <div class="vertical space-between">
                <input type="text" name="name" id="name" required>
                <select name="color" id="color">
                    <option value="1">Red</option>
                    <option value="2">Orange</option>
                    <option value="3">Yellow</option>
                    <option value="4">Green</option>
                    <option value="5">Blue</option>
                    <option value="6">Pink</option>
                    <option value="7">Purple</option>
                    <option value="8">Black</option>
                    <option value="9">White</option>
                    <option value="10">Grey</option>
                    <option value="11">Brown</option>
                </select>
                <select name="category" id="category">
                    <option value="1">Chair</option>
                    <option value="2">Desk</option>
                    <option value="3">Bookshelf</option>
                </select>
                <select name="company" id="company">
                    <option value="1">Latitude Run</option>
                    <option value="2">Apt2B</option>
                </select>
                <input type="number" name="price" id="price" placeholder="RM" min="0.01" step="0.01" onblur="roundNumber(this, value)" required> 
            </div>
        </div>
        <div class="vertical">
            <label for="image">Insert image:</label>
            <input type="file" name="image" id="image" required>
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>

</body>
</html>