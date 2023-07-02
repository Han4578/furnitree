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
        ?>
        <div class="main">
            <?php
                require "../require/search_bar.php";
            ?>
            <div class="sort-bar">
                <span>Susun: </span>
                <span class="sort-button" data-criteria="name">Nama</span>
                <span class="sort-button" data-criteria="brand">Jenama</span>
                <span class="sort-button" data-criteria="color">Warna</span>
                <span class="sort-button" data-criteria="price">Harga</span>
            </div>
            <div class="results">
                <?php
                    $stmt = $_SESSION['stmt'] ?? "SELECT furniture_info.name as name, furniture.id AS id, company.name AS company, price, furniture.image, furniture.color AS color FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN company ON furniture_info.company = company.id LEFT JOIN category ON furniture_info.category = category.id";
                    displayItems("document.querySelector('.results')", "document.querySelector('template')", $stmt);
                ?>
            </div>
        </div>
        <script>
            let sortButtons = document.querySelectorAll('.sort-button')
            let results = document.querySelector('.results')

            for (const button of sortButtons) {
                button.addEventListener('click', () => {
                    for (const b of sortButtons) {
                        if (b !== button) b.classList.remove('sort');
                        else b.classList.add('sort')
                    }

                    sortResult(button.dataset.criteria, results)
                })
            }
        </script>
    </body>
</html>