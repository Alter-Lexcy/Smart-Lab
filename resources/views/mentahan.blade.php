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
                <h5 class="text-xl font-medium leading-none text-gray-900 dark:text-white pe-1">Absensi
                </h5>
            </div>
            <button class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 text-white font-semibold py-1 px-5 rounded mt-2 ">
                Absen
            </button>
        </div>

        <!-- Donut Chart -->
        <div class="py-6" id="donut-chart"></div>

        <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">

        </div>
    </div>

    <script>
        const getChartOptions = () => {
            return {
                series: [24,2,3,1],
                colors: ["#3399FF", "#16BDCA","#FFCC00","#FF0000"],
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
                            size: "65%",
                        },
                    },
                },
                grid: {
                    padding: {
                        top: -2,
                    },
                },
                labels: ["Masuk", "Izin","Sakit","Alpha"],
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
        }
    </script>
</body>

</html>
<a href="#"
class ="hover:ml-4 w-[90%] text-white hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
    <path
        d="M9.97.97a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1-1.06 1.06l-1.72-1.72v3.44h-1.5V3.31L8.03 5.03a.75.75 0 0 1-1.06-1.06l3-3ZM9.75 6.75v6a.75.75 0 0 0 1.5 0v-6h3a3 3 0 0 1 3 3v7.5a3 3 0 0 1-3 3h-7.5a3 3 0 0 1-3-3v-7.5a3 3 0 0 1 3-3h3Z" />
    <path
        d="M7.151 21.75a2.999 2.999 0 0 0 2.599 1.5h7.5a3 3 0 0 0 3-3v-7.5c0-1.11-.603-2.08-1.5-2.599v7.099a4.5 4.5 0 0 1-4.5 4.5H7.151Z" />
</svg>
<div>
    Pengumpulan
</div>
</a>
