// Menu burger
// Sélection des éléments
const burgerIcon = document.querySelector('#burger');
const navMenu = document.querySelector('nav ul');

// Ajout d'un écouteur d'événement sur le burger
burgerIcon.addEventListener('click', function () {
    // Toggle de la classe 'open' sur le menu de navigation
    navMenu.classList.toggle('open');
});
// Diaporama
document.addEventListener("DOMContentLoaded", () => {
    const elements = document.querySelectorAll(".element");
    const bars = document.querySelectorAll(".bar");
    const next = document.getElementById("flechedroite");
    const prev = document.getElementById("flechegauche");

    let current = 0;

    function showSlide(index) {
        elements.forEach((el, i) => {
            el.classList.toggle("active", i === index);
            bars[i].classList.toggle("active", i === index);
        });
    }

    next.addEventListener("click", () => {
        current = (current + 1) % elements.length;
        showSlide(current);
    });

    prev.addEventListener("click", () => {
        current = (current - 1 + elements.length) % elements.length;
        showSlide(current);
    });

    // Optionnel : auto défilement toutes les 5 secondes
    // setInterval(() => {
    //     current = (current + 1) % elements.length;
    //     showSlide(current);
    // }, 5000);

    showSlide(current);
});
