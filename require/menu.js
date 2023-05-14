let body = document.querySelector('body')
let menu = document.querySelector('#menu')
let menuList = document.querySelector('#menu-list')
let darken = document.querySelector('.darken')
let home = document.querySelector('[data-home]')
let filter = document.querySelector('[data-filter]')

menu.addEventListener('click', openMenu)
darken.addEventListener('click', closeMenu)
home.addEventListener('click', redirectHome)
filter.addEventListener('click', redirectFilter)

function openMenu() {
    menuList.classList.add('open')
    darken.classList.add('open')
    body.style.overflow = 'hidden'
    body.style.marginRight = '15px'
}

function closeMenu(e) {
    menuList.classList.remove('open')
    darken.classList.remove('open')
    e.stopPropagation()
    body.style.overflow = 'auto'
    body.style.marginRight = 0
}

function redirectHome() {
    window.location = '../main_pages/main_page.php';
}

function redirectFilter() {
    window.location = '../main_pages/filter.php';
}

