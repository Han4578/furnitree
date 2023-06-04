<?php
    $_SESSION['query'] = $_GET['search'] ?? '';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cari</title>
    </head>
    <body>
        <template>    
            <div class="result-item">
                <div data-imgCon><img src="" alt="" data-image></div>
                <div data-name></div>
                <div data-company></div>
                <div data-price></div>
            </div>
        </template>
        <?php 
            require '../require/main_menu.php';
            $_SESSION['query'] = $_GET['search'] ?? '';
        ?>
        <div class="main">
            <form class="search-container" action="filter.php" method="get">
                <input type="text" name="search" id="search-bar" placeholder="Search..." value="<?php echo $_SESSION['query']; ?>">
                <button type="submit" class="search">S</button>
            </form>
            <div class="results">
                <?php
                    $query = $conn->query("SELECT * FROM furniture LEFT JOIN company ON furniture.company_id = company.company_id");

                    if ($query->num_rows > 0) {
                        while ($row = $query->fetch_assoc()) {
                            $image = $row['image'];
                            $price = $row['price'];
                            $name = $row['name'];
                            $company = $row['company_name'];
                            $id = $row['id'];

                            echo "<script>
                                    displayItems(document.querySelector('.results'), '$name', '$image', $price, '$company', document.querySelector('template'), $id)
                            </script>";
                        }
                    }
                
                ?>
            </div>
        </div>
    </body>
</html>