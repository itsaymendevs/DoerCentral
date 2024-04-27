$("div").on("click", ".button--checkbox", function () {
    // 1: getCheckbox
    checkbox = "#" + $(this).attr("for");
    isChecked = $(checkbox).prop("checked");

    // 2: checked isReversed
    isChecked ? $(this).removeClass("active") : $(this).addClass("active");
});

window.addEventListener("resetButtonCheckbox", (event) => {
    $(document).ready(function () {
        // 1: getClassName
        className = event.detail.className;

        $(className).each(function () {
            checkbox = "#" + $(this).attr("for");
            isChecked = $(checkbox).prop("checked", false);

            // 2: removeActive
            $(this).removeClass("active");
        });
    });
});
