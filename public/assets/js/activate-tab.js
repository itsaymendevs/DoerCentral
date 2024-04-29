// 1: activateCertainTab
document.addEventListener(
    "DOMContentLoaded",
    function () {
        $(document).ready(function () {
            // 1: getURL
            currentURL = window.location.href;

            console.log("heyy");
            for (let i = 1; i < 400; i++) {
                if (currentURL.indexOf(`#tab-${i}`) >= 0) {
                    $(`.tabs--wrap a[href='#tab-${i}']`).tab("show");
                } // end if
            } // end loop
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
            console.log("ehllo");

            for (let i = 1; i < 400; i++) {
                if (currentURL.indexOf(`#tab-${i}`) >= 0) {
                    $(`.tabs--wrap a[href='#tab-${i}']`).tab("show");
                } // end if
            } // end loop
        });
    },
    false
);
