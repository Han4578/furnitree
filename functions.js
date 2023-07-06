function excludeSymbols(e) {
    if (['e', '-', '+'].includes(e.key)) {
        e.preventDefault()
    }
}

function displayPrice(num) {
    let split = parseFloat(num).toFixed(2).split('.');
    
    return parseInt(split[0]).toLocaleString("en-US") + '.' + split[1]
}

function roundNumber(e, value) {
    let newNum = Math.round(value * 100) / 100
    e.value = newNum
}

function togglePassword(checkbox, password) {
    password.type = (checkbox.checked) ? 'text' : 'password';
}

function displayOptions(name, container, value, selected) {
    let option = document.createElement('option')
    option.innerText = name
    option.value = value
    if (value == selected) option.selected = true
    container.appendChild(option)
}

function displayItems(container, name, image, price, company, template, id, color) {
    let item = template.content.cloneNode(true)
    let div = item.querySelector('.item') ?? item.querySelector('.result-item') ?? item.querySelector('.related-item')
    let itemName = item.querySelector('[data-name]') ?? item.querySelector('[data-relName]')
    let companyName = item.querySelector('[data-company]') ?? item.querySelector('[data-relCompany]')
    let itemPrice = item.querySelector('[data-price]') ?? item.querySelector('[data-relPrice]')
    let itemImg = item.querySelector('[data-image]') ?? item.querySelector('[data-relImage]')

    div.dataset.name_value = name
    div.dataset.price_value = price
    div.dataset.brand_value = company
    div.dataset.color_value = color
    
    div.id = id
    itemName.innerText = name
    itemPrice.innerText = 'RM'+ displayPrice(price)
    itemImg.src = '../images/'+ image
    companyName.innerText = 'Dari ' + company

    div.addEventListener('click', () => {
        window.location = "./product.php?id=" + div.id
    })

    container.appendChild(div)
}

function displayAlt(container, image, template, id, highlight){
    let item = template.content.cloneNode(true)
    let div = item.querySelector('.color-img')
    let img = item.querySelector('img')

    if (highlight) div.classList.add('highlighted');

    div.id = id
    img.src = "../images/" + image
    div.dataset.src = img.src

    container.appendChild(div)
}

function displayUsers(container, name, password, nomhp, level, email, pfp, no, id) {
    let row = document.createElement('div')
    let actions = document.createElement('a')
    let columns = [no, name, password, nomhp, level, email, pfp]
    let i = 1

    actions.href =  "../edit/profile.php?id="+id
    actions.innerHTML = "Kemas kini"
    actions.classList.add('column')
    row.classList.add('row')


    for (const data of columns) {
        let column = document.createElement('span')

        switch (i) {
            case 2:
                let account = document.createElement('a')
                account.innerText = data
                account.href = "../main_pages/profile.php?id=" + id
                column.appendChild(account)
                break;
            case 6:
                column.classList.add('email')
                column.innerText = data
                break;
            case 7:
                let img = document.createElement('img')
                column.classList.add('image')
                img.src = "../images/" + data
                column.appendChild(img)
                break;
            default:
                column.innerText = data
        }

        column.classList.add('column')
        row.appendChild(column)
        i++
    }
    row.appendChild(actions)
    container.appendChild(row)
}

function displayBrands(container, name, pfp, no, id, seller, sellerID) {
    let row = document.createElement('div')
    let actions = document.createElement('a')
    let columns = [no, name, seller, pfp]
    let i = 1

    actions.href =  "../edit/brand.php?id="+id
    actions.innerHTML = "Kemas kini"
    actions.classList.add('column')
    row.classList.add('row')


    for (const data of columns) {
        let column = document.createElement('span')

        switch (i) {
            case 2:
                let brand = document.createElement('a')
                brand.innerText = data
                brand.href = "../main_pages/brand.php?id=" + id
                column.appendChild(brand)
                break;
            case 3:
                let account = document.createElement('a')
                account.innerText = data
                account.href = "../main_pages/profile.php?id=" + sellerID
                column.appendChild(account)
                break;
            case 4:
                let img = document.createElement('img')
                column.classList.add('image')
                column.classList.add('grow')
                img.src = "../images/" + data
                column.appendChild(img)
                break;
            default:
                column.innerText = data
        }

        column.classList.add('column')
        row.appendChild(column)
        i++
    }
    row.appendChild(actions)
    container.appendChild(row)
}

function displayFurniture(container, name, color, company, price, pfp, no, id, companyID) {
    let row = document.createElement('div')
    let actions = document.createElement('a')
    let columns = [no, name, color, company, price, pfp]
    let i = 1

    actions.href =  "../edit/furniture.php?id="+id
    actions.innerHTML = "Kemas kini"
    actions.classList.add('column')
    row.classList.add('row')

    for (const data of columns) {
        let column = document.createElement('span')

        switch (i) {
            case 2:
                let product = document.createElement('a')
                product.innerText = data
                product.href = "../main_pages/product.php?id=" + id
                column.appendChild(product)
                column.classList.add('email')
                break;
            case 4:
                let brand = document.createElement('a')
                brand.innerText = data
                brand.href = "../main_pages/brand.php?id=" + companyID
                column.appendChild(brand)
                break;
            case 5:
                column.classList.add('price-column')
                column.innerText = data
                break;
            case 6:
                let img = document.createElement('img')
                column.classList.add('image')
                img.src = "../images/" + data
                column.appendChild(img)
                break;
            default:
                column.innerText = data
        }

        column.classList.add('column')
        row.appendChild(column)
        i++
    }

    row.appendChild(actions)

    container.appendChild(row)
    let priceSpan = row.querySelector('.price-column')
    priceSpan.innerText = displayPrice(priceSpan.innerText)
}

function displayChoice(container, name, num, company, price, pfp, no, id, companyID) {
    let row = document.createElement('div')
    let actions = document.createElement('a')
    let columns = [no, name, pfp, company, num, price]
    let i = 1

    actions.href =  "../require/pilihan_delete.php?id="+id
    actions.innerHTML = "Batalkan"
    actions.classList.add('column')
    row.classList.add('row')

    for (const data of columns) {
        let column = document.createElement('span')

        switch (i) {
            case 2:
                let product = document.createElement('a')
                product.innerText = data
                product.href = "../main_pages/product.php?id=" + id
                column.appendChild(product)
                column.classList.add('email')
                break;
            case 3:
                let img = document.createElement('img')
                column.classList.add('image')
                img.src = "../images/" + data
                column.appendChild(img)
                break;
            case 4:
                let brand = document.createElement('a')
                brand.innerText = data
                brand.href = "../main_pages/brand.php?id=" + companyID
                column.appendChild(brand)
                break;
            case 6:
                column.classList.add('price-column')
                column.innerText = num * price
                break;
            default:
            column.innerText = data
        }

        column.classList.add('column')
        row.appendChild(column)
        i++
    }

    row.appendChild(actions)

    container.appendChild(row)
    let priceSpan = row.querySelector('.price-column')
    priceSpan.innerText = displayPrice(priceSpan.innerText)
}

function displayStatistics(container, username, productname, userId, productId, productImage, amount, price, no) {
    let row = document.createElement('div')
    let actions = document.createElement('a')
    let columns = [no, username, productname, productImage, amount, price]
    let i = 1

    actions.href =  "../require/pilihan_delete.php?id="+ productId
    actions.innerHTML = "Batalkan"
    actions.classList.add('column')
    row.classList.add('row')

    for (const data of columns) {
        let column = document.createElement('span')

        switch (i) {
            case 2:
                let user = document.createElement('a')
                user.innerText = data
                user.href = "../main_pages/profile.php?id=" + userId
                column.appendChild(user)
                column.classList.add('email')
                break;
            case 3:
                let product = document.createElement('a')
                product.innerText = data
                product.href = "../main_pages/product.php?id=" + productId
                column.appendChild(product)
                column.classList.add('email')
                break;
            case 4:
                let img = document.createElement('img')
                column.innerText = ''
                column.classList.add('image')
                img.src = "../images/" + data
                column.appendChild(img)
                break;
            case 6:
                column.classList.add('price-column')
                column.innerText = amount * price
                break;
            default:
                column.innerText = data
                break;
        }

        column.classList.add('column')
        row.appendChild(column)
        i++
    }

    row.appendChild(actions)

    container.appendChild(row)
    let priceSpan = row.querySelector('.price-column')
    priceSpan.innerText = displayPrice(priceSpan.innerText)
}

function printInfo() {
    let top = document.getElementsByClassName('top')[0]
    let actionBar = document.getElementsByClassName('action-bar')[0] ?? document.createElement('div')
    let back = document.getElementsByClassName('back')[0] ?? document.createElement('div')
    
    top.style.display = 'none'
    actionBar.style.display = 'none'
    back.style.display = 'none'

    window.addEventListener('afterprint', () => {
        top.style.display = 'flex'
        actionBar.style.display = 'flex'
        back.style.display = 'flex'
    })

    window.print()
}

function toggleHighlight(label) {
    label.classList.toggle('label-highlight')
}

function sortResult(criteria, container) {
    let items = Array.from(container.children)
    items = items.filter(i => {return i.nodeName == 'DIV'})

    let criteriaArray = items.map(i => {
        switch (criteria) {
            case 'name':
                return i.dataset.name_value
            case 'brand':
                return i.dataset.brand_value
            case 'color':
                return i.dataset.color_value
            case 'price':
                return i.dataset.price_value
            default:
                break;
        }
    })

    if (criteria == 'name') {
        criteriaArray.sort()
    } else criteriaArray.sort((a, b) => {return a - b})

    container.innerHTML = ''

    for (const c of criteriaArray) {
        for (const i of items) {
            let value = ''

            switch (criteria) {
                case 'name':
                    value = i.dataset.name_value
                    break;
                case 'brand':
                    value = i.dataset.brand_value
                    break;
                case 'color':
                    value = i.dataset.color_value
                    break;
                case 'price':
                    value = i.dataset.price_value
                    break;
                default:
                    break;
            }

            if (value == c) {
                container.appendChild(i)
                let index = items.indexOf(i)
                items.splice(index, 1)
                break
            }
        }
    }
}