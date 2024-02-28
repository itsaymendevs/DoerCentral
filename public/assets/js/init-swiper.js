// 1: init-swiper
$(document).ready(function () {
    var swiper = new Swiper(".quick--cases-swiper", {
        slidesPerView: 6,
        spaceBetween: 30,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        keyboard: {
            enabled: true,
        },
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
});

// --------------------------------------------------------------

// 2: init-swiper
window.addEventListener("initSwiper", (event) => {
    $(document).ready(function () {
        var swiper = new Swiper(".quick--cases-swiper", {
            slidesPerView: 6,
            spaceBetween: 30,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            keyboard: {
                enabled: true,
            },
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    });
});
