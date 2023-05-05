const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: false,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    mousewheel: {
        invert: false,
      },

    breakpoints: {

        // when window width is >= 640px
        1028: {
            direction: 'vertical',
        }

    },

    keyboard: {
        enabled: true,
        onlyInViewport: false,
      },


});


