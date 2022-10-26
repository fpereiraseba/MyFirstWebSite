// MENU SHOW AND HEDDEN
const navMenu =document.getElementById('nav-menu'),
    navToggle = document.getElementById('nav-toggle'),
    navClose = document.getElementById('nav-close')


// SHOW MENU
if(navToggle){
    navToggle.addEventListener('click', () =>{
        navMenu.classList.add('show_menu')
    })
}

// HIDE MENU
if(navClose){
    navClose.addEventListener('click', ()=>{
        navMenu.classList.remove('show_menu')
    })
}

// REMOVE MENU MOBILE
const navLink = document.querySelectorAll('.nav_link')

function linkAction(){
    const navMenu = document.getElementById('nav-menu')
    // When we click on each nav__link, we remove the show-menu class
    navMenu.classList.remove('show_menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

//correo enviado alerta
const form = document.querySelector('#form')
form.addEventListener('submit', enviar)
function enviar(e) {
    e.preventDefault()
    alert("Correo enviado")
}
