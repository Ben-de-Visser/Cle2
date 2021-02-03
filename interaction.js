console.log("test");

const navbar = document.querySelector("nav")
console.log(navbar)
const startPosition = navbar.offsetTop;

const reserverenButton = document.querySelector("#reserveren")
const reserverenSection = document.querySelector("#reserverensection")

reserverenButton.addEventListener("click", function (){
    reserverenSection.scrollIntoView({behavior:'smooth'});
})

const contactButton = document.querySelector("#contact")
const contactSection = document.querySelector("#contactsection")

contactButton.addEventListener("click", function (){
    contactSection.scrollIntoView({behavior:'smooth'});
})

window.addEventListener("scroll", function (){
    checkNavbar()
})

function checkNavbar() {
    if (window.pageYOffset >= startPosition){
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky")
    }
}
