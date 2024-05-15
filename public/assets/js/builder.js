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
        gramsArray = afterCookGramsArray = [];

        totalRawGrams =
            totalRawCalories =
            totalRawProteins =
            totalRawCarbs =
            totalRawFats =
            totalAfterCookGrams =
            totalAfterCookCalories =
            totalAfterCookProteins =
            totalAfterCookCarbs =
            totalAfterCookFats =
                0;

        $(`.ingredient--grams-input[data-size=${size}]`).each(function () {
            totalRawGrams += parseFloat($(this).val());
            gramsArray.push(parseFloat($(this).val()));
        });

        $(`.ingredient--percentage-input[data-size=${size}]`).each(function () {
            $(this).val(
                ((gramsArray.shift() / totalRawGrams) * 100).toFixed(1)
            );
        });

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
        $(`.ingredient--grams-total-input[data-size=${size}]`).val(
            totalRawGrams.toFixed(1)
        );
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
        // -------------------------------------------------
        // -------------------------------------------------
        // -------------------------------------------------
        // ------------------ AfterCook ---------------------

        $(`.ingredient--afterCookGrams-input[data-size=${size}]`).each(
            function () {
                totalAfterCookGrams += parseFloat($(this).val() ?? 0);
                afterCookGramsArray.push(parseFloat($(this).val() ?? 0));
            }
        );

        $(`.ingredient--afterCookCalories-input[data-size=${size}]`).each(
            function () {
                totalAfterCookCalories += parseFloat($(this).val());
            }
        );

        $(`.ingredient--afterCookProteins-input[data-size=${size}]`).each(
            function () {
                totalAfterCookProteins += parseFloat($(this).val());
            }
        );

        $(`.ingredient--afterCookCarbs-input[data-size=${size}]`).each(
            function () {
                totalAfterCookCarbs += parseFloat($(this).val());
            }
        );

        $(`.ingredient--afterCookFats-input[data-size=${size}]`).each(
            function () {
                totalAfterCookFats += parseFloat($(this).val());
            }
        );

        // ----------------------------------------------

        // 1.3: display totalMacros
        $(`.ingredient--afterCookGrams-total-input[data-size=${size}]`).val(
            totalAfterCookGrams.toFixed(1)
        );
        $(`.ingredient--afterCookCalories-total-input[data-size=${size}]`).val(
            totalAfterCookCalories.toFixed(1)
        );
        $(`.ingredient--afterCookProteins-total-input[data-size=${size}]`).val(
            totalAfterCookProteins.toFixed(1)
        );
        $(`.ingredient--afterCookCarbs-total-input[data-size=${size}]`).val(
            totalAfterCookCarbs.toFixed(1)
        );
        $(`.ingredient--afterCookFats-total-input[data-size=${size}]`).val(
            totalAfterCookFats.toFixed(1)
        );
    }, 3500);
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
            gramsArray = afterCookGramsArray = [];

            totalRawGrams =
                totalRawCalories =
                totalRawProteins =
                totalRawCarbs =
                totalRawFats =
                totalAfterCookGrams =
                totalAfterCookCalories =
                totalAfterCookProteins =
                totalAfterCookCarbs =
                totalAfterCookFats =
                    0;

            $(`.ingredient--grams-input[data-size=${size}]`).each(function () {
                totalRawGrams += parseFloat($(this).val());
                gramsArray.push(parseFloat($(this).val()));
            });

            $(`.ingredient--percentage-input[data-size=${size}]`).each(
                function () {
                    $(this).val(
                        ((gramsArray.shift() / totalRawGrams) * 100).toFixed(1)
                    );
                }
            );

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
            $(`.ingredient--grams-total-input[data-size=${size}]`).val(
                totalRawGrams.toFixed(1)
            );
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
            // -------------------------------------------------
            // -------------------------------------------------
            // -------------------------------------------------
            // ------------------ AfterCook ---------------------

            $(`.ingredient--afterCookGrams-input[data-size=${size}]`).each(
                function () {
                    totalAfterCookGrams += parseFloat($(this).val() ?? 0);
                    afterCookGramsArray.push(parseFloat($(this).val() ?? 0));
                }
            );

            $(`.ingredient--afterCookCalories-input[data-size=${size}]`).each(
                function () {
                    totalAfterCookCalories += parseFloat($(this).val());
                }
            );

            $(`.ingredient--afterCookProteins-input[data-size=${size}]`).each(
                function () {
                    totalAfterCookProteins += parseFloat($(this).val());
                }
            );

            $(`.ingredient--afterCookCarbs-input[data-size=${size}]`).each(
                function () {
                    totalAfterCookCarbs += parseFloat($(this).val());
                }
            );

            $(`.ingredient--afterCookFats-input[data-size=${size}]`).each(
                function () {
                    totalAfterCookFats += parseFloat($(this).val());
                }
            );

            // ----------------------------------------------

            // 1.3: display totalMacros
            $(`.ingredient--afterCookGrams-total-input[data-size=${size}]`).val(
                totalAfterCookGrams.toFixed(1)
            );
            $(
                `.ingredient--afterCookCalories-total-input[data-size=${size}]`
            ).val(totalAfterCookCalories.toFixed(1));
            $(
                `.ingredient--afterCookProteins-total-input[data-size=${size}]`
            ).val(totalAfterCookProteins.toFixed(1));
            $(`.ingredient--afterCookCarbs-total-input[data-size=${size}]`).val(
                totalAfterCookCarbs.toFixed(1)
            );
            $(`.ingredient--afterCookFats-total-input[data-size=${size}]`).val(
                totalAfterCookFats.toFixed(1)
            );

            previousSize = size;
        }
    });
});

// -------------------------------------------------------------
// -------------------------------------------------------------
