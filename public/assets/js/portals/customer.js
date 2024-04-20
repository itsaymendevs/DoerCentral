$(".sidebar--menu-toggler").click(function () {
    $(".sidebar--menu").css("width", "100%");
    $(".sidebar--menu").css("opacity", "1");
    $(".sidebar--menu").removeClass("invisible");
}); // end function

$(".sidebar--menu-close").click(function () {
    $(".sidebar--menu").css("width", "0px");
    $(".sidebar--menu").css("opacity", "0");
    $(".sidebar--menu").addClass("invisible");
}); // end function
