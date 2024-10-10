// 1: plans

// 1.1: one
window.addEventListener("initSwiperOne", (event) => {
    reProgressCircle = document.querySelector(".autoplay-progress svg");
    reProgressContent = document.querySelector(".autoplay-progress span");

    $(document).ready(function () {
        var planOne = new Swiper(".plans--swiper-1", {
            navigation: {
                nextEl: ".plans--swiper-next",
                prevEl: ".plans--swiper-previous",
            },

            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
                clickable: true,
            },

            keyboard: true,
            grabCursor: true,
            keyboard: {
                enabled: true,
            },
            breakpoints: {
                1: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                576: {
                    slidesPerView: 1,
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
});
