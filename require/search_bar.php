<?php
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
        <button type="submit" class="search">S</button>
        <img src="../images/filter.png" class="filter pointer">
    </div>
    <div id="filter-menu">
        <div class="filter-menu">
            <div class="search-column">
                <div>Warna:</div>
                <br>
                <div class="selections S1">
                    <?php
                        $color = $_SESSION['color'];

                        $query = $conn->query("SELECT * FROM color");
                        $i = 1;
                        $checked = str_replace(', ', '', $color);
                        
                        if ($query->num_rows > 0) {
                            while ($row = $query->fetch_assoc()) {
                                
                                $name = $row['name'];
                                $value = $row['id'];
                                $code = $row['code'];
                                ?>  
                                    <input type="checkbox" class="none" name="color[]" id="filter-color<?php echo $i; ?>" value="<?php echo $value; ?>" <?php if (str_contains($checked, $value)) echo "checked"; ?>>
                                    <label for="filter-color<?php echo $i; ?>" class="filter-label  <?php if (str_contains($checked, $value)) echo "label-highlight"; ?>" onclick="toggleHighlight(this)">
                                        <span class="color-circle" style="background-color: <?php echo $code; ?>;"></span>
                                        <span><?php echo $name; ?></span>
                                    </label>             
                                <?php
                                $i++;
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="search-column">
                <div>Jenama:</div>
                <br>
                <div class="selections S2">
                    <?php
                        $brand = $_SESSION['brand'];

                        $query = $conn->query("SELECT * FROM brand");
                        $i = 1;
                        $checked = str_replace(', ', '', $brand);
                        
                        if ($query->num_rows > 0) {
                            while ($row = $query->fetch_assoc()) {
                                
                                $name = $row['name'];
                                $value = $row['id'];
                                $src = $row['logo'];

                                ?>  
                                    <input type="checkbox" class="none" name="brand[]" id="filter-brand<?php echo $i; ?>" value="<?php echo $value; ?>" <?php if (str_contains($checked, $value)) echo "checked"; ?>>
                                    <label for="filter-brand<?php echo $i; ?>" class="filter-label <?php if (str_contains($checked, $value)) echo "label-highlight"; ?>" onclick="toggleHighlight(this)">
                                        <img class="square" src="../images/<?php echo $src; ?>" alt="">
                                        <span><?php echo $name; ?></span>
                                    </label>             
                                <?php
                                $i++;
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="search-column">
                <div>Kategori:</div>
                <br>
                <div class="selections S3">
                    <?php
                        $category = $_SESSION['category'];

                        $query = $conn->query("SELECT * FROM category");
                        $i = 1;
                        $checked = str_replace(', ', '', $category);
                        
                        if ($query->num_rows > 0) {
                            while ($row = $query->fetch_assoc()) {
                                
                                $name = $row['name'];
                                $value = $row['id'];
                                $src = $row['image'];

                                ?>  
                                    <input type="checkbox" class="none" name="category[]" id="filter-category<?php echo $i; ?>" value="<?php echo $value; ?>" <?php if (str_contains($checked, $value)) echo "checked"; ?>>
                                    <label for="filter-category<?php echo $i; ?>" class="filter-label  <?php if (str_contains($checked, $value)) echo "label-highlight"; ?>" onclick="toggleHighlight(this)">
                                        <img class="square" src="../images/<?php echo $src; ?>" alt="">
                                        <span><?php echo $name; ?></span>
                                    </label>             
                                <?php
                                $i++;
                            }
                        }
                    ?>
                </div>
            </div>
        
            <div class="search-column">
                <div>Harga:</div>
                <br>
                <div class="selections">
                    <label for="filter-price">Dari RM</label>
                    <input class="custom input max-width" type="number" name="from" id="filter-price" onblur="roundNumber(this, value)" min="0" value="<?php echo $_SESSION['from']  ?>">
                    <label for="filter-price">Hingga RM</label>
                    <input class="custom input max-width  " type="number" name="to" id="filter-price" onblur="roundNumber(this, value)" min="0" value="<?php echo $_SESSION['to'] ?>">
                </div>
            </div>
        </div>
        <div class="space-evenly">
            <div class="php"></div>
            <button type="button" data-reset  name="" id="" class="custom button">Set semula</button>
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
    let filterLabel = document.querySelectorAll('.filter-label')
    let reset = document.querySelector('[data-reset]')
    let timeOutId = '' 

    let number = document.querySelectorAll('input[type="number"]')
    let input = document.querySelectorAll('input')

    for (const n of number) {
        n.addEventListener('keydown', e => {
            excludeSymbols(e)
        })
    }

    reset.addEventListener('click', () => {
        for (const i of input) {
            if (i.type == 'text' || i.type == 'number') i.value = ''
            else i.checked = false
            
        }      

        for (const f of filterLabel) {
            f.classList.remove('label-highlight')
        }
    })

    filter.onclick = () => {
        if(filterMenu.classList.contains('down')) {
            filterMenu.classList.remove('down')
            searchContainer.classList.remove('down')
            filterMenu.classList.remove('index')
            clearTimeout(timeOutId)
        } else {
            filterMenu.classList.add('down')
            searchContainer.classList.add('down')

            timeOutId = setTimeout(() => {
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