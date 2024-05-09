$(".preview--password").click(function () {
    // 1: getTarget
    target = $(this).attr("data-target");

    // 2: toggleType
    currentType = $(target).attr("type");

    if (currentType == "password") {
        $(target).attr("type", "text");
        $(this).addClass("d-none");
        $(".hide--password").removeClass("d-none");
    }
}); // end function

$(".hide--password").click(function () {
    // 1: getTarget
    target = $(this).attr("data-target");

    // 2: toggleType
    currentType = $(target).attr("type");

    if (currentType == "text") {
        $(target).attr("type", "password");
        $(this).addClass("d-none");
        $(".preview--password").removeClass("d-none");
    }
}); // end function
