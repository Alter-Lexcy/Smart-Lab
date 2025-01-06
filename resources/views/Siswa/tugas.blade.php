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

    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])

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
            <div class="flex items-center">
                <form action="{{ route('Tugas') }}" method="GET" class="flex items-center">
                    <input type="text" id="search" name="search" placeholder="Search..."
                        class="rounded-xl border-gray-300 p-3">
                    <!-- Tombol search dengan icon -->
                    <button type="submit"
                        class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 px-4 rounded-xl">
                        <i class="fas fa-search text-white"></i>
                    </button>
                </form>
                
                <!-- Dropdown Filter -->
                <div class="ml-4 relative">
                    <button id="filterButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 px-4 rounded-xl">
                        <i class="fas fa-filter text-white"></i>
                    </button>
                    <div id="filterDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg z-50">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Filter 1</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Filter 2</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Filter 3</a>
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user() && auth()->user()->classes()->exists())
            <div class="space-y-6">
                @forelse ($tasks as $task)
                    <div style="position: relative;">
                        <div class="bg-white shadow-md py-10 px-5" style="border-radius: 15px;">
                            @foreach ($task->collections as $collection)
                                <p class="text-gray-600" style="margin-right: 150px; margin-bottom: 5px">Nilai:
                                    {{ $collection->assessment && ($collection->assessment->mark_task !== null) ? $collection->assessment->mark_task : 'Belum Dinilai' }}
                                </p>
                            @endforeach
                            <h2 class="text-xl font-bold mb-2">{{ $task->title_task }}</h2>
                            <p class="text-gray-600" style="margin-right: 150px">
                                {{ Str::limit($task->description_task, 15, '...') ?? 'Kosong' }}
                            </p>

                            <!-- Status Sudah Dikerjakan dengan ikon -->
                            @php
                                $status = $task->collections->first()->status ?? 'default';
                            @endphp

                            @if ($status === 'Tidak mengumpulkan')
                                <div class="flex items-center text-red-400 mt-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6 mr-2">
                                        <path fill-rule="evenodd"
                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ $status }}</span>
                                </div>
                            @elseif ($status === 'Belum mengumpulkan')
                                <div class="flex items-center text-yellow-300 mt-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6 mr-2">
                                        <path fill-rule="evenodd"
                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ $status }}</span>
                                </div>
                            @elseif ($status === 'Sudah mengumpulkan')
                                <div class="flex items-center text-green-400 mt-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6 mr-2">
                                        <path fill-rule="evenodd"
                                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ $status }}</span>
                                </div>
                            @else
                                <div class="flex items-center text-gray-400 mt-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6 mr-2">
                                        <path
                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12 16.5a.75.75 0 0 1 0-1.5h.008a.75.75 0 1 1 0 1.5H12ZM12 6a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 12 6Z" />
                                    </svg>
                                    <span>Status Tidak Diketahui</span>
                                </div>
                            @endif

                            <!-- Tombol Aksi -->
                            <div class="mt-4" style="position: absolute; bottom: 15px; right: 15px;">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl">
                                    Lihat detail
                                </button>
                                @php
                                    $status = $task->collections->first()->status ?? 'default';
                                @endphp
                                @if ($status === 'Belum mengumpulkan')
                                    <button
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-xl"
                                        onclick="openModal('tugasModal-{{ $task->id }}')">
                                        Pengumpulan Tugas
                                    </button>
                                @endif
                            </div>

                            <!-- Tanggal di kanan atas -->
                            <div class="absolute top-5 right-5 text-gray-600 font-semibold text-sm">
                                <span class="text-danger">Deadline </span>
                                {{ \Carbon\Carbon::parse($task->date_collection)->translatedFormat('H:i l, j F Y') }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-gray-100 flex items-center justify-center h-screen">
                        <div class="text-center">
                            <div class="text-red-500 mb-5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-28 h-28">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <p class="text-gray-700 text-3xl font-semibold">Belum Ada Tugas</p>
                        </div>
                    </div>
                @endforelse
            @else
                <div class="bg-gray-100 flex items-center justify-center h-screen">
                    <div class="text-center">
                        <div class="text-red-500 mb-5" style="justify-self: center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-28 h-28">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <p class="text-gray-700 text-3xl font-semibold">Anda Belum Ada Kelas</p>
                    </div>
                </div>
            </div>
        @endif
        @foreach ($tasks as $task)
            <div id="tugasModal-{{ $task->id }}" class="tugasModal fixed inset-0 flex items-center justify-center"
                style="display: none;">
                <div class="bg-white rounded-lg pt-6 pb-2 pl-6 w-[40%] h-auto shadow-lg">
                    <h5 class="text-xl font-bold mb-4">Pengumpulan Tugas</h5>

                    <button class="absolute top-2 right-2 text-gray-500 hover:text-gray-700"
                        onclick="closeModal('tugasModal-{{ $task->id }}')">
                        &times;
                    </button>

                    <form id="form-{{ $task->id }}"
                        action="{{ route('updateCollection', ['task_id' => $task->id]) }}" method="POST"
                        enctype="multipart/form-data" class="overflow-y-auto h-[56%]">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="block font-medium mb-3">Upload File (PDF atau Gambar)</label>
                            <div class="relative">
                                <input type="file" id="file_collection-{{ $task->id }}"
                                    name="file_collection" class="hidden" accept=".pdf,image/*"
                                    onchange="updateFileName(this)">
                                <label for="file_collection-{{ $task->id }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer inline-block">
                                    Pilih File
                                </label>
                                <span id="file-name-{{ $task->id }}" class="ml-2 text-gray-500 mt-3">Tidak ada
                                    file yang dipilih</span>
                            </div>
                        </div>

                        <div class="flex justify-between">
                            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded"
                                onclick="closeModal('tugasModal-{{ $task->id }}')">Batal</button>
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Unggah
                                Tugas</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach

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
            function updateFileName(input) {
                const fileNameSpan = document.getElementById(`file-name-${input.id.split('-')[1]}`);
                const fileName = input.files[0]?.name || 'Tidak ada file yang dipilih';
                fileNameSpan.textContent = fileName;
            }

            function openModal(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = 'flex'; // Tampilkan modal
                }
            }

            function closeModal(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = 'none'; // Sembunyikan modal
                }
            }
        </script>

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
