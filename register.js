let price = document.querySelector('#price')

price.addEventListener('keypress', e => {
    if (['e', '-', '+'].includes(e.key)) {
        e.preventDefault()
    }
})

function roundNumber(e, value) {
    let newNum = Math.round(value * 100) / 100
    e.value = newNum
}
