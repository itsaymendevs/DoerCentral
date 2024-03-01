$(document).ready(function () {
    // 1: switchViews
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
        }, 200);
    });
}); // end documentReady
