$(document).ready(function () {
    $(".form--select").each(function () {
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
                .val(setupValue)
                .trigger("change");
        } // end else
    }); // end loop

    $(".form--modal-select").each(function () {
        if (!$(this).hasClass("select2-hidden-accessible")) {
            setupValue = $(this).attr("value");
            setupClear = $(this).attr("data-clear") ? true : false;
            setupModal = $(this).attr("data-modal");
            setupPlaceholder = $(this).attr("data-placeholder");

            if (setupValue == undefined) {
                $(this).select2({
                    dropdownParent: setupModal,
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                });
            } else {
                $(this)
                    .select2({
                        dropdownParent: setupModal,
                        allowClear: setupClear,
                        placeholder: setupPlaceholder ? setupPlaceholder : "",
                    })
                    .val(setupValue)
                    .trigger("change");
            } // end else
        } // end if
    }); // end loop
}); // end function
