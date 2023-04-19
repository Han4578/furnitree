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
    body.style.marginRight = '15px'
}

function closeMenu(e) {
    menuList.classList.remove('open')
    darken.classList.remove('open')
    e.stopPropagation()
    body.style.overflow = 'auto'
    body.style.marginRight = 0
}

