const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

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
        425: {
            direction: 'vertical',
        }

    },

    
});