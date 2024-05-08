// :: getTodayDate
const date = new Date();

let day = date.getDate();
let month = date.getMonth() + 1;
let year = date.getFullYear();

let currentDate = `${day} / ${month} / ${year}`;

// ----------------
const getNow = () => {
    const now = new Date();

    return {
        date: now,
        hours: now.getHours() + now.getMinutes() / 60,
        minutes: (now.getMinutes() * 12) / 60 + (now.getSeconds() * 12) / 3600,
        seconds: (now.getSeconds() * 12) / 60,
    };
};

let now = getNow();

// Create the chart
Highcharts.chart(
    "container-clock",
    {
        chart: {
            type: "gauge",
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height: "350px",
        },

        credits: {
            enabled: false,
        },

        title: {
            text: null,
        },

        pane: {
            background: [
                {
                    // default background
                },
                {
                    // reflex for supported browsers
                    backgroundColor: "#000"
                        ? {
                              radialGradient: {
                                  cx: 0.5,
                                  cy: -0.4,
                                  r: 1.9,
                              },
                              stops: [
                                  [0.5, "#efefef"],
                                  [0.5, "#efefef"],
                              ],
                          }
                        : null,
                },
            ],
        },

        yAxis: {
            labels: {
                distance: -23,
                style: {
                    fontSize: "13px",
                },
            },
            min: 0,
            max: 12,
            lineWidth: 0,
            showFirstLabel: false,

            minorTickInterval: "auto",
            minorTickWidth: 2,
            minorTickLength: 9,
            minorTickPosition: "inside",
            minorGridLineWidth: 0,
            minorTickColor: "#1d1e24",

            tickInterval: 1,
            tickWidth: 2,
            tickPosition: "outside",
            tickLength: 10,
            tickColor: "#1d1e24",
            title: {
                text: `<strong class='fs-10 fw-semibold' style='line-height: 3em !important;'>POWERED BY</strong> <strong class='fw-bold fs-15 clock--caption' style='fill: #000 !important'>DOer</strong><br/><br/><strong class='fs-12 fw-semibold'>${currentDate}</strong>`,
                style: {
                    color: "#1d1e24",
                    fontWeight: "semibold",
                    fontSize: "10px",
                    lineHeight: "15px",
                },
                y: 10,
            },
        },

        series: [
            {
                data: [
                    {
                        id: "hour",
                        y: now.hours,
                        dial: {
                            radius: "50%",
                            baseWidth: 5,
                            baseLength: "80%",
                            rearLength: 0,
                        },
                    },
                    {
                        id: "minute",
                        y: now.minutes,
                        dial: {
                            baseLength: "90%",
                            rearLength: 0,
                        },
                    },
                    {
                        id: "second",
                        y: now.seconds,
                        dial: {
                            radius: "100%",
                            baseWidth: 1,
                            rearLength: "20%",
                        },
                    },
                ],
                animation: true,
                dataLabels: {
                    enabled: false,
                },
            },
        ],
    },

    // Move
    function (chart) {
        setInterval(function () {
            now = getNow();

            if (chart.axes) {
                // not destroyed
                const hour = chart.get("hour"),
                    minute = chart.get("minute"),
                    second = chart.get("second");

                // Cache the tooltip text
                chart.tooltipText = Highcharts.dateFormat("%H:%M:%S", now.date);

                hour.update(now.hours, true, false);
                minute.update(now.minutes, true, false);

                // Move to 59 sec without animation ...
                if (now.seconds === 0) {
                    second.update(-0.2, true, false);
                }
                // ... then bounce to next second
                second.update(now.seconds, true, {
                    easing: "easeOutBounce",
                });
            }
        }, 1000);
    }
);

// easingEffect
Math.easeOutBounce = function (pos) {
    if (pos < 1 / 2.75) {
        return 7.5625 * pos * pos;
    }
    if (pos < 2 / 2.75) {
        return 7.5625 * (pos -= 1.5 / 2.75) * pos + 0.75;
    }
    if (pos < 2.5 / 2.75) {
        return 7.5625 * (pos -= 2.25 / 2.75) * pos + 0.9375;
    }
    return 7.5625 * (pos -= 2.625 / 2.75) * pos + 0.984375;
};
