// 1: plans

// 1.1: one
window.addEventListener("initSwiperOne", (event) => {
    reProgressCircle = document.querySelector(".autoplay-progress svg");
    reProgressContent = document.querySelector(".autoplay-progress span");

    $(document).ready(function () {
        var planOne = new Swiper(".plans--swiper-1", {
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
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
                    reProgressCircle.style.setProperty(
                        "--progress",
                        1 - progress
                    );
                    reProgressContent.textContent = `${Math.ceil(
                        time / 1000
                    )}s`;
                },
            },

            breakpoints: {
                1: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                576: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
            },
        });
    });
});

// -------------------------------------------------------------
