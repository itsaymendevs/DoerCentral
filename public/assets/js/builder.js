// 1: initCertainSelect
window.addEventListener("initCertainSelect", (event) => {
    $(document).ready(function () {
        selectClass = event.detail.class;

        $(selectClass).each(function () {
            setupValue = $(this).attr("value");
            setupClear = $(this).attr("data-clear") ? true : false;
            setupPlaceholder = $(this).attr("data-placeholder");

            if (setupValue == undefined) {
                $(this).select2({
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                });
            } else {
                $(this)
                    .select2({
                        allowClear: setupClear,
                        placeholder: setupPlaceholder ? setupPlaceholder : "",
                    })
                    .val(setupValue);
            } // end else
        }); // end loop
    });
});

// -------------------------------------------------------------
// -------------------------------------------------------------
