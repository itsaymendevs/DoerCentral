$(document).ready(function () {
    new Swiper(".plans--overview-swiper", {
        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: 30,
        mousewheel: true,
        autoplay: true,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
});
