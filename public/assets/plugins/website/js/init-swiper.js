// :: root
progressCircle = document.querySelector(".autoplay-progress svg");
progressContent = document.querySelector(".autoplay-progress span");

// 1: PLANS

// 1.1: one
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

// -------------------------------------------------------------

// 2: BUNDLES
progressCircleTwo = document.querySelector(".autoplay-progress.bundles svg");
progressContentTwo = document.querySelector(".autoplay-progress.bundles span");

// 2.1: one
$(document).ready(function () {
    var planOne = new Swiper(".bundles--swiper-1", {
        // autoplay: {
        //     delay: 2500,
        //     disableOnInteraction: true,
        // },
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
        // on: {
        //     autoplayTimeLeft(s, time, progress) {
        //         progressCircleTwo.style.setProperty("--progress", 1 - progress);
        //         progressContentTwo.textContent = `${Math.ceil(time / 1000)}s`;
        //     },
        // },

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

// -------------------------------------------------------------

// 3: Features
progressCircleThree = document.querySelector(".autoplay-progress.features svg");
progressContentThree = document.querySelector(
    ".autoplay-progress.features span"
);

// 3.1: one
$(document).ready(function () {
    var featuresOne = new Swiper(".features--swiper-1", {
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },

        pagination: {
            el: ".swiper-pagination.features",
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
                progressCircleThree.style.setProperty(
                    "--progress",
                    1 - progress
                );
                progressContentThree.textContent = `${Math.ceil(time / 1000)}s`;
            },
        },

        effect: "creative",
        creativeEffect: {
            prev: {
                shadow: true,
                translate: ["-20%", 0, -1],
            },
            next: {
                translate: ["100%", 0, 0],
            },
        },

        breakpoints: {
            1: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 1,
            },
            1200: {
                slidesPerView: 1,
            },
        },
    });
});

// -------------------------------------------------------------

// 4: reviews
progressCircleFour = document.querySelector(".autoplay-progress.reviews svg");
progressContentFour = document.querySelector(".autoplay-progress.reviews span");

// 4.1: one
$(document).ready(function () {
    var reviewsOne = new Swiper(".reviews--swiper-1", {
        autoplay: {
            delay: 10000,
            disableOnInteraction: false,
        },
        loop: true,
        pagination: {
            el: ".swiper-pagination.reviews",
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
                progressCircleFour.style.setProperty(
                    "--progress",
                    1 - progress
                );
                progressContentFour.textContent = `${Math.ceil(time / 1000)}s`;
            },
        },
        breakpoints: {
            1: {
                slidesPerView: 1,
                spaceBetween: 15,
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 15,
            },
        },
    });
});

// -------------------------------------------------------------

// 5: brands
$(document).ready(function () {
    var brandsOne = new Swiper(".brands--swiper-1", {
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
        loop: true,
        keyboard: true,
        grabCursor: true,
        breakpoints: {
            1: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            576: {
                slidesPerView: 4,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 15,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 15,
            },
        },
    });
});
