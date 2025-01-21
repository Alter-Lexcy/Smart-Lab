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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        .materiModal {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease-in-out;
            z-index: 50;
        }

        .materiModal .bg-white {
            height: 90%;
            /* Atur tinggi modal */
            max-height: 90%;
            /* Batas maksimum */
            display: flex;
            flex-direction: column;
            /* Agar konten vertikal terorganisir */
        }

        .materiModal embed {
            flex: 1;
            /* Isi seluruh ruang yang tersedia */
            min-height: 0;
            /* Pastikan tidak terjadi overflow */
        }


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

    <div class="bg-white shadow-md">
        <div class="container px-10 py-5 flex justify-between items-center">
            <div class="flex items-center gap-5">
                <!-- Tabs -->
                <button id="tab-materi"
                    class="tab-button active-tab bg-blue-800 text-white rounded-xl shadow-md px-3 flex items-center justify-center transform transition-all duration-200 active:scale-95"
                    onclick="showFilter('materi')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 m-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4 3h2v18H4zm14 0H7v18h11c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m-2 6h-6V8h6zm0-2h-6V6h6z" />
                    </svg>
                    <span class="font-semibold text-lg">Materi</span>
                </button>
                <button id="tab-tugas"
                    class="tab-button bg-white text-blue-800 rounded-xl shadow-md px-3 flex items-center justify-center transform transition-all duration-200 active:scale-95"
                    onclick="showFilter('tugas')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 m-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 1H8v4h8z" />
                        <path d="M3 3h3v4h12V3h3v20H3zm12 10v-2H9v2zm0 4v-2H9v2z" />
                    </svg>
                    <span class="font-semibold text-lg">Tugas</span>
                </button>
                {{-- end Tabs --}}
            </div>

            <div class="flex items-center gap-3">

                <!-- Form Pencarian -->
                <form action="{{ route('Materi', ['materi_id' => $materi_id]) }}" method="GET"
                    class="flex items-center">
                    <input type="text" id="search" name="search" placeholder="Search..."
                        class="rounded-xl border-gray-300 p-3">
                    <input type="hidden" id="activeTabInput" name="tab" value="{{ $activeTab }}">
                    <!-- Tab aktif -->
                    <button type="submit"
                        class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 px-4 rounded-xl">
                        <i class="fas fa-search text-white"></i>
                    </button>
                </form>
                {{-- end Search --}}

                <!-- Filter Urutan (Hanya tampil di Tab Materi) -->
                <form action="{{ route('Materi', ['materi_id' => $materi_id]) }}" method="GET" id="filter-urutan"
                    class="hidden">
                    @php
                        $nextOrder = request('order', 'desc') === 'desc' ? 'asc' : 'desc';
                    @endphp
                    <input type="hidden" name="order" value="{{ $nextOrder }}">
                    <button type="submit"
                        class="p-4 rounded-xl bg-blue-500 hover:bg-blue-700 text-white flex items-center justify-center">
                        @if (request('order', 'desc') === 'desc')
                            <i class="fa-solid fa-arrow-up-wide-short text-white"></i>
                        @else
                            <i class="fa-solid fa-arrow-down-wide-short text-white"></i>
                        @endif
                    </button>
                </form>
                {{-- End Filter Sort --}}

                <!-- Dropdown Filter (Hanya tampil di Tab Tugas) -->
                <div class="relative" id="filter-dropdown-container">
                    <button id="filterButton"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 px-4 rounded-xl shadow-md">
                        <i class="fas fa-filter text-white"></i>
                    </button>
                    <div id="filterDropdown"
                        class="hidden absolute right-0 mt-5 w-72 bg-white border border-gray-300 rounded-xl pl-1 pb-2 shadow-lg z-50">
                        <div class="px-4 py-3 text-lg font-semibold text-gray-700 border-b border-gray-300">
                            Pilih Status Tugas
                        </div>
                        <form method="GET" action="{{ route('Materi', ['materi_id' => $materi_id]) }}">
                            @csrf
                            <button type="submit" name="status" value="Sudah mengumpulkan"
                                class="flex items-center justify-center px-4 py-2 text-green-800 bg-green-300 rounded-xl m-2 w-64 h-12">
                                Sudah Mengumpulkan
                            </button>
                            <button type="submit" name="status" value="Belum mengumpulkan"
                                class="flex items-center justify-center px-4 py-2 text-yellow-600 bg-yellow-100 rounded-xl m-2 w-64 h-12">
                                Belum Mengumpulkan
                            </button>
                            <button type="submit" name="status" value="Tidak mengumpulkan"
                                class="flex items-center justify-center px-4 py-2 text-red-800 bg-red-300 rounded-xl m-2 w-64 h-12">
                                Tidak Mengumpulkan
                            </button>
                        </form>
                    </div>
                </div>
                {{-- End Dropdown Filter --}}
            </div>
        </div>
    </div>

    <div class="container p-10">

        <!-- Header Banner -->
        @if ($materis->isNotEmpty())
            <div class="d-flex flex-column flex-root">
                <div class="flex w-full position-relative" style="position: relative;">
                    <!-- Gambar dengan teks di dalamnya -->
                    <img src="/image/siswa/banner materi.svg" alt="banner mapel" style="width: 100%; height: auto;">

                    <!-- Elemen teks yang berada di atas gambar -->
                    <div
                        style="
                    position: absolute;
                    top: 50%;
                    left: 5%; /* Posisi kiri */
                    transform: translateY(-50%);
                    text-align: left;
                    color: white;
                    max-width: 40%; /* Membatasi lebar teks */
                    overflow-wrap: break-word; /* Memastikan teks panjang terpecah */
                    word-wrap: break-word; /* Kompatibilitas tambahan */
                ">
                        <p class="text-5xl font-poppins font-bold">
                            {{ $subjectName }}
                        </p>
                    </div>
                </div>
            </div>
        @endif
        {{-- Tap Content Materi --}}
        <div class="my-5">
            <!-- Content -->
            <div class="mt-5">
                <div id="content-materi" class="tab-content">
                    <!-- List Materi -->
                    @forelse ($materis as $materi)
                        <div class="pt-5">
                            <div class="grid grid-cols-1 gap-10">
                                <div class="bg-blue-500"
                                    style="border-radius: 15px; padding-left: 30px; position: relative;">
                                    <div class="bg-white shadow-md py-10 px-5"
                                        style="border-top-right-radius: 15px; border-bottom-right-radius: 15px;">
                                        <!-- Judul Materi -->
                                        <h2 class="text-xl font-bold mb-2">{{ $materi->title_materi }}</h2>
                                        <!-- Deskripsi Materi -->
                                        <p class="text-gray-600" style="margin-right: 150px;">
                                            {{ Str::limit($materi->description, 50, '...') ?? 'Kosong' }}
                                        </p>
                                        <!-- Tombol Lihat Detail -->
                                        <div class="mt-4" style="position: absolute; bottom: 10px; right: 10px;">
                                            <button
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl"
                                                onclick="openModal('showMateriModal_{{ $materi->id }}')">Lihat
                                                detail
                                            </button>
                                            <a href="{{ Storage::url($materi->file_materi) }}" target="_blank"
                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-xl">
                                                Buka Materi
                                            </a>
                                        </div>
                                        <!-- Tanggal Materi -->
                                        <div class="absolute top-5 right-5 text-gray-600 font-semibold text-sm">
                                            {{ \Carbon\Carbon::parse($materi->created_at)->translatedFormat('l, j F Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Jika Tidak Ada Materi -->
                        <div class="flex items-center justify-center h-screen">
                            <div class="text-center">
                                <div class="text-red-500 mb-5" style="justify-self: center">
                                    <img src="/image/Gelembung.svg" alt="">
                                </div>
                                <p class="text-gray-700 text-3xl font-semibold">Belum Ada Materi</p>
                            </div>
                        </div>
                    @endforelse
                    <div class="pagination py-3 px-5">
                        {{ $materis->links('vendor.pagination.tailwind') }}
                    </div>
                    @foreach ($materis as $materi)
                        <div id="showMateriModal_{{ $materi->id }}"
                            class="materiModal fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50"
                            style="display:none;">
                            <div class="bg-white rounded-lg shadow-lg w-full max-w-5xl h-full mx-7 py-8 flex flex-col overflow-hidden"
                                style="padding-left: 28px">
                                <!-- Header Modal -->
                                <div class="flex justify-between items-center border-b pb-4"
                                    style="margin-right: 28px">
                                    <h5 class="text-2xl font-bold text-gray-800">Detail Materi</h5>
                                    <button type="button" class="text-gray-700 hover:text-gray-900"
                                        onclick="closeModal('showMateriModal_{{ $materi->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Content Modal -->
                                <div class="mt-4 flex-1  overflow-y-auto">
                                    <div class="space-y-4" style="margin-right: 28px">
                                        <div class="flex space-x-2">
                                            <h6 class="text-lg font-semibold text-gray-700">Materi:
                                                <span class="text-gray-500">{{ $materi->title_materi }}</span>
                                            </h6>
                                        </div>
                                        <div class="flex space-x-2">
                                            <h6 class="text-lg font-semibold text-gray-700">Tanggal Pembuatan:
                                                <span class="text-gray-500">
                                                    {{ \Carbon\Carbon::parse($materi->created_at)->translatedFormat('l, j F Y') }}
                                                </span>
                                            </h6>
                                        </div>
                                        <div>
                                            <h6 class="text-lg font-semibold text-gray-700">Deskripsi:
                                                <span
                                                    class="text-gray-500">{{ $materi->description ?? 'Kosong' }}</span>
                                            </h6>
                                        </div>
                                        <div style="width: 100%; height: 165vh; overflow: hidden;">
                                            <h6 class="text-lg font-semibold text-gray-700 mb-3">File Materi:</h6>
                                            @php
                                                $file = pathinfo($materi->file_materi, PATHINFO_EXTENSION);
                                            @endphp
                                            @if ($file === 'pdf')
                                                <embed src="{{ asset('storage/' . $materi->file_materi) }}"
                                                    type="application/pdf"
                                                    class=" border-2 rounded-lg  max-h-[10000px]"
                                                    style="width: 100%; height: 100%; display: block;"> >
                                            @else
                                                <p class="text-red-500">Format file tidak didukung.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                </span><!--end::Svg Icon-->
            </div>
        </div>
        {{-- Tab Content Tugas --}}
        <div id="content-tugas" class="tab-content hidden space-y-6">
            @forelse ($tasks as $task)
                <div style="position: relative;">
                    <div class="bg-white shadow-md py-10 px-5" style="border-radius: 15px;">
                        @php
                            $assessment = $task->collections->first()->assessment ?? null;
                        @endphp

                        <p class="text-gray-600" style="margin-right: 150px; margin-bottom: 5px">Nilai:
                            {{ $assessment && $assessment->mark_task !== null ? $assessment->mark_task : 'Belum Dinilai' }}
                        </p>
                        <h2 class="text-xl font-bold mb-2">{{ $task->title_task }}</h2>
                        <p class="text-gray-600" style="margin-right: 150px">
                            Mapel : {{ $task->Subject->name_subject }}
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
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl"
                                onclick="openModal('showTaskModal_{{ $task->id }}')">
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
                <div class="flex items-center justify-center h-screen">
                    <div class="text-center">
                        <div class="text-red-500 mb-5" style="justify-self: center">
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
        </div>

        {{-- Show Task --}}
        @foreach ($tasks as $task)
            <div id="showTaskModal_{{ $task->id }}"
                class="taskModal fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 "
                style="display:none;">
                <div
                    class="bg-white rounded-lg shadow-lg w-[90%] md:w-[60%] lg:w-[50%] h-auto max-h-[90%] px-5 py-5 overflow-y-auto">
                    {{-- Header Modal --}}
                    <div class="flex justify-between items-center border-b pb-4 mr-3">
                        <h5 class="text-2xl font-bold text-gray-800">Detail Tugas</h5>
                        <button type="button" class="text-gray-700 hover:text-gray"
                            onclick="closeModal('showTaskModal_{{ $task->id }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    {{-- Content Modal --}}
                    <div class="mt-4 mb-3 space-y-4 overflow-y-auto h-auto ">
                        <div class="flex space-x-2">
                            <h6 class="text-lg font-semibold text-gray-700">Judul:</h6>
                            <p class="text-gray-600">{{ $task->title_task }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <h6 class="text-lg font-semibold text-gray-700">Materi:</h6>
                            <p class="text-gray-600">{{ $task->Materi->title_materi }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <h6 class="text-lg font-semibold text-gray-700">Tanggal Pengumpulan:</h6>
                            <p class="text-gray-700">
                                {{ \Carbon\Carbon::parse($task->created_at)->translatedFormat('l, j F Y') }}
                            </p>
                        </div>
                        <div class="mr-8">
                            <h6 class="text-lg font-semibold text-gray-700">Deskripsi:</h6>
                            <p class="text-gray-600">{{ $task->description_task }}</p>
                        </div>
                        <div class="mr-8" style="overflow: hidden;">
                            <h6 class="text-lg font-semibold text-gray-700 mb-3">File Tugas</h6>
                            @php
                                $file = pathinfo($task->file_task, PATHINFO_EXTENSION);
                            @endphp
                            @if (in_array($file, ['jpg', 'png']))
                                <img src="{{ asset('storage/' . $task->file_task) }}" alt="File Image"
                                    class="mx-auto w-[100%] h-auto border-2 rounded-lg">
                            @elseif($file === 'pdf')
                                <embed src="{{ asset('storage/' . $task->file_task) }}" type="application/pdf"
                                    class="border-2 rounded-lg " style="height: 165vh; width: 100%; display: block;">
                            @else
                                <p class="text-red-500">Format file tidak didukung.</p>
                            @endif
                        </div>
                    </div>
                    <div class="justify-end flex mr-10">
                        <button type="button" class="bg-gray-400 font-semibold text-white rounded-lg py-2 px-4"
                            onclick="closeModal('showTaskModal_{{ $task->id }}')">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- Collection --}}
        @foreach ($tasks as $task)
            <div id="tugasModal-{{ $task->id }}"
                class="tugasModal fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 "
                style="display: none;">
                <div class="bg-white rounded-lg px-7 py-5 w-[40%] h-auto shadow-lg">
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

                        <div class="mb-5">
                            <label class="text-gray-700 block font-medium mb-3">Upload File (PDF atau Gambar)</label>
                            <div class="relative border-2 rounded-xl  border-gray-300">
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

                        <div class="flex justify-end space-x-2">
                            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded"
                                onclick="closeModal('tugasModal-{{ $task->id }}')">Batal</button>
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Unggah
                                Tugas</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
        <div class="px-5 py-3">
            {{ $tasks->links() }}
        </div>
    </div>


    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://class.hummatech.com/user-assets/js/scripts.bundle.js"></script>
    <!--end::Javascript-->
    <script>
        function openModal(modalId) {
            // Tutup semua modal yang terbuka
            const modals = document.querySelectorAll('.tugasModal');
            modals.forEach(modal => modal.classList.add('hidden'));

            // Tampilkan modal yang diinginkan
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
            } else {
                console.error(`Modal dengan ID ${modalId} tidak ditemukan.`);
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
            } else {
                console.error(`Modal dengan ID ${modalId} tidak ditemukan.`);
            }
        }
    </script>

    {{-- tab content script --}}
    <script>
        // Tab functionality
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.tab-button');
            const contents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Remove active state from all tabs
                    tabs.forEach(t => t.classList.remove('active-tab', 'bg-blue-800',
                        'text-white'));
                    tabs.forEach(t => t.classList.add('bg-white', 'text-blue-800'));

                    // Hide all contents
                    contents.forEach(content => content.classList.add('hidden'));

                    // Activate clicked tab and show respective content
                    tab.classList.remove('bg-white', 'text-blue-800');
                    tab.classList.add('active-tab', 'bg-blue-800', 'text-white');

                    const target = tab.id.replace('tab-', 'content-');
                    document.getElementById(target).classList.remove('hidden');
                });
            });
        });
    </script>

    <script>
        // Fungsi untuk menampilkan filter sesuai dengan tab yang dipilih
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const activeTab = urlParams.get('tab') || 'materi'; // Default ke "materi"
            showFilter(activeTab); // Tampilkan filter sesuai tab aktif

            // Tambahkan event listener untuk perubahan tab
            document.querySelectorAll('.tab-link').forEach(tab => {
                tab.addEventListener('click', function() {
                    const selectedTab = tab.getAttribute('data-tab');
                    const url = new URL(window.location.href);
                    url.searchParams.set('tab', selectedTab);
                    window.history.pushState({}, '', url); // Perbarui URL tanpa reload
                    showFilter(selectedTab); // Tampilkan filter sesuai tab yang dipilih
                });
            });

            // Fungsi untuk membuka dan menutup dropdown filter
            const filterButton = document.getElementById('filterButton');
            if (filterButton) {
                filterButton.addEventListener('click', function() {
                    const filterDropdown = document.getElementById('filterDropdown');
                    filterDropdown.classList.toggle('hidden');
                });
            }
        });

        // Fungsi untuk menampilkan filter sesuai dengan tab yang dipilih
        function showFilter(tab) {
            const filterUrutan = document.getElementById('filter-urutan');
            const filterDropdown = document.getElementById('filterDropdown');
            const filterDropdownContainer = document.getElementById('filter-dropdown-container');

            // Menyembunyikan semua filter terlebih dahulu
            if (filterUrutan) filterUrutan.classList.add('hidden');
            if (filterDropdown) filterDropdown.classList.add('hidden');

            // Menampilkan filter sesuai tab aktif
            if (tab === 'materi') {
                if (filterUrutan) filterUrutan.classList.remove('hidden');
                if (filterDropdownContainer) filterDropdownContainer.classList.add('hidden');
            } else if (tab === 'tugas') {
                if (filterUrutan) filterUrutan.classList.add('hidden');
                if (filterDropdownContainer) filterDropdownContainer.classList.remove('hidden');
            }
        }
    </script>

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

    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"8f0bc3aff833fd88","version":"2024.10.5","r":1,"token":"a20ac1c0d36b4fa6865d9d244f4efe5a","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}}}'
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    {{-- npm flowbite --}}

    <script src="https://cdn.tailwindcss.com"></script>
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo31/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 14:30:13 GMT -->

</html>
