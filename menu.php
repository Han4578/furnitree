<link rel="stylesheet" href="../style.css">

<div class="atas">
    <div class="ikon close" id="menu">
        <img src="../images/Hamburger_icon.png" alt="hamburger-icon">
    </div>
    <h1>FURNITREE</h1>
    <div class="ikon">
        <img src="../images/user_icon.png" id="user" alt="user-icon">
    </div>
</div>
<div class="darken close"></div>
<div id="menu-list">
    <h1 class="menu-logo">Menu</h1>
    <div class="menu-button">home</div>
    <div class="menu-button">filter</div>
    <div class="menu-button">settings</div>
</div>

<script src="../script.js" defer></script>

<script>
    let body = document.querySelector('body')
    let menu = document.querySelector('#menu')
    let menuList = document.querySelector('#menu-list')
    let darken = document.querySelector('.darken')

    menu.addEventListener('click', openMenu)
    darken.addEventListener('click', closeMenu)

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