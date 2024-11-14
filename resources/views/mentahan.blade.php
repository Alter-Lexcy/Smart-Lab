<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

        <div class="flex justify-between mb-3">
            <div class="flex justify-center items-center">
                <h5 class="text-xl font-medium leading-none text-gray-900 dark:text-white pe-1">Data Pengumpulan Tugas
                </h5>
            </div>
        </div>

        <!-- Donut Chart -->
        <div class="py-6" id="donut-chart"></div>

        <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">

        </div>
    </div>
    </div>
    <script>
        const getChartOptions = () => {
            return {
                series: [35.1, 23.5],
                colors: ["#1C64F2", "#16BDCA"],
                chart: {
                    height: 320,
                    width: "100%",
                    type: "donut",
                },
                stroke: {
                    colors: ["transparent"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: 20,
                                },

                                value: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: -20,
                                    formatter: function(value) {
                                        return value + ""
                                    },
                                },
                            },
                            size: "60%",
                        },
                    },
                },
                grid: {
                    padding: {
                        top: -2,
                    },
                },
                labels: ["Mengumpulkan", "Tidak Mengumpulkan"],
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + ""
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + ""
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
            chart.render();

            // Get all the checkboxes by their class name
            const checkboxes = document.querySelectorAll('#devices input[type="checkbox"]');

            // Function to handle the checkbox change event
            function handleCheckboxChange(event, chart) {
                const checkbox = event.target;
                if (checkbox.checked) {
                    switch (checkbox.value) {
                        case 'desktop':
                            chart.updateSeries([15.1, 22.5, 4.4, 8.4]);
                            break;
                        case 'tablet':
                            chart.updateSeries([25.1, 26.5, 1.4, 3.4]);
                            break;
                        case 'mobile':
                            chart.updateSeries([45.1, 27.5, 8.4, 2.4]);
                            break;
                        default:
                            chart.updateSeries([55.1, 28.5, 1.4, 5.4]);
                    }

                } else {
                    chart.updateSeries([35.1, 23.5, 2.4, 5.4]);
                }
            }

            // Attach the event listener to each checkbox
            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));
            });
        }
    </script>
</body>

</html>
