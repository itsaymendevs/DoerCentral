// 1: chart
const ctx = document.getElementById("chart--1");

// 1.2: data
const data = {
    datasets: [
        {
            label: "180 DELIVERIES",
            data: [
                {
                    x: 20,
                    y: 30,
                    r: 12,
                },
                {
                    x: 40,
                    y: 10,
                    r: 10,
                },
                {
                    x: 50,
                    y: 20,
                    r: 20,
                },
                {
                    x: 45,
                    y: 10,
                    r: 18,
                },
                {
                    x: 25,
                    y: 25,
                    r: 20,
                },
                {
                    x: 35,
                    y: 35,
                    r: 20,
                },
                {
                    x: 30,
                    y: 70,
                    r: 20,
                },
                {
                    x: 42,
                    y: 60,
                    r: 25,
                },
            ],
            backgroundColor: "rgb(255, 99, 132)",
        },
    ],
};

// 2.2: configuration
const config = {
    type: "bubble",
    data: data,
    options: {
        scales: {
            y: {
                // defining min and max so hiding the dataset does not change scale range
                min: 0,
                max: 90,
            },
        },
    },
};

// 1.3: initialization
new Chart(ctx, config);

// ------------------------------------------------
// ------------------------------------------------

// 2: chartTwo
const ctxTwo = document.getElementById("chart--2");

// 1.3: data
const dataTwo = {
    labels: [
        "Breakfast",
        "AM Snack",
        "Lunch",
        "Lunch Side",
        "PM Snack",
        "Dinner",
        "Dinner Side",
        "Snack",
        "Drink",
    ],
    datasets: [
        {
            label: "330 ITEMS",
            data: [47, 55, 40, 35, 50, 60, 20, 25, 10],
            fill: false,
            borderColor: "rgb(75, 192, 192)",
        },
    ],
};

// 2.2: configuration
let delayedTwo;
const configTwo = {
    type: "line",
    data: dataTwo,
    options: {
        animations: {
            tension: {
                duration: 1000,
                easing: "easeInOutCubic",
                from: 1,
                to: 0,
                loop: true,
            },
        },
        onComplete: () => {
            delayedTwo = true;
        },
        delay: (context) => {
            let delay = 0;
            if (
                context.type === "data" &&
                context.mode === "default" &&
                !delayedTwo
            ) {
                delayedTwo =
                    context.dataIndex * 300 + context.datasetIndex * 100;
            }
            return delayedTwo;
        },
        scales: {
            y: {
                // defining min and max so hiding the dataset does not change scale range
                min: 0,
                max: 90,
            },
        },
    },
};

// 1.4: initialization
new Chart(ctxTwo, configTwo);
