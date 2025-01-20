<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo31/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 14:27:54 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <link rel="icon" type="image/png" href="{{ asset('image/logo.png') }}">
    <title>Smart-LAB</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta name="csrf-token" content="8IMVNabevkMVEFpvO472s41XBcvpCVja5sJxIXQO">

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="https://class.hummatech.com/user-assets/plugins/global/plugins.bundle.css" rel="stylesheet"
        type="text/css" />
    <link href="https://class.hummatech.com/user-assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <link href="https://class.hummatech.com/user-assets/plugins/custom/datatables/datatables.bundle.css"
        rel="stylesheet" type="text/css" />

    {{-- flowbite --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <style>
        @media (max-width: 639px) {
            .covercard {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        .carousel-indicators {
            align-items: center;
        }

        .carousel-indicators button {
            width: 10px !important;
            height: 10px !important;
            border-radius: 100%;
            background-color: rgba(255, 255, 255, 0.507) !important;
        }

        .carousel-indicators button.active {
            width: 15px !important;
            height: 15px !important;
            border-radius: 100%;
            background-color: white !important;
        }

        .carousel-item img {
            height: 300px;
            object-fit: cover;
            border-radius: 1rem !important;
        }

        .carousel-item .follow-event-btn {
            z-index: 100;
        }

        .carousel-item:after {
            position: absolute;
            content: "";
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            background: linear-gradient(to bottom, rgba(255, 0, 0, 0), rgba(0, 0, 0, 0.65) 100%);
        }
    </style>

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-sidebar-stacked="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->


    <x-navbarsiswa></x-navbarsiswa>
    <!--begin::App-->
    <div class="container p-10 h-screen">
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                <div class="flex items-center justify-center min-h-screen">
                    <div class="grid grid-cols-3 gap-10 w-full p-10"
                        style="grid-template-columns: 2fr 1fr; height: full;">
                        <!-- Kolom kiri -->
                        <div class="grid grid-rows-2 gap-10 h-full">
                            <div class="flex justify-between items-center">
                                <h1 class="text-5xl font-poppins font-bold text-blue-800">Dashboard</h1>
                                <p class="text-xl font-poppins" id="current-date"></p>
                            </div>

                            <div class="bg-white shadow-md flex h-full"
                                style="border-radius: 15px; position: relative;">
                                <img src="image/dahboardsiswa.svg" alt="dashboard1"
                                    style="background-size: cover; width: 100%; height: 100%;">
                                <div class="absolute w-full h-full flex items-center justify-left">
                                    <div class="">
                                        <h1 class="text-3xl pl-10 font-bold font-poppins w-600px">Selamat Datang,
                                            {{ Auth::User()->name }}!</h1>
                                        @if ($class->isNotEmpty())
                                            @if ($class->isNotEmpty())
                                                <div class="pt-1 pl-10 flex items-center gap-2">
                                                    <p class="text-lg font-poppins">Selamat Datang Di Kelas:</p>
                                                    <div class="flex flex-wrap gap-2 pl-4">
                                                        @foreach ($class as $kelas)
                                                            <p class="text-lg font-poppins">{{ $kelas->name_class }}</p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <p class="text-lg pt-1 pl-10 font-poppins">Belum Dapat Kelas</p>
                                            @endif
                                        @else
                                            <p class="text-lg pt-1 pl-10 font-poppins">Belum Dapat Kelas</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Baris kedua -->
                            <div class="grid grid-cols-2 gap-10 h-full">
                                <!-- Card kecil bawah kiri -->
                                <div class="card text-white border-0 shadow-md"
                                    style="background: url('image/bg.tugas1.svg') center/cover; border-radius: 16px;">
                                    <div class="card-body py-4">
                                        <!-- Judul dan Icon -->
                                        <div class="absolute flex items-center top-5 text-white" style="left: 10px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                                viewBox="0 0 20 20">
                                                <path fill="currentColor"
                                                    d="M5.75 3A2.75 2.75 0 0 0 3 5.75v8.5A2.75 2.75 0 0 0 5.75 17H9.6a5.5 5.5 0 0 1-.6-2.5c0-1.33.472-2.55 1.257-3.5H9.5a.5.5 0 0 1 0-1h1.837c.895-.63 1.986-1 3.163-1c.9 0 1.75.216 2.5.6V5.75A2.75 2.75 0 0 0 14.25 3zM7.5 7.25a.75.75 0 1 1-1.5 0a.75.75 0 0 1 1.5 0M6.75 9.5a.75.75 0 1 1 0 1.5a.75.75 0 0 1 0-1.5m.75 3.75a.75.75 0 1 1-1.5 0a.75.75 0 0 1 1.5 0M9.5 8a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1zm5 11a4.5 4.5 0 1 0 0-9a4.5 4.5 0 0 0 0 9m-.5-6.5a.5.5 0 0 1 1 0V14h1a.5.5 0 0 1 0 1h-1.5a.5.5 0 0 1-.5-.5z" />
                                            </svg>
                                            <span class="font-poppins font-bold"
                                                style="font-size: 24px; margin-left: 10px;">
                                                Tugas yang Belum Dikerjakan
                                            </span>
                                        </div>
                                        <!-- Jumlah Tugas -->
                                        <div class="d-flex align-items-center justify-content-center"
                                            style="margin-top: 120px;">
                                            <span class="font-poppins font-bold"
                                                style="font-size: 90px; margin-right: 8px;">
                                                {{ $countNotCollected }}
                                            </span>
                                            <span class="font-poppins font-medium"
                                                style="font-size: 24px; margin-top: 40px">
                                                Tugas
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card kecil bawah kanan -->
                                <div class="card text-white border-0 shadow-md"
                                    style="background: url('image/bg.tugas1.svg') center/cover; border-radius: 16px;">
                                    <div class="card-body py-4">
                                        <!-- Judul dan Icon -->
                                        <div class="absolute flex items-center top-5 text-white" style="left: 10px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                                viewBox="0 0 20 20">
                                                <path fill="currentColor"
                                                    d="M4 4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9.883l-2.495 2.52l-.934-.953a1.5 1.5 0 1 0-2.142 2.1l.441.45H6a2 2 0 0 1-2-2zm5 5.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9.5 5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zM9 13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5m-2-3a1 1 0 1 0 0-2a1 1 0 0 0 0 2m1-5a1 1 0 1 0-2 0a1 1 0 0 0 2 0m-1 9a1 1 0 1 0 0-2a1 1 0 0 0 0 2m10.855.352a.5.5 0 0 0-.71-.704l-3.643 3.68l-1.645-1.678a.5.5 0 1 0-.714.7l1.929 1.968a.6.6 0 0 0 .855.002z" />
                                            </svg>
                                            <span class="font-poppins font-bold"
                                                style="font-size: 24px; margin-left: 10px;">
                                                Tugas yang Sudah Dikerjakan
                                            </span>
                                        </div>
                                        <!-- Jumlah Tugas -->
                                        <div class="d-flex align-items-center justify-content-center"
                                            style="margin-top: 120px;">
                                            <span class="font-poppins font-bold"
                                                style="font-size: 90px; margin-right: 8px;">
                                                {{ $countCollected }}
                                            </span>
                                            <span class="font-poppins font-medium"
                                                style="font-size: 24px; margin-top: 40px">
                                                Tugas
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shadow-md flex items-center justify-center h-full p-6"
                            style="
                            border-radius: 15px;
                            background-image: url('image/wallpaper_blue.jpeg');
                            background-size: cover;
                            background-position: center;">
                            <div class="w-80">
                                <!-- Avatar -->
                                <div class="flex flex-col items-center mb-4">
                                    <svg class="w-50 h-50 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span
                                        class="text-center text-3xl font-semibold mt-2 text-white">{{ Auth::user()->name }}</span>
                                    <p
                                        class="bg-blue-200 text-blue-800 font-bold font-poppins p-1 px-5 rounded-xl mt-5">
                                        Murid</p>
                                </div>

                                <!-- Detail Profile -->
                                <div class="mt-10 space-y-3 text-white">
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M7.402 4.5C7 5.196 7 6.13 7 8v3.027C7.43 11 7.914 11 8.435 11h7.13c.52 0 1.005 0 1.435.027V8c0-1.87 0-2.804-.402-3.5A3 3 0 0 0 15.5 3.402C14.804 3 13.87 3 12 3s-2.804 0-3.5.402A3 3 0 0 0 7.402 4.5M6.25 15.991c-.502-.02-.806-.088-1.014-.315c-.297-.324-.258-.774-.18-1.675c.055-.65.181-1.088.467-1.415C6.035 12 6.858 12 8.505 12h6.99c1.647 0 2.47 0 2.982.586c.286.326.412.764.468 1.415c.077.9.116 1.351-.181 1.675c-.208.227-.512.295-1.014.315V21a.75.75 0 1 1-1.5 0v-5h-8.5v5a.75.75 0 1 1-1.5 0z" />
                                        </svg>
                                        <span class="ml-1"><strong>Kelas:</strong>
                                            @forelse ($class as $kelas)
                                                {{ $kelas->name_class }}
                                            @empty
                                                Belum Dapat Kelas
                                            @endforelse
                                        </span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 4l-8 5l-8-5V6l8 5l8-5z" />
                                        </svg>
                                        <span class="ml-2"><strong>Email:</strong> {{ Auth::user()->email }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M7.75 2.5a.75.75 0 0 0-1.5 0v1.58c-1.44.115-2.384.397-3.078 1.092c-.695.694-.977 1.639-1.093 3.078h19.842c-.116-1.44-.398-2.384-1.093-3.078c-.694-.695-1.639-.977-3.078-1.093V2.5a.75.75 0 0 0-1.5 0v1.513C15.585 4 14.839 4 14 4h-4c-.839 0-1.585 0-2.25.013z" />
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M2 12c0-.839 0-1.585.013-2.25h19.974C22 10.415 22 11.161 22 12v2c0 3.771 0 5.657-1.172 6.828S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172S2 17.771 2 14zm15 2a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2m-4-5a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-6-3a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-2"><strong>Masa Berakhir Akun:</strong>
                                            {{ \Carbon\Carbon::parse(Auth::user()->graduation_date)->translatedFormat('j F Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Wrapper-->
        </div>

        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
            <span class="svg-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                        transform="rotate(90 13 6)" fill="currentColor" />
                    <path
                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Scrolltop-->

        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="https://class.hummatech.com/user-assets/js/scripts.bundle.js"></script>

        <script>
            var options = {
                series: [44, 55, 41, 17, 15],
                chart: {
                    type: 'donut',
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#kt_attendance"), options);
            chart.render();
        </script>
        <!--end::Javascript-->
        <script>
            $('.notification-link').click(function(e) {
                $.ajax({
                    url: '/delete-notification/' + e.target.id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // success: function(response) {
                    //     // Redirect ke halaman tujuan setelah penghapusan berhasil
                    //     window.location.href = $(this).attr('href');
                    // },
                    error: function(xhr) {
                        // Tangani kesalahan jika terjadi
                        console.error(xhr.responseText);
                    }
                });
            })
        </script>
        <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
            integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
            data-cf-beacon='{"rayId":"8f0bc3aff833fd88","version":"2024.10.5","r":1,"token":"a20ac1c0d36b4fa6865d9d244f4efe5a","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}}}'
            crossorigin="anonymous"></script>

        <script>
            function updateDate() {
                const dateElement = document.getElementById("current-date");
                const today = new Date();

                // Array nama hari dalam bahasa Indonesia
                const daysOfWeek = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

                // Menentukan hari, bulan, dan tahun
                const dayName = daysOfWeek[today.getDay()];
                const options = {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                };

                // Format: Hari, Tanggal Bulan Tahun
                dateElement.textContent = `${dayName}, ${today.toLocaleDateString('id-ID', options)}`;
            }

            // Memanggil fungsi updateDate sekali untuk memastikan tanggal ditampilkan saat pertama kali dimuat
            updateDate();
        </script>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo31/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 14:30:13 GMT -->

</html>
