// 1: chart
const ctx = document.getElementById("chart--1");

// 1.2: data
const data = {
    labels: cities,
    datasets: [
        {
            label: `${todayDeliveriesCount} • TODAY DELIVERIES`,
            data: cityData,
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
            x: {
                type: "category",
                labels: cities,
                ticks: {
                    padding: 5,
                },
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
    labels: mealTypes,
    datasets: [
        {
            label: `${todayScheduleMealsCount} • ITEMS`,
            data: quantityPerType,
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
