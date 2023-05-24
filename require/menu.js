let body = document.querySelector('body')
let menu = document.querySelector('#menu')
let user = document.querySelector('#user')
let userMenu = document.querySelector('#user-menu')
let menuList = document.querySelector('#menu-list')
let darken = document.querySelector('.darken')
let home = document.querySelector('[data-home]')
let filter = document.querySelector('[data-filter]')
let logo = document.querySelector('[data-logo]')
let login = document.querySelector('[data-login]') ?? document.createElement('div')
let logout = document.querySelector('[data-logout]') ?? document.createElement('div')
let signup = document.querySelector('[data-signup]') ?? document.createElement('div')
let profile = document.querySelector('[data-profile]') ?? document.createElement('div')

menu.addEventListener('click', openMenu)
darken.addEventListener('click', closeMenu)
home.addEventListener('click', redirectHome)
filter.addEventListener('click', redirectFilter)
login.addEventListener('click', redirectLogin)
signup.addEventListener('click', redirectSignUp)
profile.addEventListener('click', redirectProfile)
logo.addEventListener('click', redirectHome)
logout.addEventListener('click', logOut)
window.addEventListener('click', closeUser)
user.addEventListener('click', openUser)

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

function redirectLogin() {
    window.location = '../sign in/signin.php';
}

function redirectProfile() {
    window.location = '../main_pages/profile.php';
}

function redirectSignUp() {
    window.location = '../user register/user_register.php';
}

function logOut() {
    window.location = '../require/logout.php';
}

function openUser(e) {
    userMenu.classList.add('open')
    e.stopPropagation()
}

function closeUser() {
    userMenu.classList.remove('open')
}

