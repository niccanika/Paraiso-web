//nav
const toggleNav = document.getElementsByClassName('toggle-nav')[0];
const navbar = document.getElementsByTagName('nav')[0];
const navLinks = document.getElementsByClassName('left')[0];
const navLogin = document.getElementById('login');
const socialNav = document.getElementsByClassName('social-nav')[0];
const searchNav = document.getElementsByClassName('search-mobile')[0];
const toggleImg = document.getElementById('toggle-img');
//shop
const toggleSpecies = document.getElementById('species');
const toggleType = document.getElementById('type');
const species = document.getElementsByClassName('plants');
const types = document.getElementsByClassName('type-cat');
const dropdownSpecies = document.getElementById('dropdown-species');
const dropdownType = document.getElementById('dropdown-type');
const cat = document.getElementsByClassName('categories')[0];


toggleNav.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    navbar.classList.toggle('active-nav');
    socialNav.classList.toggle('social-active');

    if (navLogin.style.display === 'block') {
        navLogin.style.display = 'none';
    } else {
        navLogin.style.display = 'block';
    }

    if (toggleImg.src.match('views/icons/menu_phone.svg')) {
        toggleImg.src = 'views/icons/close_phone.svg';
    } else {
        toggleImg.src = 'views/icons/menu_phone.svg';
    }

    if (window.matchMedia("(max-width: 650px)")) {

        searchNav.classList.toggle('search-active');

        if (navbar.classList.contains('active-nav')) {
            dropdownType.style.display = 'none';
            dropdownSpecies.style.display = 'none';
        } else {
            dropdownType.style.display = 'inline-block';
            dropdownSpecies.style.display = 'inline-block';
        }
    }
});

//shop

toggleSpecies.addEventListener('click', () => {
    for (let i = 0; i < types.length; i++) {
        if (types[i].classList.contains('active-cat')) {
            types[i].classList.toggle('active-cat');
            dropdownType.style.transform = "rotate(0deg)";
        }
    }

    for (let i = 0; i < species.length; i++) {
        species[i].classList.toggle('active-cat');
    }

    if (species[0].classList.contains('active-cat')) {
        dropdownSpecies.style.transform = "rotate(180deg)";
    } else {
        dropdownSpecies.style.transform = "rotate(0deg)";
    }
});

toggleType.addEventListener('click', () => {
    for (let i = 0; i < species.length; i++) {
        if (species[i].classList.contains('active-cat')) {
            species[i].classList.toggle('active-cat');
            dropdownSpecies.style.transform = "rotate(0deg)";
        }
    }

    for (let i = 0; i < types.length; i++) {
        types[i].classList.toggle('active-cat');
    }

    if (types[0].classList.contains('active-cat')) {
        dropdownType.style.transform = "rotate(180deg)";
    } else {
        dropdownType.style.transform = "rotate(0deg)";
    }
});

