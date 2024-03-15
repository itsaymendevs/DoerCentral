$(document).ready(function () {
    // 1: switchViews
    $(".range--button").click(function () {
        target = $(this).attr("data-target");
        type = $(this).attr("data-type");

        // :: getRange - rangeValue
        range = $(`div .range--input[data-input=${target}]`);

        rangeValue = parseInt(range.val() || 0);

        // 1: plus
        if (type == "plus") {
            range.val(rangeValue + 1).trigger("change");

            // 2: minus
        } else {
            rangeValue > 0
                ? range.val(rangeValue - 1).trigger("change")
                : range.val(0).trigger("change");
        } // end if
    });
}); // end documentReady
