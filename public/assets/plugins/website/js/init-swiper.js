// :: root
progressCircle = document.querySelector(".autoplay-progress svg");
progressContent = document.querySelector(".autoplay-progress span");

// 1: PLANS

// 1.1: one
$(document).ready(function () {
    var planOne = new Swiper(".plans--swiper-1", {
        autoplay: {
            delay: 2500,
            disableOnInteraction: true,
        },
        loop: true,
        navigation: {
            nextEl: ".plans--swiper-next",
            prevEl: ".plans--swiper-previous",
        },

        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
            clickable: true,
        },

        mousewheel: true,
        keyboard: true,
        grabCursor: true,
        keyboard: {
            enabled: true,
        },
        on: {
            autoplayTimeLeft(s, time, progress) {
                progressCircle.style.setProperty("--progress", 1 - progress);
                progressContent.textContent = `${Math.ceil(time / 1000)}s`;
            },
        },

        breakpoints: {
            1: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
        },
    });
});

// -------------------------------------------------------------

// 2: BUNDLES
progressCircleTwo = document.querySelector(".autoplay-progress.bundles svg");
progressContentTwo = document.querySelector(".autoplay-progress.bundles span");

// 2.1: one
$(document).ready(function () {
    var planOne = new Swiper(".bundles--swiper-1", {
        autoplay: {
            delay: 2500,
            disableOnInteraction: true,
        },
        navigation: {
            nextEl: ".bundles--swiper-next",
            prevEl: ".bundles--swiper-previous",
        },

        pagination: {
            el: ".swiper-pagination.bundles",
            dynamicBullets: true,
            clickable: true,
        },

        keyboard: true,
        grabCursor: true,
        keyboard: {
            enabled: true,
        },
        on: {
            autoplayTimeLeft(s, time, progress) {
                progressCircleTwo.style.setProperty("--progress", 1 - progress);
                progressContentTwo.textContent = `${Math.ceil(time / 1000)}s`;
            },
        },

        breakpoints: {
            1: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
        },
    });
});
