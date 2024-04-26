// 1: print
$(".print--btn").click(function () {
    // 1.2: getPrintSection
    section = $(this).attr("data-print");

    html2canvas(document.querySelector(section), {
        backgroundColor: "#23262b",
    }).then((canvas) => {
        // :: createLink
        invoiceLink = document.createElement("a");
        invoiceLink.src = canvas.toDataURL("image/png");

        printJS(canvas.toDataURL("image/png"), "image");
    });
});

// --------------------------------------------
// --------------------------------------------

// 2: download
$(".download--btn").click(function () {
    // 1.2: getDownloadSection
    section = $(this).attr("data-download");

    html2canvas(document.querySelector(section), {
        backgroundColor: "#23262b",
    }).then((canvas) => {
        // :: createLink
        invoiceLink = document.createElement("a");
        invoiceLink.id = "temporary--link";
        invoiceLink.href = canvas.toDataURL("image/png");
        invoiceLink.download = "invoice.png";
        invoiceLink.click();
    });
});
