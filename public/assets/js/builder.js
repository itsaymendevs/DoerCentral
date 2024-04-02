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

// 2: calculate totalMacros
$("tbody").on("change", ".ingredient--grams-input", function (event) {
    // 1: getItem
    item = $(this);
    setTimeout(function () {
        // 1.2: getSize
        size = item.attr("data-size");

        totalRawCalories = totalRawProteins = totalRawCarbs = totalRawFats = 0;
        $(`.ingredient--calories-input[data-size=${size}]`).each(function () {
            totalRawCalories += parseFloat($(this).val());
        });

        $(`.ingredient--proteins-input[data-size=${size}]`).each(function () {
            totalRawProteins += parseFloat($(this).val());
        });

        $(`.ingredient--carbs-input[data-size=${size}]`).each(function () {
            totalRawCarbs += parseFloat($(this).val());
        });

        $(`.ingredient--fats-input[data-size=${size}]`).each(function () {
            totalRawFats += parseFloat($(this).val());
        });

        // ----------------------------------------------

        // 1.3: display totalMacros
        $(`.ingredient--calories-total-input[data-size=${size}]`).val(
            totalRawCalories.toFixed(1)
        );
        $(`.ingredient--proteins-total-input[data-size=${size}]`).val(
            totalRawProteins.toFixed(1)
        );
        $(`.ingredient--carbs-total-input[data-size=${size}]`).val(
            totalRawCarbs.toFixed(1)
        );
        $(`.ingredient--fats-total-input[data-size=${size}]`).val(
            totalRawFats.toFixed(1)
        );
    }, 1500);
});

// -------------------------------------------------------------
// -------------------------------------------------------------

$(document).ready(function () {
    previousSize = 0;
    $(".ingredient--grams-input").each(function () {
        // 1: getSize
        size = $(this).attr("data-size");

        // :: checkIfDifferent
        if (size != previousSize) {
            totalRawCalories =
                totalRawProteins =
                totalRawCarbs =
                totalRawFats =
                    0;

            $(`.ingredient--calories-input[data-size=${size}]`).each(
                function () {
                    totalRawCalories += parseFloat($(this).val());
                }
            );

            $(`.ingredient--proteins-input[data-size=${size}]`).each(
                function () {
                    totalRawProteins += parseFloat($(this).val());
                }
            );

            $(`.ingredient--carbs-input[data-size=${size}]`).each(function () {
                totalRawCarbs += parseFloat($(this).val());
            });

            $(`.ingredient--fats-input[data-size=${size}]`).each(function () {
                totalRawFats += parseFloat($(this).val());
            });

            // ----------------------------------------------

            // 1.3: display totalMacros
            $(`.ingredient--calories-total-input[data-size=${size}]`).val(
                totalRawCalories.toFixed(1)
            );
            $(`.ingredient--proteins-total-input[data-size=${size}]`).val(
                totalRawProteins.toFixed(1)
            );
            $(`.ingredient--carbs-total-input[data-size=${size}]`).val(
                totalRawCarbs.toFixed(1)
            );
            $(`.ingredient--fats-total-input[data-size=${size}]`).val(
                totalRawFats.toFixed(1)
            );

            previousSize = size;
        }
    });
});

// -------------------------------------------------------------
// -------------------------------------------------------------

window.addEventListener("recalculateMacros", (event) => {
    $(document).ready(function () {
        setTimeout(function () {
            previousSize = 0;
            $(".ingredient--grams-input").each(function () {
                // 1: getSize
                size = $(this).attr("data-size");

                // :: checkIfDifferent
                if (size != previousSize) {
                    totalRawCalories =
                        totalRawProteins =
                        totalRawCarbs =
                        totalRawFats =
                            0;

                    $(`.ingredient--calories-input[data-size=${size}]`).each(
                        function () {
                            totalRawCalories += parseFloat($(this).val());
                        }
                    );

                    $(`.ingredient--proteins-input[data-size=${size}]`).each(
                        function () {
                            totalRawProteins += parseFloat($(this).val());
                        }
                    );

                    $(`.ingredient--carbs-input[data-size=${size}]`).each(
                        function () {
                            totalRawCarbs += parseFloat($(this).val());
                        }
                    );

                    $(`.ingredient--fats-input[data-size=${size}]`).each(
                        function () {
                            totalRawFats += parseFloat($(this).val());
                        }
                    );

                    // ----------------------------------------------

                    // 1.3: display totalMacros
                    $(
                        `.ingredient--calories-total-input[data-size=${size}]`
                    ).val(totalRawCalories.toFixed(1));
                    $(
                        `.ingredient--proteins-total-input[data-size=${size}]`
                    ).val(totalRawProteins.toFixed(1));
                    $(`.ingredient--carbs-total-input[data-size=${size}]`).val(
                        totalRawCarbs.toFixed(1)
                    );
                    $(`.ingredient--fats-total-input[data-size=${size}]`).val(
                        totalRawFats.toFixed(1)
                    );

                    previousSize = size;
                }
            });
        });
    }, 1000);
});
// -------------------------------------------------------------
// -------------------------------------------------------------
