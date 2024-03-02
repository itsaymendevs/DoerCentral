$(document).ready(function () {
    $("img").addClass("no-blur");
});

document.addEventListener("livewire:navigated", function () {
    $(document).ready(function () {
        $("img").addClass("no-blur");
    });
});

window.addEventListener("noBlur", (event) => {
    $(document).ready(function () {
        $("img").addClass("no-blur");
    });
});
