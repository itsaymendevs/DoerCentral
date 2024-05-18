$(".sidebar--menu-toggler").click(function () {
    $(".sidebar--menu").css("height", "100vh");
    $(".sidebar--menu").css("opacity", "1");
    $(".sidebar--menu").removeClass("invisible");
}); // end function

$(".sidebar--menu-close").click(function () {
    $(".sidebar--menu").css("height", "0vh");
    $(".sidebar--menu").css("opacity", "0");
    $(".sidebar--menu").addClass("invisible");
}); // end function
