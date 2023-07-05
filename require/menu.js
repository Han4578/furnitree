let body = document.querySelector('body')
let menu = document.querySelector('#menu')
let user = document.querySelector('#user')
let userMenu = document.querySelector('#user-menu')
let menuList = document.querySelector('#menu-list')
let darken = document.querySelector('.darken')
let categoryMenu = document.querySelector('[data-category-menu]')
let brandMenu = document.querySelector('[data-brand-menu]')
let categoryList = document.querySelector('[data-category-list]')
let brandList = document.querySelector('[data-brand-list]')
let categoryItems = document.querySelectorAll('[data-category-item]')
let brandItems = document.querySelectorAll('[data-brand-item]')
let logo = document.querySelector('[data-logo]')
let random = document.querySelector('[data-random]')
let furniture = document.querySelector('[data-furniture]') ?? document.createElement('div')
let brand = document.querySelector('[data-brand]') ?? document.createElement('div')
let dataUser = document.querySelector('[data-user]') ?? document.createElement('div')
let login = document.querySelector('[data-login]') ?? document.createElement('div')
let logout = document.querySelector('[data-logout]') ?? document.createElement('div')
let signup = document.querySelector('[data-signup]') ?? document.createElement('div')
let profile = document.querySelector('[data-profile]') ?? document.createElement('div')
let pilih = document.querySelector('[data-pilih]') ?? document.createElement('div')
let statistic = document.querySelector('[data-statistic]') ?? document.createElement('div')
let filterIcon = document.querySelector('.filter') ?? document.createElement('div')

let redirect = {
    home() {
        window.location = '../main_pages/main_page.php';
    },

    filter() {
        window.location = '../main_pages/filter.php';
    },

    profile(id) {
        window.location = '../main_pages/profile.php?id=' + id;
    },

    login() {
        window.location = '../sign in/signin.php';
    },

    signup() {
        window.location = '../user register/user_register.php';
    },

    furniture() {
        window.location = '../manage/furniture.php';
    },

    user() {
        window.location = '../manage/user.php';
    },

    pilih() {
        window.location = "../manage/pilihan.php";
    },

    statistic() {
        window.location = "../manage/statistics.php";
    },

    brand() {
        window.location = '../manage/brand.php';
    },

    category(id) {
        window.location = "../require/category.php?id=" + id
    },

    random() {
        window.location = '../require/random.php';
    }
}

menu.addEventListener('click', openMenu)
darken.addEventListener('click', closeMenu)
categoryMenu.addEventListener('click', toggleCategory)
brandMenu.addEventListener('click', toggleBrand)
random.addEventListener('click', redirect.random)
login.addEventListener('click', redirect.login)
signup.addEventListener('click', redirect.signup)
logo.addEventListener('click', redirect.home)
furniture.addEventListener('click', redirect.furniture)
brand.addEventListener('click', redirect.brand)
dataUser.addEventListener('click', redirect.user)
pilih.addEventListener('click', redirect.pilih)
statistic.addEventListener('click', redirect.statistic)
logout.addEventListener('click', logOut)
window.addEventListener('click', closeUser)
user.addEventListener('click', openUser)



for (const categoryItem of categoryItems) {
    categoryItem.addEventListener('click', () => {
        redirect.category(categoryItem.id)
    })
}


for (const brandItem of brandItems) {
    brandItem.addEventListener('click', () => {
        window.location = "../main_pages/brand.php?id=" + brandItem.id
    })
}


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

function toggleBrand() {
    let arrow = brandMenu.querySelector('img')
    brandList.classList.toggle("none")
    arrow.classList.toggle('flip')
}

function toggleCategory() {
    let arrow = categoryMenu.querySelector('img')
    categoryList.classList.toggle("none")
    arrow.classList.toggle('flip')
}
