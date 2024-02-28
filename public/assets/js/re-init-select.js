// 1: initSelect on ready
$(document).ready(function () {
    $(".form--select").each(function () {
        if (!$(this).hasClass("select2-hidden-accessible")) {
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
        } // end if
    }); // end loop

    $(".form--modal-select").each(function () {
        if (!$(this).hasClass("select2-hidden-accessible")) {
            setupValue = $(this).attr("value");
            setupClear = $(this).attr("data-clear") ? true : false;
            setupModal = $(this).attr("data-modal");
            setupPlaceholder = $(this).attr("data-placeholder");

            if (setupValue == undefined) {
                $(this).select2({
                    dropdownParent: $(setupModal),
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                });
            } else {
                $(this)
                    .select2({
                        dropdownParent: $(setupModal),
                        allowClear: setupClear,
                        placeholder: setupPlaceholder ? setupPlaceholder : "",
                    })
                    .val(setupValue)
                    .trigger("change");
            } // end else
        } // end if
    }); // end loop
}); // end function

// -------------------------------------------------------------

// 2: initSelect on navigate
document.addEventListener(
    "livewire:navigated",
    function () {
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
                            placeholder: setupPlaceholder
                                ? setupPlaceholder
                                : "",
                        })
                        .val(setupValue)
                        .trigger("change");
                } // end else
            }); // end loop

            $(".form--modal-select").each(function () {
                setupValue = $(this).attr("value");
                setupClear = $(this).attr("data-clear") ? true : false;
                setupModal = $(this).attr("data-modal");
                setupPlaceholder = $(this).attr("data-placeholder");

                if (setupValue == undefined) {
                    $(this).select2({
                        dropdownParent: $(setupModal),
                        allowClear: setupClear,
                        placeholder: setupPlaceholder ? setupPlaceholder : "",
                    });
                } else {
                    $(this)
                        .select2({
                            dropdownParent: $(setupModal),
                            allowClear: setupClear,
                            placeholder: setupPlaceholder
                                ? setupPlaceholder
                                : "",
                        })
                        .val(setupValue)
                        .trigger("change");
                } // end else
            }); // end loop
        }); // end function
    },
    false
);

// -------------------------------------------------------------

// 4: initSelect
window.addEventListener("initSelect", (event) => {
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
        }); // end loop
    });
});

// -------------------------------------------------------------

// 5: initChildSelect
window.addEventListener("initChildSelect", (event) => {
    $(document).ready(function () {
        $(".child-select").each(function () {
            if (!$(this).hasClass("select2-hidden-accessible")) {
                setupClear = $(this).attr("data-clear") ? true : false;
                setupPlaceholder = $(this).attr("data-placeholder");

                $(this).select2({
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                });
            } // end if
        }); // end loop

        $(".child-modal-select").each(function () {
            if (!$(this).hasClass("select2-hidden-accessible")) {
                setupModal = $(this).attr("data-modal");
                setupClear = $(this).attr("data-clear") ? true : false;
                setupPlaceholder = $(this).attr("data-placeholder");

                $(this).select2({
                    dropdownParent: setupModal,
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                });
            } // end if
        }); // end loop
    });
});

// -------------------------------------------------------------

// 5: resetSelect
window.addEventListener("resetSelect", (event) => {
    $(document).ready(function () {
        $(".form--modal-select").each(function () {
            $(this).val("").trigger("change");
        }); // end loop
    });
});

// -------------------------------------------------------------

// 6: initEditSelect
window.addEventListener("setSelect", (event) => {
    $(document).ready(function () {
        selectId = event.detail.id;

        setupValue = event.detail.value;
        setupClear = $(selectId).attr("data-clear") ? true : false;
        setupModal = $(selectId).attr("data-modal");
        setupPlaceholder = $(selectId).attr("data-placeholder");

        $(selectId)
            .select2({
                dropdownParent: setupModal,
                allowClear: setupClear,
                placeholder: setupPlaceholder ? setupPlaceholder : "",
            })
            .val(setupValue)
            .trigger("change");
    });
});

// -------------------------------------------------------------
// -------------------------------------------------------------

// 6: refreshSelect with Dynamic Content - childSelect
window.addEventListener("refreshSelect", (event) => {
    $(document).ready(function () {
        selectId = event.detail.id;
        data = event.detail.data;

        setupValue = $(selectId).select2("val");
        setupClear = $(selectId).attr("data-clear") ? true : false;
        setupModal = $(selectId).attr("data-modal");
        setupPlaceholder = $(selectId).attr("data-placeholder");

        // :: removePrevious
        if ($(selectId).hasClass("select2-hidden-accessible")) {
            $(selectId).empty();
        } // end if

        // :: initNew
        $(selectId)
            .select2({
                dropdownParent: setupModal,
                allowClear: setupClear,
                placeholder: setupPlaceholder ? setupPlaceholder : "",
                data: data,
            })
            .val(setupValue)
            .trigger("change");
    });
});
