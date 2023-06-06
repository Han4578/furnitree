let body = document.querySelector('body')
let menu = document.querySelector('#menu')
let user = document.querySelector('#user')
let userMenu = document.querySelector('#user-menu')
let menuList = document.querySelector('#menu-list')
let darken = document.querySelector('.darken')
let home = document.querySelector('[data-home]')
let filter = document.querySelector('[data-filter]')
let logo = document.querySelector('[data-logo]')
let furniture = document.querySelector('[data-furniture]') ?? document.createElement('div')
let dataUser = document.querySelector('[data-user]') ?? document.createElement('div')
let items
let login = document.querySelector('[data-login]') ?? document.createElement('div')
let logout = document.querySelector('[data-logout]') ?? document.createElement('div')
let signup = document.querySelector('[data-signup]') ?? document.createElement('div')
let profile = document.querySelector('[data-profile]') ?? document.createElement('div')

let redirect = {
    home() {
        window.location = '../main_pages/main_page.php';
    },

    filter() {
        window.location = '../main_pages/filter.php';
    },

    login() {
        window.location = '../sign in/signin.php';
    },

    profile() {
        window.location = '../main_pages/profile.php';
    },

    furniture() {
        window.location = '../manage/furniture.php';
    },

    user() {
        window.location = '../manage/user.php';
    },

    signup() {
        window.location = '../user register/user_register.php';
    }
}

menu.addEventListener('click', openMenu)
darken.addEventListener('click', closeMenu)
home.addEventListener('click', redirect.home)
filter.addEventListener('click', redirect.filter)
login.addEventListener('click', redirect.login)
profile.addEventListener('click', redirect.profile)
signup.addEventListener('click', redirect.signup)
logo.addEventListener('click', redirect.home)
furniture.addEventListener('click', redirect.furniture)
dataUser.addEventListener('click', redirect.user)
logout.addEventListener('click', logOut)
window.addEventListener('click', closeUser)
user.addEventListener('click', openUser)



function openMenu() {
    menuList.classList.add('open')
    darken.classList.add('open')
    body.style.overflow = 'hidden'
    body.style.marginRight = '17px'
}

function closeMenu(e) {
    menuList.classList.remove('open')
    darken.classList.remove('open')
    e.stopPropagation()
    body.style.overflow = 'auto'
    body.style.marginRight = 0
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
