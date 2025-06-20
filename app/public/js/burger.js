// Menu burger
// Sélection des éléments
const burgerIcon = document.querySelector('#burger');
const navMenu = document.querySelector('nav ul');

// Ajout d'un écouteur d'événement sur le burger
burgerIcon.addEventListener('click', function () {
    // Toggle de la classe 'open' sur le menu de navigation
    navMenu.classList.toggle('open');
});
