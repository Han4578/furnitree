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
    <div class="icon" id="user">
        <img src="../images/user_icon.png" alt="user-icon">
    </div>
</div>
<div id="user-menu">
    <?php         
        echo (key_exists('isLogged in', $_SESSION) and $_SESSION['isLoggedIn'] == 1)? "<div class='user-button' data-profile>Profil</div>": "<div class='user-button' data-login>Log masuk</div>";
    ?>
    <div class="user-button">Profil</div>
    <div class="user-button">Profil</div>
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
</script>