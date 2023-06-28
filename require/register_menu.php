<?php
    require "../require/connect.php";
    session_start();
?>

<link rel="stylesheet" href="../style.css">
<script src="../functions.js"></script>

<div class="top">
    <div class="icon close" id="menu">
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
                      
            if (key_exists('isLoggedIn', $_SESSION)) {
                
                $isLogged = "<div class='user-button' onclick='redirect.profile(".$_SESSION['id'].")'>Profil</div>
                         <div class='user-button' data-logout>Log keluar</div>";
            if ($_SESSION['level'] > 1) {
                $isLogged .= "<div class='user-button' data-furniture> Mengurus Perabot</div>";
                $isLogged .= "<div class='user-button' data-brand> Mengurus Jenama</div>";

                if ($_SESSION['level'] > 2) {
                    $isLogged .= "<div class='user-button' data-user> Mengurus Pengguna</div>";
                }
            }

            echo $isLogged;
        }else echo $notLogged;
        ?>
    </div>
<div class="darken"></div>
<div id="menu-list">
    <h1 class="menu-logo">Menu</h1>
    <div class="menu-button" data-home>home</div>
    <div class="menu-button" data-filter>filter</div>
    <div class="menu-button">settings</div>
</div>


<script>
    <?php
    require "menu.js";
    ?>

    function openMenu() {
        menuList.classList.add('open')
        darken.classList.add('open')
        body.style.overflow = 'hidden'
    }

    function closeMenu(e) {
        menuList.classList.remove('open')
        darken.classList.remove('open')
        e.stopPropagation()
        body.style.overflow = 'auto'
    }
</script>