@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-full bg-gradient-to-r from-gray-200 to-blue-300 p-0 rounded-lg shadow-lg">

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
                    background="transparent" speed="1" style="width: 300px; height: 150px; margin-left:" loop
                    autoplay>
                </dotlottie-player>
            </div>
        </div>
        <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md mt-5">
            <div
                class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">

                <div>
                    <h6
                        class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                        Jumlah Siswa yang Mengumpulkan Tugas
                    </h6>

                </div>
            </div>
            <div class="pt-6 px-2 pb-0">
                <div id="bar-chart"></div>
            </div>
        </div>

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
