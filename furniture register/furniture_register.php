<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../register.css">  
    <script src="../functions.js"></script>
    <title>Register your furniture here</title>
</head>

<body>
    <?php
    require "../require/register_menu.php";
    ?>

    <div class="main">
        <form action="./f_reg.php" method="post" enctype="multipart/form-data" class="vertical">
            <div class="container">
                <div class="vertical space-between">
                    <label for="name">Nama:</label>
                    <label for="color">Warna:</label>
                    <label for="category">Kategori:</label>
                    <label for="company">Syarikat:</label>
                    <label for="price">Harga:</label>
                    <label for="place">Tempat:</label>
                </div>
                <div class="vertical space-between">
                    <input type="text" name="name" id="name" required>
                    <select name="color" id="color" required>
                        <option value="" selected disabled hidden>Pilih warna...</option>
                        <?php
                            displayOptions("SELECT * FROM color", "document.getElementById('color')")
                        ?>
                    </select>
                    <select name="category" id="category" required>
                        <option value="" selected disabled hidden>Pilih kategori...</option>
                        <?php
                            displayOptions("SELECT * FROM category", "document.getElementById('category')")
                        ?>
                    </select>
                    <select name="company" id="company" required>
                        <option value="" selected disabled hidden>Pilih syarikat...</option>
                        <?php
                        $query = $conn->query("SELECT * FROM company");
                        if ($query->num_rows > 0) {
                            while ($row = $query->fetch_assoc()) {
                                $name = $row['company'];
                                $value = $row['id'];
                                echo "<script>
                                            displayOptions('$name', document.getElementById('company'), '$value');
                                        </script>";
                            }
                        }
                        ?>
                    </select>
                    <input type="number" name="price" id="price" placeholder="RM" min="0.01" step="0.01" onblur="roundNumber(this, value)" required>
                    <div class="space-between">
                        <div>
                            <input type="radio" class="radio" name="indoors" id="indoors" value="1" required>
                            <label for="indoors">dalam rumah</label>
                        </div>
                        <div>
                            <input type="radio" class="radio" name="indoors" id="outdoors" value="0" required>
                            <label for="outdoors">luar rumah</label>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vertical">
                <label for="image">Insert image:</label>
                <input type="file" name="image" id="image" accept="image/*" required>
            </div>
            <div class="space-between">
                <button type="submit">Hantar</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>

</body>
<script>
    let price = document.querySelector('#price')

    price.addEventListener('keypress', e => excludeSymbols(e))
</script>

</html>