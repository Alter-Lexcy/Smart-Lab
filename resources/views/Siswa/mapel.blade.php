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

    <link rel="stylesheet" href="style/siswa.css">

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

        .card:hover {
            transform: scale(1.03);
            /* Membesarkan elemen */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            /* Menambahkan bayangan */
        }

        @keyframes pulse {
            0% {
                width: 0;
            }

            50% {
                width: 100%;
            }

            100% {
                width: 100%;
            }
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
            <div class="flex w-full position-relative" style="position: relative; border-radius: 15px;">
                <img src="image/banner mapel.svg" alt="banner mapel"
                    style="width: 100%; height: auto; border-radius: 15px; box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2), 0 4px 8px rgba(0, 0, 0, 0.15);">
                <p class="namasiswa">
                    <span class="span-nama">Hai, {{ Auth::user()->name }}</span>
                </p>
                <p class="deskripsi">
                    Belajar adalah perjalanan tanpa akhir. Mari jadikan setiap hari kesempatan untuk menambah wawasan
                    dan pengalaman.
                </p>
            </div>
        </div>
    </div>

    <div class="flex justify-between mx-14 mt-5">
        <h1 style="text-align: left; font-size: 2rem; color: #2b6cb0; font-family: 'Poppins', sans-serif; font-weight: bold; position: relative; transition: transform 0.3s ease-in-out;"
            onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
            Daftar Mata Pelajaran
            <span
                style="content: ''; position: absolute; bottom: 0px; left: 0; width: 100%; height: 5px; background-color: #3182ce; border-radius: 5px; animation: pulse 1s forwards;"></span>
        </h1>


        <!-- Form Pencarian -->
        <form action="" method="GET" class="flex items-center">
            <input type="text" id="search" name="search" placeholder="Search..."
                class="rounded-xl border-gray-300 p-3">
            <input type="hidden" id="activeTabInput" name="tab" value="">
            <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="m19.6 21l-6.3-6.3q-.75.6-1.725.95T9.5 16q-2.725 0-4.612-1.888T3 9.5t1.888-4.612T9.5 3t4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l6.3 6.3zM9.5 14q1.875 0 3.188-1.312T14 9.5t-1.312-3.187T9.5 5T6.313 6.313T5 9.5t1.313 3.188T9.5 14" />
                </svg>
            </button>
        </form>
    </div>


    <div class="px-10 py-10">
        <div class="container mx-auto p-10 bg-gray-50 shadow-lg" style="border-radius: 15px;">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
                @forelse($subjects as $subject)
                    <a href="{{ route('Materi', ['materi_id' => $subject->id]) }}"
                        class="card h-250px relative flex flex-col justify-between text-white"
                        style="background-image: url('image/siswa/cardmapel.svg'); background-size: cover; background-position: center; border-radius: 15px; padding: 20px; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.08);">
                        <div class="flex flex-col items-start justify-center h-full absolute">
                            <!-- Nama Mata Pelajaran -->
                            <div class="text-5xl font-bold font-poppins flex-grow mb-3">
                                {{ $subject->name_subject }}
                            </div>

                            <!-- Nama Guru -->
                            <div class="text-xl flex items-center">
                                <!-- Ikon Guru -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <g fill="none" fill-rule="evenodd">
                                        <path
                                            d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                                        <path fill="currentColor"
                                            d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2M8.5 9.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0m9.758 7.484A7.99 7.99 0 0 1 12 20a7.99 7.99 0 0 1-6.258-3.016C7.363 15.821 9.575 15 12 15s4.637.821 6.258 1.984" />
                                    </g>
                                </svg>
                                <!-- Nama Guru -->
                                @if (auth()->user() && auth()->user()->class()->exists())
                                    @forelse($subject->user as $user)
                                        @if ($user->class->pluck('id')->intersect(auth()->user()->class->pluck('id'))->isNotEmpty())
                                            <span class="pl-2">{{ $user->name }}</span>
                                        @else
                                            <span class="pl-2">Belum ada guru</span>
                                        @endif
                                    @empty
                                        <span class="pl-2">Belum ada guru</span>
                                    @endforelse
                                @else
                                    <span class="pl-2">Anda Harus Mendapatkan Kelas</span>
                                @endif
                            </div>
                        </div>

                        <!-- Div Flex untuk Tugas dan Materi -->
                        <div class="flex w-full items-center mt-auto">
                            @if (auth()->user() && auth()->user()->class()->exists())
                                <div class="flex-1 rounded-lg py-2 px-5" style="background-color: #333abb;">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M16 1H8v4h8z" />
                                            <path fill="currentColor"
                                                d="M3 3h3v4h12V3h3v8.674A7 7 0 0 0 13.101 23H3z" />
                                            <path fill="currentColor"
                                                d="M12.5 18a5.5 5.5 0 1 1 11 0a5.5 5.5 0 0 1-11 0m7.914 1L19 17.586v-1.834h-2v2.662l2 2z" />
                                        </svg>
                                        <span class="text-sm pl-3">{{ $subject->task_count }} Tugas Belum
                                            Dikerjakan</span>
                                    </div>
                                </div>
                            @endif

                            <!-- Garis vertikal -->
                            <div class="border-l border-white h-6 mx-5"></div>

                            <div class="flex rounded-lg py-2 px-5" style="background-color: #333abb;">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M13 9V3.5L18.5 9M6 2c-1.11 0-2 .89-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z" />
                                    </svg>
                                    <span class="text-sm pl-3"> {{ $subject->materi_count }} materi</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="bg-gray-100 flex items-center justify-center h-screen">
                        <div class="text-center">
                            <div class="text-red-500 mb-5" style="justify-self: center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-28 h-28">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <p class="text-gray-700 text-md font-semibold">Belum Ada Mata Pelajaran</p>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="pagination mt-10 py-3 px-5">
                {{ $subjects->links('vendor.pagination.tailwind') }}
            </div>
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
        {{-- npm flowbite --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('error'))
                    Swal.fire({
                        icon: "error",
                        title: "Oops... Maaf🙏",
                        text: "Anda Belum Memilki Kelas", // Menampilkan pesan error dari sesi
                    });
                @endif
            });
        </script>
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo31/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 14:30:13 GMT -->

</html>
