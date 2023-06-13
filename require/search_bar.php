<?php
    $_SESSION['stmt'] = $_SESSION['stmt'] ?? '';
    $_SESSION['query'] = $_SESSION['query'] ?? '';
    $_SESSION['brand'] = $_SESSION['brand'] ?? '';
    $_SESSION['color'] = $_SESSION['color'] ?? '';
    $_SESSION['category'] = $_SESSION['category'] ?? '';
    $_SESSION['from'] = $_SESSION['from'] ?? '';
    $_SESSION['to'] = $_SESSION['to'] ?? '';
?>

<form action="../require/filter.php" class="search-section" method="post">
    <div class="search-container">
        <input type="text" name="search" id="search-bar" placeholder="Search..." value="<?php echo $_SESSION['query']; ?>">
        <img src="../images/filter.png" class="filter pointer">
        <button type="submit" class="search">S</button>
    </div>
    <div id="filter-menu">
        <div class="filter-menu">
            <div class="search-column">
                <div>Warna:</div>
                <br>
                <div class="selections S1">
                    <?php
                        $color = $_SESSION['color'];
                        displaySelections('document.querySelector(".S1")', "SELECT color.name AS name, color.id AS id FROM furniture INNER JOIN color ON furniture.color = color.id", 'name', 'id', 'color', $color);
                    ?>
                </div>
            </div>
            <div class="search-column">
                <div>Jenama:</div>
                <br>
                <div class="selections S2">
                    <?php
                        $brand = $_SESSION['brand'];
                        displaySelections('document.querySelector(".S2")', "SELECT * FROM pengguna WHERE aras = '2'", 'pengguna_name', 'id', 'brand', $brand);
                    ?>
                </div>
            </div>
            <div class="search-column">
                <div>Kategori:</div>
                <br>
                <div class="selections S3">
                    <?php
                        $category = $_SESSION['category'];
                        displaySelections('document.querySelector(".S3")', "SELECT * FROM category", 'name', 'id', 'category', $category);
                    ?>
                </div>
            </div>
        
            <div class="search-column">
                <div>Harga:</div>
                <br>
                <div class="selections">
                    <label for="filter-price">Dari RM</label>
                    <input class="custom input" type="number" name="from" id="filter-price" value="<?php echo $_SESSION['from'] ?>">
                    <label for="filter-price">Hingga RM</label>
                    <input class="custom input  " type="number" name="to" id="filter-price" value="<?php echo $_SESSION['to'] ?>">
                </div>
            </div>
        </div>
        <div class="space-evenly">
            <div class="php"></div>
            <button type="button" data-reset name="" id="" class="custom button">Set semula</button>
            <button type="submit" name="" id="" class="custom button yes">Terapkan</button>
        </div>
    </div>
</form>

<script>
    let form = document.querySelector('form')
    let filter = document.querySelector('.filter')
    let php = document.querySelector('.php')
    let searchContainer = document.querySelector('.search-container')
    let filterMenu = document.querySelector('#filter-menu')

    filter.onclick = () => {
        if(filterMenu.classList.contains('down')) {
            filterMenu.classList.remove('down')
            searchContainer.classList.remove('down')
            filterMenu.classList.remove('index')
        } else {
            filterMenu.classList.add('down')
            searchContainer.classList.add('down')

            setTimeout(() => {
                filterMenu.classList.add('index')
            }, 1000);
        }
        
        let save = filterMenu.classList.contains('down')
        
        sessionStorage.setItem('isOpen', save)
    }

    if (sessionStorage.getItem('isOpen') == 'true' ?? false) {
        filterMenu.classList.add('down')
        searchContainer.classList.add('down')
        filterMenu.classList.add('index')
    }
</script>