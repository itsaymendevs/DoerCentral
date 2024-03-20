$("div").on("click", ".button--checkbox", function () {
    // 1: getCheckbox
    checkbox = "#" + $(this).attr("for");
    isChecked = $(checkbox).prop("checked");

    // 2: checked isReversed
    isChecked ? $(this).removeClass("active") : $(this).addClass("active");
});
