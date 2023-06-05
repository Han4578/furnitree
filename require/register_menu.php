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
    <img src="../images/furnitree logo full.png" alt="furnitree logo" data-logo>
    <div class="icon">
    <img src="../images/<?php echo (key_exists('isLoggedIn', $_SESSION))? $_SESSION['pfp']: "user_icon.png";?>" alt="user-icon" id="user">
    </div>
</div>
<div id="user-menu">
    <?php         
        echo (key_exists('isLoggedIn', $_SESSION) and $_SESSION['isLoggedIn'] == true)? 
        "<div class='user-button' data-profile>Profil</div><div class='user-button' data-logout>Log keluar</div>": 
        "<div class='user-button' data-login>Log masuk</div><div class='user-button' data-signup>Daftar</div>";
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