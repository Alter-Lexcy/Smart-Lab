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
                    <div class="h-40 p-5 bg-white shadow-sm rounded-lg flex items-center">
                        <!-- SVG Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor" class="size-28 ml-2 mr-8">
                            <path
                                d="M208 352c-2.39 0-4.78.35-7.06 1.09C187.98 357.3 174.35 360 160 360c-14.35 0-27.98-2.7-40.95-6.91-2.28-.74-4.66-1.09-7.05-1.09C49.94 352-.33 402.48 0 464.62.14 490.88 21.73 512 48 512h224c26.27 0 47.86-21.12 48-47.38.33-62.14-49.94-112.62-112-112.62zm-48-32c53.02 0 96-42.98 96-96s-42.98-96-96-96-96 42.98-96 96 42.98 96 96 96zM592 0H208c-26.47 0-48 22.25-48 49.59V96c23.42 0 45.1 6.78 64 17.8V64h352v288h-64v-64H384v64h-76.24c19.1 16.69 33.12 38.73 39.69 64H592c26.47 0 48-22.25 48-49.59V49.59C640 22.25 618.47 0 592 0z" />
                        </svg>
                        <!-- Text Content -->
                        <div class="space-y-4">
                            <div class="text-3xl text-gray-800 font-semibold">Jumlah Guru</div>
                            <div class="text-4xl font-bold text-sky-600 ">100</div>
                        </div>
                    </div>
                    <div class="h-40 p-5 bg-white shadow-sm rounded-lg flex items-center">
                        <!-- SVG Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-32  mr-4" viewBox="0 0 72 72">
                            <path fill="#3f3f3f"
                                d="M54.862 58.804s2-14-10-14c-3.192 2.128-5.926 3.598-9 3.592h.125c-3.074.006-5.808-1.464-9-3.592c-12 0-10 14-10 14" />
                            <path fill="black" d="m45.131 12.155l-9.31.91l-9.07-.88l-5.44-.53l13.88-2.53l15.13 2.53z" />
                            <path fill="#3f3f3f"
                                d="M45.131 12.155v7.97s-6.72-.26-9.19 2.64c-2.47-2.9-9.19-2.64-9.19-2.64v-7.94l9.07.88z" />
                            <path fill="black"
                                d="M35.969 51.38h-.108c-3.198-.031-5.986-1.464-9.428-3.76a1 1 0 1 1 1.109-1.664c3.153 2.103 5.66 3.41 8.383 3.425c2.722-.014 5.228-1.322 8.383-3.425a1 1 0 1 1 1.109 1.664c-3.443 2.296-6.231 3.729-9.428 3.76z" />
                            <path fill="black"
                                d="M26.578 20.098a15.8 15.8 0 0 0-1.588 4l-.028.069s3.98.784 7.961-3.079l.036-.102c-2.869-.996-6.333-.86-6.333-.86m18.386-.001s-3.408-.201-6.325.905l.028.058c3.98 3.863 7.96 3.079 7.96 3.079l-.01.002a15.8 15.8 0 0 0-1.605-4.071" />
                            <path fill="black"
                                d="M46.541 24.187c-.704.094-4.26.362-7.826-3.099l-.028-.058l.022-.008c-1.09.39-2.09.947-2.768 1.743c-2.069-2.43-7.104-2.64-8.687-2.645c1.127.011 3.578.127 5.705.866l-.036.102c-3.565 3.46-7.122 3.193-7.826 3.099a17.3 17.3 0 0 0-.616 4.593c0 7.827 5.076 14.173 11.338 14.173s11.339-6.346 11.339-14.173c0-1.61-.22-3.153-.617-4.593" />
                            <path
                                d="M41.942 26.951a2 2 0 1 1-4.002-.001a2 2 0 0 1 4.002.001m-8 0a2 2 0 1 1-4.002-.001a2 2 0 0 1 4.002.001m1.999 10.003c-1.151 0-2.303-.286-3.447-.858a1 1 0 1 1 .895-1.79c1.717.86 3.387.86 5.105 0a1 1 0 0 1 .895 1.79q-1.718.858-3.448.858" />
                            <path
                                d="M46.13 19.77c-.57-1.03-1.24-1.97-2-2.79v2.15c-.22 0-.48.01-.76.03c.46.6.87 1.26 1.23 1.96c1.06 2.07 1.68 4.54 1.68 7.19c0 7.27-4.64 13.18-10.34 13.18S25.6 35.58 25.6 28.31c0-2.66.62-5.13 1.69-7.2c.36-.7.77-1.35 1.22-1.95c-.28-.02-.54-.03-.76-.03v-2.15c-.75.82-1.43 1.76-2 2.79c-1.36 2.43-2.15 5.37-2.15 8.54c0 8.37 5.54 15.18 12.34 15.18c6.81 0 12.34-6.81 12.34-15.18c0-3.17-.79-6.11-2.15-8.54" />
                            <path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="2"
                                d="m21.311 11.655l5.44.53l9.07.88l9.31-.91l5.19-.5" />
                            <path
                                d="M36.74 23.37c-.02.01-.03.03-.04.04c-.13.16-.29.26-.47.31q-.06.03-.12.03c-.06.02-.11.02-.17.02s-.12 0-.17-.02q-.06 0-.12-.03a.9.9 0 0 1-.36-.19a.8.8 0 0 1-.15-.16c-1.65-1.86-5.85-2.25-7.85-2.26c-.19 0-.36.01-.5.01a.98.98 0 0 1-.73-.27a1 1 0 0 1-.31-.72v-8.47c0-.56.45-1 1-1s1 .44 1 1v7.47c.22 0 .48.01.76.03c2.04.12 5.36.57 7.43 2.24c.28.21.53.45.76.72c.31.36.32.88.04 1.25" />
                            <path
                                d="M46.13 11.66v8.47c0 .27-.11.53-.3.72c-.2.18-.44.28-.74.28c-.14-.01-.31-.01-.49-.01c-2.01 0-6.22.38-7.86 2.25c-.02.01-.03.03-.04.04c-.13.16-.29.26-.47.31q-.06.03-.12.03c-.06.02-.11.02-.17.02s-.12 0-.17-.02q-.06 0-.12-.03a.9.9 0 0 1-.36-.19a.8.8 0 0 1-.15-.16a.994.994 0 0 1 .04-1.25c.23-.27.48-.51.76-.72c2.07-1.67 5.39-2.12 7.43-2.24c.28-.02.54-.03.76-.03v-7.47c0-.56.45-1 1-1s1 .44 1 1" />
                            <path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="2" d="m50.321 11.655l-15.13-2.53l-13.88 2.53" />
                            <path d="M21.313 21a1 1 0 0 1-1-1v-8.12a1 1 0 1 1 2 0V20a1 1 0 0 1-1 1" />
                            <path
                                d="M19.285 23.58a.999.999 0 0 1-.785-1.618l2.026-2.58a1 1 0 0 1 1.573 1.236l-2.027 2.58a1 1 0 0 1-.787.382" />
                            <path
                                d="M21.313 25.101a1 1 0 0 1-1-1v-4.1a1 1 0 1 1 2 0v4.1a1 1 0 0 1-1 1m24.581.131c-1.594 0-4.688-.45-7.753-3.426a1 1 0 1 1 1.392-1.436c3.522 3.419 6.936 2.842 7.078 2.815a1.004 1.004 0 0 1 1.165.796a.996.996 0 0 1-.785 1.167a6 6 0 0 1-1.097.084m-19.904 0a6 6 0 0 1-1.098-.084a1 1 0 0 1 .38-1.963c.162.03 3.567.594 7.078-2.815a1 1 0 0 1 1.392 1.436c-3.065 2.975-6.159 3.426-7.753 3.426m28.77 33.571q-.077 0-.153-.011a1 1 0 0 1-.837-1.139c.008-.057.827-5.74-2.13-9.177c-1.475-1.715-3.689-2.613-6.585-2.67c-3.31 2.186-6.029 3.547-9.126 3.59h-.217c-3.1-.043-5.816-1.404-9.126-3.59c-2.896.057-5.11.955-6.586 2.67c-2.956 3.436-2.138 9.12-2.129 9.177a1 1 0 0 1-1.976.303c-.042-.27-.973-6.633 2.58-10.775c1.923-2.241 4.752-3.377 8.408-3.377a1 1 0 0 1 .554.168c3.154 2.102 5.66 3.41 8.383 3.424c2.722-.013 5.229-1.322 8.383-3.424a1 1 0 0 1 .555-.168c3.656 0 6.484 1.135 8.407 3.377c3.554 4.142 2.622 10.506 2.581 10.775a1 1 0 0 1-.986.847" />
                        </svg>
                        <!-- Text Content -->
                        <div class="space-y-4">
                            <div class="text-3xl text-gray-800 font-semibold">Jumlah Siswa</div>
                            <div class="text-4xl font-bold text-sky-600 ">3600</div>
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
