window.onload = function() {
    const swiper = new Swiper('.postagem', { 
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        breakpoints:{
            0: {
                slidesPerView: 1
            },
            700:{
                slidesPerView: 2
            },
            1080:{
                slidesPerView: 3
            },
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        }
    });
};