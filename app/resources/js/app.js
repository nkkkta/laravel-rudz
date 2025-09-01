
import './owl.carousel';
import './owl.carousel.min';


document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.querySelector('.mobile-menu');
    const mainLinks = document.querySelector('.pre-header__left');

    toggleButton.addEventListener('click', () => {
        mainLinks.classList.toggle('is-open');
    });
});

$(document).ready(function(){
    $(".owl-carousel").owlCarousel();
});