<?php
    require "../require/connect.php";
    session_start();
?>

<link rel="stylesheet" href="../style.css">
<script src="../functions.js"></script>

<div class="top">
    <div class="icon" id="menu">
        <img src="../images/Hamburger_icon.png" alt="hamburger-icon">
    </div>
    <img src="../images/furnitree logo full.png" alt="furnitree logo" class="pointer" data-logo>
    <div class="icon">
    <img src="../images/<?php echo (key_exists('isLoggedIn', $_SESSION))? $_SESSION['pfp']: "user_icon.png";?>" alt="user-icon" id="user">
    </div>
</div>
<div id="user-menu">
    <?php
        $notLogged = "<div class='user-button' data-login>Log masuk</div>
                      <div class='user-button' data-signup>Daftar</div>";
                      
                      
        if (checkLogin()) {
            
            $isLogged = "<div class='user-button' onclick='redirect.profile(".$_SESSION['id'].")'>Profil</div>
                     <div class='user-button' data-logout>Log keluar</div>";

            if ($_SESSION['level'] > 1) {
            
                if ($_SESSION['level'] == 2) {
                    if ($_SESSION['brandID'] == '') {
                        $isLogged .= "<div class='user-button' onclick=\"window.location = '../brand register/brand_register.php'\">Daftar Jenama</div>";
                    } else {
                        $isLogged .= "<div class='user-button' onclick=\"window.location = '../main_pages/brand.php?id=".$_SESSION['brandID']."'\">Jenama</div>";
                        $isLogged .= "<div class='user-button' data-furniture> Mengurus Produk</div>";
                    }
                }
                
                if ($_SESSION['level'] == 3) {
                    $isLogged .= "<div class='user-button' data-furniture> Mengurus Produk</div>";
                    $isLogged .= "<div class='user-button' data-user> Mengurus Pengguna</div>";
                    $isLogged .= "<div class='user-button' data-brandM> Mengurus Jenama</div>";
                    $isLogged .= "<div class='user-button' data-statistic> Pilihan Pengguna</div>";
                }
                     
            } else $isLogged .= "<div class='user-button' data-pilih>Pilihan Anda</div>";
            
            echo $isLogged;
        }else echo $notLogged;
    ?>
    </div>
<div class="darken"></div>
<div id="menu-list">
    <h1 class="menu-logo">
        <div class="icon" onclick="closeMenu()">
            <img src="../images/Hamburger_icon.png" alt="hamburger-icon">
        </div>
        <span>Menu</span>
    </h1>
    <div class="menu-button" data-category-menu>Kategori<img src="../images/dropdown-icon.png" alt="" class="transition"></div>
    <div class="menu-list none" data-category-list>
        <?php
            $menuQuery = $conn->query("SELECT * FROM category");

            while ($menuRow = $menuQuery->fetch_assoc()) {
                ?> 
                <div class="menu-item" data-category-item id="<?php echo $menuRow['id'];?>"><img src="../images/<?php echo $menuRow['image'] ?>" alt=""><span><?php echo $menuRow['name'] ?></span></div>
                <?php
            }
        ?>
    </div>
    <div class="menu-button" data-brand-menu>Jenama <img src="../images/dropdown-icon.png" alt="" class="transition"></div>
    <div class="menu-list none" data-brand-list>
        <?php
            $menuQuery2 = $conn->query("SELECT name, logo, id FROM brand");
            
            while ($menuRow2 = $menuQuery2->fetch_assoc()) {
                ?>
                <div class="menu-item" id="<?php echo $menuRow2['id'];?>" data-brand-item><img class="square" src="../images/<?php echo $menuRow2['logo']; ?>" alt=""><span><?php echo $menuRow2['name']; ?></span></div>
                <?php
            }
        ?>
    </div>
    <div class="menu-button random" data-random>Produk Rawak<img src="../images/shuffle.png" alt=""></div>

</div>