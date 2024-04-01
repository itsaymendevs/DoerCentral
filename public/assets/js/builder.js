// 1: initCertainSelect
window.addEventListener("initCertainSelect", (event) => {
    $(document).ready(function () {
        selectClass = event.detail.class;

        $(selectClass).each(function () {
            if (!$(this).hasClass("select2-hidden-accessible")) {
                setupValue = $(this).attr("value");
                setupClear = $(this).attr("data-clear") ? true : false;
                setupPlaceholder = $(this).attr("data-placeholder");
                setupTrigger = $(this).attr("data-trigger") ? true : false;

                if (setupValue == undefined) {
                    $(this).select2({
                        allowClear: setupClear,
                        placeholder: setupPlaceholder ? setupPlaceholder : "",
                    });
                } else {
                    $(this)
                        .val(setupValue)
                        .select2({
                            allowClear: setupClear,
                            placeholder: setupPlaceholder
                                ? setupPlaceholder
                                : "",
                        });
                } // end else

                if (setupTrigger) $(this).trigger("change");
            }
        }); // end loop
    });
});

// -------------------------------------------------------------
// -------------------------------------------------------------
