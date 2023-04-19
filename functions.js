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

function displayItems(assoc, container) {

}

function displayOptions(name, container, value) {
    let option = document.createElement('option')
    option.innerText = name
    option.value = value
    container.appendChild(option)
}