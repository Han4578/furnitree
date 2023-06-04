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

