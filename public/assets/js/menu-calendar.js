window.addEventListener("unCheckDefault", (event) => {
    // 1: getCard
    card = event.detail.card;

    // 1.2: uncheck it
    $(`${card} input[type='radio']`).prop("checked", false);
});

// -------------------------------------------------------------
