@extends('layouts.appTeacher')

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

        <div class="max-w-sm w-full bg-white rounded-lg shadow p-4 md:p-6 mt-5">
            <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 ">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-lg bg-gray-100  flex items-center justify-center me-3">
                        <svg class="w-6 h-6 text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                            <path
                                d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                            <path
                                d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                        </svg>
                    </div>
                    <div>
                        <h5 class="leading-none text-lg font-semibold text-gray-900 pb-1">Data Siswa Menyelesaikan Tugas</h5>
                        <p class="text-sm font-normal text-gray-500 ">Bulan ini</p>
                    </div>
                </div>
            </div>

            <div id="column-chart"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t  justify-between">
                <div class="flex justify-between items-center pt-5">
                    <!-- Button -->
                    <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                        data-dropdown-placement="bottom"
                        class="text-sm font-medium text-gray-500 hover:text-gray-900 text-center inline-flex items-center "
                        type="button">
                        Last 7 days
                        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="lastDaysdropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100">Yesterday</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100">Today</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100">Last
                                    7 days</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100">Last
                                    30 days</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100">Last
                                    90 days</a>
                            </li>
                        </ul>
                    </div>

                </div>
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
            const options = {
                colors: ["#1A56DB", "#00BFFF"],
                series: [{
                        name: "Mengumpulan",
                        color: "#1A56DB",
                        data: [{
                                x: "Minggu 1",
                                y: 231
                            },
                            {
                                x: "Minggu 2",
                                y: 122
                            },
                            {
                                x: "Minggu 3",
                                y: 63
                            },
                            {
                                x: "Minggu 4",
                                y: 421
                            },

                        ],
                    },
                    {
                        name: "Belum Mengumpulkan",
                        color: "#00BFFF",
                        data: [{
                                x: "Minggu 1",
                                y: 232
                            },
                            {
                                x: "Minggu 2",
                                y: 113
                            },
                            {
                                x: "Minggu 3",
                                y: 341
                            },
                            {
                                x: "Minggu 4",
                                y: 224
                            },
                        ],
                    },
                ],
                chart: {
                    type: "bar",
                    height: "320px",
                    fontFamily: "Inter, sans-serif",
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "40%",
                        borderRadiusApplication: "end",
                        borderRadius: 8,
                    },
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                },
                states: {
                    hover: {
                        filter: {
                            type: "darken",
                            value: 1,
                        },
                    },
                },
                stroke: {
                    show: true,
                    width: 0,
                    colors: ["transparent"],
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -14
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    show: false,
                },
                xaxis: {
                    floating: false,
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                },
                fill: {
                    opacity: 1,
                },
            }

            if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("column-chart"), options);
                chart.render();
            }
        </script>
    @endsection
