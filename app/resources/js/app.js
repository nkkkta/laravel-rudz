
import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;


    await import('./owl.carousel.js');

    $(function() {
        $(".category-slider .owl-carousel").owlCarousel({
            loop:true,
            margin:15,
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

    $(function() {
        $(".product-slider .owl-carousel").owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        });
    });