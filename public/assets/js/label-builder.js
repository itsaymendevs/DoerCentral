// 1: previewFile
$(document).ready(() => {
    $(".file--input-for-labels").change(function () {
        id = $(this).attr("id");
        previewFrame = $(this).attr("data-preview");
        previewFrameOnLabel = $(this).attr("data-preview-label");
        const file = this.files[0];

        // 1.2: preview
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $(`#${previewFrame}`).attr("src", event.target.result);
                $(`#${previewFrameOnLabel}`).attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});
