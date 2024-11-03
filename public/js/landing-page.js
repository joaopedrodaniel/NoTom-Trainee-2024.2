document.addEventListener('DOMContentLoaded', () => {
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 3, // Mostra três slides por vez
        spaceBetween: 45,
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 3,
            },
            480: { 
                slidesPerView: 1,
            }
        }
    });
});
