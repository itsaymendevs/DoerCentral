// 1: activateCertainTab
document.addEventListener(
    "DOMContentLoaded",
    function () {
        $(document).ready(function () {
            // 1: getURL
            currentURL = window.location.href;

            if (currentURL.indexOf("#tab-1") >= 0) {
                $(`.tabs--wrap a[href='#tab-1']`).tab("show");
            } // end if

            if (currentURL.indexOf("#tab-2") >= 0) {
                $(`.tabs--wrap a[href='#tab-2']`).tab("show");
            } // end if

            if (currentURL.indexOf("#tab-3") >= 0) {
                $(`.tabs--wrap a[href='#tab-3']`).tab("show");
            } // end if

            if (currentURL.indexOf("#tab-4") >= 0) {
                $(`.tabs--wrap a[href='#tab-4']`).tab("show");
            } // end if

            if (currentURL.indexOf("#tab-5") >= 0) {
                $(`.tabs--wrap a[href='#tab-5']`).tab("show");
            } // end if

            if (currentURL.indexOf("#tab-6") >= 0) {
                $(`.tabs--wrap a[href='#tab-6']`).tab("show");
            } // end if

            if (currentURL.indexOf("#tab-7") >= 0) {
                $(`.tabs--wrap a[href='#tab-7']`).tab("show");
            } // end if

            if (currentURL.indexOf("#tab-8") >= 0) {
                $(`.tabs--wrap a[href='#tab-8']`).tab("show");
            } // end if
        });
    },
    false
);

// ---------------------------------------------------------------

document.addEventListener(
    "livewire:navigated",
    function () {
        $(document).ready(function () {
            // 1: getURL
            currentURL = window.location.href;

            if (currentURL.indexOf("#tab-1") >= 0) {
                $(`.tabs--wrap a[href='#tab-1']`).tab("show");
            } // end if

            if (currentURL.indexOf("#tab-2") >= 0) {
                $(`.tabs--wrap a[href='#tab-2']`).tab("show");
            } // end if

            if (currentURL.indexOf("#tab-3") >= 0) {
                $(`.tabs--wrap a[href='#tab-3']`).tab("show");
            } // end if

            if (currentURL.indexOf("#tab-4") >= 0) {
                $(`.tabs--wrap a[href='#tab-4']`).tab("show");
            } // end if

            if (currentURL.indexOf("#tab-5") >= 0) {
                $(`.tabs--wrap a[href='#tab-5']`).tab("show");
            } // end if

            if (currentURL.indexOf("#tab-6") >= 0) {
                $(`.tabs--wrap a[href='#tab-6']`).tab("show");
            } // end if

            if (currentURL.indexOf("#tab-7") >= 0) {
                $(`.tabs--wrap a[href='#tab-7']`).tab("show");
            } // end if

            if (currentURL.indexOf("#tab-8") >= 0) {
                $(`.tabs--wrap a[href='#tab-8']`).tab("show");
            } // end if
        });
    },
    false
);
