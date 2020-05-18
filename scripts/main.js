const dimeButtn = document.getElementById('dimeButton')
const beritaContainer = document.getElementById('beritaContainer')
const paslonWrapper = document.getElementById('paslonWrapper')
window.addEventListener('scroll', function () {
    // console.log(window.scrollY)
    if (window.screenY > 1) {
        paslonWrapper.style.left = '0'
    }
    if (window.scrollY > 220) {
        beritaContainer.style.opacity = '1'
    } else {
        beritaContainer.style.opacity = '0'
    }
})
