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
const formPemilih = document.getElementById('formPemilih')
const profilePemilih = document.getElementById('profilePemilih')
setTimeout(function () {
    formPemilih.style.left = '0'
    profilePemilih.style.right = '0'
}, 300)

const suara = document.getElementById('suara')
let suaraMasuk = parseInt(suara.getAttribute('data-suara'))
let suaraAwal = 0
// suara.innerHTML = `Total Suara Masuk (${suaraAwal}) suara`
let waktu = setInterval(function () {
    console.log(++suaraAwal)
    if (suaraAwal === suaraMasuk) {
        stop()
    }
    suara.innerHTML = `Total Suara Masuk (${suaraAwal}) suara`
}, 200)
function stop() {
    if (suaraAwal === suaraMasuk) {
        clearInterval(waktu)
    }
}
