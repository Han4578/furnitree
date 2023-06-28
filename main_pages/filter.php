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
            <div class="results">
                <?php
                    $stmt = $_SESSION['stmt'] ?? "SELECT furniture_info.name as name, furniture_info.id AS id, company.name AS company, price, image FROM furniture LEFT JOIN furniture_info ON furniture.info = furniture_info.id LEFT JOIN company ON furniture_info.company = company.id LEFT JOIN category ON furniture_info.category = category.id";
                    displayItems("document.querySelector('.results')", "document.querySelector('template')", $stmt);
                ?>
            </div>
        </div>
        <script>
            let number = document.querySelectorAll('input[type="number"]')
            let reset = document.querySelector('[data-reset]')
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
            })
        </script>
    </body>
</html>