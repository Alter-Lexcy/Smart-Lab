@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-full bg-gradient-to-r from-cyan-100 to-blue-300 p-0 rounded-lg shadow-lg">

            @if (session('status'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex items-center">
                <!-- Welcome text -->
                <p class="text-2xl font-medium font-poppins text-gray-700 ml-20 mr-auto">
                    {{ 'Selamat Datang, ' }}<span class="uppercase">{{ Auth::user()->name }}</span>!
                </p>
                <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

                <dotlottie-player src="https://lottie.host/5dbe9fbf-517a-4f0b-9c7e-b6bc391a69dd/MqjKbaeBca.json"
                    background="transparent" speed="1" style="width: 300px; height: 150px; margin-left:" loop autoplay>
                </dotlottie-player>
            </div>
        </div>
        <div class="flex items-center">
            <div class="container my-5">
                <div class="grid gap-10 grid-cols-2">
                    <div class="h-40 p-5 bg-white shadow-sm rounded-lg">
                        <div class="text-3xl text-gray-800 font-semibold mb-3">Jumlah Guru</div>
                        <div class="flex items-center pt-1">
                            <div class="text-4xl  font-bold text-sky-600  ml-2">100</div>
                        </div>
                    </div>
                    <div class="h-40 p-5 bg-white shadow-sm rounded-lg">
                        <div class="text-3xl text-gray-800 font-semibold mb-3">Jumlah Siswa</div>
                        <div class="flex items-center pt-1">
                            <div class="text-4xl  font-bold text-sky-600  ml-2">3600</div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md ">
            <div
                class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
                <div>
                    <h6
                        class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-gray-900 antialiased">
                        Jumlah Siswa yang Mengumpulkan Tugas
                    </h6>

                </div>
            </div>
            <div class="pt-6 px-2 pb-0">
                <div id="bar-chart"></div>
            </div>
        </div>
        <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6 mt-5">

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

        <script>
            const getChartOptions = () => {
                return {
                    series: [16, 20],
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
                                size: "65%",
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
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            const chartConfig = {
                series: [{
                    name: "Siswa",
                    data: [36, 30, 33, 35, 20, 34],
                }, ],
                chart: {
                    type: "bar",
                    height: 240,
                    toolbar: {
                        show: false,
                    },
                },
                title: {
                    show: "",
                },
                dataLabels: {
                    enabled: false,
                },
                colors: ["#6495ED"],
                plotOptions: {
                    bar: {
                        columnWidth: "40%",
                        borderRadius: 2,
                    },
                },
                xaxis: {
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    labels: {
                        style: {
                            colors: "#616161",
                            fontSize: "12px",
                            fontFamily: "inherit",
                            fontWeight: 400,
                        },
                    },
                    categories: [
                        "1",
                        "2",
                        "3",
                        "4",
                        "5",
                        "6",
                        "7",
                        "8",
                        "9",
                        "10",
                        "11",
                        "12",
                        "13",
                        "14",
                        "15",
                        "16",
                        "17",
                        "18",
                        "19",
                        "20",
                        "21",
                        "22",
                        "23",
                        "24",
                        "25",
                        "26",
                        "27",
                        "28",
                        "29",
                        "30",
                    ],
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: "#616161",
                            fontSize: "12px",
                            fontFamily: "inherit",
                            fontWeight: 400,
                        },
                    },
                },
                grid: {
                    show: true,
                    borderColor: "#dddddd",
                    strokeDashArray: 5,
                    xaxis: {
                        lines: {
                            show: true,
                        },
                    },
                    padding: {
                        top: 5,
                        right: 20,
                    },
                },
                fill: {
                    opacity: 0.8,
                },
                tooltip: {
                    theme: "dark",
                },
            };

            const chart = new ApexCharts(document.querySelector("#bar-chart"), chartConfig);

            chart.render();
        </script>
    @endsection
