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
    <meta property="og:description" content="Improve your skill with hummatech internship.">

    <link rel="icon" href="https://class.hummatech.com/app-assets/logo_file/Logo-Kelas-Industri.png"
        type="image/png" />
    <link rel="shortcut icon" href="https://class.hummatech.com/app-assets/logo_file/Logo-Kelas-Industri.png" />

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
    <div class="container p-10">
        <div class="d-flex flex-column flex-root">
            <div class="flex w-full position-relative" style="position: relative;">
                <img src="image/siswa/banner materi.svg" alt="banner mapel" style="width: 100%; height: auto;">
                <p class="absolute text-5xl font-poppins text-white font-bold"
                    style="position: absolute; top: 50%; left: 15%; transform: translate(-50%, -50%); text-align: center;">
                    <span>MATEMATIKA</span>
                </p>
            </div>
        </div>

        <h1 class="my-8 text-2xl text-gray-700 font-poppins font-bold">
            Daftar Mata Pelajaran
        </h1>

        <div class="grid grid-cols-1 gap-10">
            <div class="bg-blue-500" style="border-radius: 15px; padding-left: 30px; position: relative;">
                <div class="bg-white shadow-md py-10 px-5" style="border-top-right-radius: 15px; border-bottom-right-radius: 15px;">
                    <h2 class="text-xl font-bold mb-2">Dasar-Dasar Perkalian</h2>
                    <p class="text-gray-600" style="margin-right: 150px">
                        Belajar memahami konsep dasar perkalian, termasuk cara menghitung hasil kali angka-angka kecil
                        menggunakan metode sederhana dan ilustrasi menarik.
                    </p>
                    <div class="mt-4" style="position: absolute; bottom: 10px; right: 10px;">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl">Lihat
                            detail</button>
                    </div>
                    <!-- Tanggal di kanan atas -->
                    <div class="absolute top-5 right-5 text-gray-600 font-semibold text-sm">
                        16 Desember 2024
                    </div>
                </div>
            </div>

            <div class="bg-blue-500" style="border-radius: 15px; padding-left: 30px; position: relative;">
                <div class="bg-white shadow-md py-10 px-5" style="border-top-right-radius: 15px; border-bottom-right-radius: 15px;">
                    <h2 class="text-xl font-bold mb-2">Dasar-Dasar Perkalian</h2>
                    <p class="text-gray-600" style="margin-right: 150px">
                        Belajar memahami konsep dasar perkalian, termasuk cara menghitung hasil kali angka-angka kecil
                        menggunakan metode sederhana dan ilustrasi menarik.
                    </p>
                    <div class="mt-4" style="position: absolute; bottom: 10px; right: 10px;">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl">Lihat
                            detail</button>
                    </div>
                    <!-- Tanggal di kanan atas -->
                    <div class="absolute top-5 right-5 text-gray-600 font-semibold text-sm">
                        16 Desember 2024
                    </div>
                </div>
            </div>

            <div class="bg-blue-500" style="border-radius: 15px; padding-left: 30px; position: relative;">
                <div class="bg-white shadow-md py-10 px-5" style="border-top-right-radius: 15px; border-bottom-right-radius: 15px;">
                    <h2 class="text-xl font-bold mb-2">Dasar-Dasar Perkalian</h2>
                    <p class="text-gray-600" style="margin-right: 150px">
                        Belajar memahami konsep dasar perkalian, termasuk cara menghitung hasil kali angka-angka kecil
                        menggunakan metode sederhana dan ilustrasi menarik.
                    </p>
                    <div class="mt-4" style="position: absolute; bottom: 10px; right: 10px;">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl">Lihat
                            detail</button>
                    </div>
                    <!-- Tanggal di kanan atas -->
                    <div class="absolute top-5 right-5 text-gray-600 font-semibold text-sm">
                        16 Desember 2024
                    </div>
                </div>
            </div>

            <div class="bg-blue-500" style="border-radius: 15px; padding-left: 30px; position: relative;">
                <div class="bg-white shadow-md py-10 px-5" style="border-top-right-radius: 15px; border-bottom-right-radius: 15px;">
                    <h2 class="text-xl font-bold mb-2">Dasar-Dasar Perkalian</h2>
                    <p class="text-gray-600" style="margin-right: 150px">
                        Belajar memahami konsep dasar perkalian, termasuk cara menghitung hasil kali angka-angka kecil
                        menggunakan metode sederhana dan ilustrasi menarik.
                    </p>
                    <div class="mt-4" style="position: absolute; bottom: 10px; right: 10px;">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl">Lihat
                            detail</button>
                    </div>
                    <!-- Tanggal di kanan atas -->
                    <div class="absolute top-5 right-5 text-gray-600 font-semibold text-sm">
                        16 Desember 2024
                    </div>
                </div>
            </div>

            <div class="bg-blue-500" style="border-radius: 15px; padding-left: 30px; position: relative;">
                <div class="bg-white shadow-md py-10 px-5" style="border-top-right-radius: 15px; border-bottom-right-radius: 15px;">
                    <h2 class="text-xl font-bold mb-2">Dasar-Dasar Perkalian</h2>
                    <p class="text-gray-600" style="margin-right: 150px">
                        Belajar memahami konsep dasar perkalian, termasuk cara menghitung hasil kali angka-angka kecil
                        menggunakan metode sederhana dan ilustrasi menarik.
                    </p>
                    <div class="mt-4" style="position: absolute; bottom: 10px; right: 10px;">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl">Lihat
                            detail</button>
                    </div>
                    <!-- Tanggal di kanan atas -->
                    <div class="absolute top-5 right-5 text-gray-600 font-semibold text-sm">
                        16 Desember 2024
                    </div>
                </div>
            </div>
            <!-- Container Card -->
            {{-- <div class="grid grid-cols-1 gap-6">
            <!-- Card -->
            <div class="relative flex items-center justify-center bg-blue-500 shadow-xl" style="height: 150px; border-radius: 15px">
                <div class="absolute top-0 h-full bg-white shadow-md"
                style="width: 100rem; border-top-right-radius: 15px; border-bottom-right-radius: 15px; left: 40px;">
                    Card 1
                </div>
            </div>

            <div class="shadow-lg flex items-center justify-center text-xl font-semibold text-white"
                style="background: linear-gradient(to bottom right, #3572EF, #3ABEF9); padding: 70px; border-radius: 15px;">
                Card 2
            </div>
            <div class="shadow-lg flex items-center justify-center text-xl font-semibold text-white"
                style="background: linear-gradient(to bottom right, #3572EF, #3ABEF9); padding: 70px; border-radius: 15px;">
                Card 3
            </div>
            <div class="shadow-lg flex items-center justify-center text-xl font-semibold text-white"
                style="background: linear-gradient(to bottom right, #3572EF, #3ABEF9); padding: 70px; border-radius: 15px;">
                Card 4
            </div>
            <div class="shadow-lg flex items-center justify-center text-xl font-semibold text-white"
                style="background: linear-gradient(to bottom right, #3572EF, #3ABEF9); padding: 70px; border-radius: 15px;">
                Card 5
            </div>
            <div class="shadow-lg flex items-center justify-center text-xl font-semibold text-white"
                style="background: linear-gradient(to bottom right, #3572EF, #3ABEF9); padding: 70px; border-radius: 15px;">
                Card 6
            </div>
        </div> --}}
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

        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

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

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
        {{-- npm flowbite --}}
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo31/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 14:30:13 GMT -->

</html>
