// 1: print
$(".print--btn").click(function () {
    // 1.2: getPrintSection
    section = $(this).attr("data-print");

    html2canvas(document.querySelector(section), {
        backgroundColor: "#23262b",
    }).then((canvas) => {
        // :: createLink
        invoiceLink = document.createElement("a");
        invoiceLink.classList.add("p-0");
        invoiceLink.classList.add("m-0");
        invoiceLink.src = canvas.toDataURL("image/png");

        printJS(canvas.toDataURL("image/png"), "image");
    });
});

// --------------------------------------------
// --------------------------------------------

// 2: print paper
$(".print--labels").click(function () {
    // 1.2: getPrintSection
    section = $(this).attr("data-print");
    openWindow(section);
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

// -----------------------------------------------
// -----------------------------------------------

var popup;

function openWindow(section) {
    if (popup && !popup.closed) {
        popup.focus();
    } else {
        // 1: header - contetn
        var head = $("head").html();
        var content = document.getElementById(section).outerHTML;
        popup = window.open("", "", "width=800,height=700");
        var paper = popup.document;
        paper.open();

        paper.write(head);
        paper.write(content);
        paper.close();

        setTimeout(function () {
            popup.print();
            popup.close();
        }, 3000);
    } // end if
} // end function
