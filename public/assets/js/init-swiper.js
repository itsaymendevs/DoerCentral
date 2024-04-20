// 1: bannerSwiper
$(document).ready(function () {
    var swiper = new Swiper(".banner-swiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        keyboard: {
            enabled: true,
        },
        effect: "fade",
        fadeEffect: {
            crossFade: true,
        },
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            type: "bullets",
            dynamicBullets: true,
            clickable: true,
        },
    });
});

// --------------------------------------------------------------

// 2: mealsSwiper
$(document).ready(function () {
    var swiper = new Swiper(".meals-swiper", {
        spaceBetween: 30,
        breakpoints: {
            1: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        keyboard: {
            enabled: true,
        },
        effect: "slide",
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            type: "bullets",
            dynamicBullets: true,
            clickable: true,
        },
    });
});

// --------------------------------------------------------------

// 3: blogsSwiper
$(document).ready(function () {
    var swiper = new Swiper(".blogs-swiper", {
        spaceBetween: 30,
        breakpoints: {
            1: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        keyboard: {
            enabled: true,
        },
        effect: "fade",
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            type: "bullets",
            dynamicBullets: true,
            clickable: true,
        },
    });
});
