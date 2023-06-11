function excludeSymbols(e) {
    if (['e', '-', '+'].includes(e.key)) {
        e.preventDefault()
    }
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

function displayItems(container, name, image, price, company, template, id) {
    let item = template.content.cloneNode(true)
    let div = item.querySelector('.item') ?? item.querySelector('.result-item') ?? item.querySelector('.related-item')
    let itemName = item.querySelector('[data-name]') ?? item.querySelector('[data-relName]')
    let companyName = item.querySelector('[data-company]') ?? item.querySelector('[data-relCompany]')
    let itemPrice = item.querySelector('[data-price]') ?? item.querySelector('[data-relPrice]')
    let itemImg = item.querySelector('[data-image]') ?? item.querySelector('[data-relImage]')
    
    div.id = id
    itemName.innerText = name
    itemPrice.innerText = 'RM'+ price.toFixed(2);
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
        console.log(data);
        let column = document.createElement('span')

        if (i == 6) column.classList.add('email')
        if (i == 7) {
            let img = document.createElement('img')
            
            column.classList.add('image')
            img.src = "../images/" + data
            column.appendChild(img)
            
        } else column.innerText = data

        column.classList.add('column')
        row.appendChild(column)
        i++
    }

    row.appendChild(actions)

    container.appendChild(row)
}
function displayFurniture(container, name, color, company, price, pfp, no, id) {
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

        if (i == 2) column.classList.add('email')
        if (i == 5) column.classList.add('price')
        if (i == 6) {
            let img = document.createElement('img')
            
            column.classList.add('image')
            img.src = "../images/" + data
            column.appendChild(img)
            
        } else column.innerText = data

        column.classList.add('column')
        row.appendChild(column)
        i++
    }

    row.appendChild(actions)

    container.appendChild(row)
    let priceSpan = row.querySelector('.price')
    priceSpan.innerText = parseFloat(priceSpan.innerText).toFixed(2)
}

function displaySelections(name, container, value, i, id, selected) {
    let div = document.createElement('div')
    let label = document.createElement('label')
    let input = document.createElement('input')
    let selectedArray = selected.split(',')

    input.type = 'checkbox'
    input.value = value
    input.name = id + '[]'
    input.classList.add('custom')
    input.id = 'filter-'+ id + i
    label.for = 'filter-'+ id + i
    label.innerHTML += " " + name

    
    div.appendChild(input)
    div.appendChild(label)

    container.appendChild(div)
    
    if (selectedArray.includes(value)) input.checked = !input.checked
}

