// 1: init - ready
$(document).ready(function () {
    $(".nice--select").each(function () {
        $(this).niceSelect();
    }); // end loop
});

// ------------------------------------
// ------------------------------------

// 2: init - navigate
document.addEventListener("livewire:navigated", function () {
    $(document).ready(function () {
        $(".nice--select").each(function () {
            $(this).niceSelect();
        }); // end loop
    });
});
