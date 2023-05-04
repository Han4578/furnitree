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

function displayOptions(name, container, value) {
    let option = document.createElement('option')
    option.innerText = name
    option.value = value
    container.appendChild(option)
}

function displayItems(container, name, image, price, company, template) {
    let item = template.content.cloneNode(true)
    let itemName = item.querySelector('[data-name]')
    let companyName = item.querySelector('[data-company]')
    let itemPrice = item.querySelector('[data-price]')
    let itemImg = item.querySelector('[data-image]')

    itemName.innerText = name
    itemPrice.innerText = 'RM'+ price.toFixed(2);
    itemImg.src = './images/'+ image
    companyName.innerText = 'Dari ' + company
    container.appendChild(item)
}