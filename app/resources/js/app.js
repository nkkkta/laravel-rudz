
import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

document.addEventListener('DOMContentLoaded', async () => {
    const toggleButton = document.querySelector('.mobile-menu');
    const mainLinks = document.querySelector('.pre-header__left');

    toggleButton.addEventListener('click', () => {
        mainLinks.classList.toggle('is-open');
    });

    await import('./owl.carousel.js');

    $(function() {
        $(".owl-carousel").owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:2
                }
            }
        });
    });
});
