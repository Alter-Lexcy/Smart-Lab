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

    <!-- Link Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

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

        <div class="flex justify-between items-center my-8">
            <h1 class="text-2xl text-gray-700 font-poppins font-bold">
                Daftar Tugas
            </h1>

            <!-- Form pencarian berada di kanan -->
            <form action="your_search_url" method="GET" class="flex items-center">
                <input type="text" id="search" name="search" placeholder="Search..."
                    class="rounded-xl border-gray-300 p-3">
                <!-- Tombol search dengan icon -->
                <button type="submit"
                    class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 px-4 rounded-xl">
                    <i class="fas fa-search text-white"></i>
                </button>
            </form>
        </div>

        @forelse ($tasks as $task)
            <div style="position: relative;">
                <div class="bg-white shadow-md py-10 px-5" style="border-radius: 15px;">
                    <h2 class="text-xl font-bold mb-2">{{ $task->title_task }}</h2>
                    <p class="text-gray-600" style="margin-right: 150px">
                        {{ $task->short_description = Str::limit($task->description_task, 15, '...') ?? 'Kosong' }}
                    </p>

                    <!-- Status Sudah Dikerjakan dengan ikon -->
                    <div class="flex items-center text-yellow-300 mt-10">
                        <!-- Ikon dengan ukuran yang lebih besar -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6 mr-2">
                            <path fill-rule="evenodd"
                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>{{ $task->collections->first()->status ?? 'Tidak ada status' }}</span>
                    </div>

                    <div class="mt-4" style="position: absolute; bottom: 15px; right: 15px;">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl">Lihat
                            detail</button>
                        <button
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-xl">Pengumpulan
                            Tugas</button>
                    </div>
                    <!-- Tanggal di kanan atas -->
                    <div class="absolute top-5 right-5 text-gray-600 font-semibold text-sm">
                        <span class="text-danger">Deadline
                        </span>{{ \Carbon\Carbon::parse($task->date_collection)->translatedFormat('H:i l,j F Y') }}
                    </div>
                </div>
            </div>
        @empty
        @endforelse
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

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
        
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo31/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 14:30:13 GMT -->

</html>
