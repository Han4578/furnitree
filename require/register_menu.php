<?php 
    require "../require/menu.php";
?>

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