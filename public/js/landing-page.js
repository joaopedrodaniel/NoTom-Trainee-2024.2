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
            510: {
                slidesPerView: 2
            },
            900:{
                slidesPerView: 3
            },
            1500:{
                slidesPerView: 4
            },
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        }
    });
};

function toggleText(postId) {
    var textElement = document.getElementById("texto-" + postId);
    var button = document.getElementById("ver-mais-" + postId);

    if (textElement.style.maxHeight === "100px" || textElement.style.maxHeight === "") {
        textElement.style.maxHeight = "none";
        button.textContent = "Ver Menos";
    } else {
        textElement.style.maxHeight = "100px";
        button.textContent = "Ver Mais";
    }
}
