// 1: switchViews
$(document).ready(function () {
    $(".btn--switch-view").click(function () {
        target = $(this).attr("data-target");
        view = $(this).attr("data-view");
        instance = $(this).attr("data-instance");

        // :: toggleInstances
        $(`.btn--switch-view[data-instance=${instance}]`).toggleClass("active");

        // :: toggleTargets
        $(`.${target}`).fadeOut();

        setTimeout(() => {
            $(`.${target}[data-view=${view}]`).fadeIn();
        }, 400);
    });
}); // end documentReady

// -----------------------------------------------------------

// 1: switchRegularViews
$(document).ready(function () {
    $("div").on("click", ".btn--switch-regular", function () {
        view = $(this).attr("data-view");
        instance = $(this).attr("data-instance");

        // 1: toggleButtons - activateButton
        $(`.btn--switch-regular[data-instance=${instance}]`).removeClass(
            "active"
        );
        $(this).addClass("active");

        // 1.2: toggleInstances - showView
        $(`div[data-instance=${instance}]`).addClass("d-none");
        $(`div[data-view=${view}]`).removeClass("d-none");
    });
}); // end documentReady
