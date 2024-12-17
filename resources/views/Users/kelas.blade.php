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

<body>
    <x-navbar></x-navbar>

    <img src="image/Group 2051.svg" alt="bannerkelas" class="w-full">

    <h1 class="absolute text-blue-800 text-4xl font-bold"
        style="position: absolute; top: 25%; left: 50%; transform: translateX(-50%); z-index: 10;">
        Mulai Belajar & Tingkatkan Prestasimu!
    </h1>

    <section class="h-screen"
        style="background: url('image/landing 2.svg') no-repeat center center; background-size: cover; position: relative;">

        <h1 class="absolute text-white text-4xl font-bold"
            style="position: absolute; top: 100px; left: 50%; transform: translateX(-50%); z-index: 10;">
            Pilih Kelas Anda!
        </h1>
        <div class="underline"
            style="position: absolute; top: 150px; left: 50%; transform: translateX(-50%); width: 200px; /* Ubah nilai ini untuk panjang garis */ height: 3px; background-color: white; z-index: 10;">
        </div>

        <div class="container" style="padding: 20px;">
            <div class="card-container" style="display: flex; gap: 50px; justify-content: center; flex-wrap: wrap;">
                <!-- Card 1 -->
                <div class="card" style="flex: 1; max-width: 300px; min-width: 200px; position: relative;">
                    <div class="card-body shadow-lg"
                        style="border-radius: 10px; background: white; text-align: center;">
                        <img src="image/Frame 2056.svg" alt="Image 1"
                            style="width: 100%; height: auto; border-radius: 10px;">

                        <!-- Posisi tulisan di atas gambar -->
                        <h1 class="absolute text-blue-800 text-4xl font-bold"
                            style="position: absolute; top: 100px; left: 50%; transform: translateX(-50%); z-index: 10;">
                            Kelas 10
                        </h1>

                        <!-- Dropdown menu and button container -->
                        <div
                            style="position: absolute; top: 75%; left: 50%; transform: translate(-50%, -50%); z-index: 10; width: 80%;">
                            <label id="dropdownLabel1" data-dropdown-toggle="dropdownHover1"
                                class="w-full text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center shadow-md transition duration-300"
                                type="button">
                                Pilih Kelas
                                <svg class="w-3 h-3 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1l4 4 4-4" />
                                </svg>
                            </label>

                            <!-- Dropdown menu -->
                            <form method="POST" action="{{ route('class.approval.store') }}">
                                @csrf
                                <input type="hidden" id="class_id" name="class_id">
                                <div id="dropdownHover1"
                                    class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-full mt-2"
                                    name="class_id">
                                    <ul class="py-2 text-sm text-gray-700">
                                        @foreach ($kelas10 as $kelas)
                                            <li>
                                                <a class="block px-4 py-2 hover:bg-gray-100"
                                                    onclick="selectClass('dropdownLabel1', '{{ $kelas->id }}', '{{ $kelas->name_class }}')">
                                                    {{ $kelas->name_class }}
                                                    ```html
                                                    <!-- Card 1 -->
                                                    <div class="card"
                                                        style="flex: 1; max-width: 300px; min-width: 200px; position: relative;">
                                                        <div class="card-body shadow-lg"
                                                            style="border-radius: 10px; background: white; text-align: center;">
                                                            <img src="image/Frame 2056.svg" alt="Image 1"
                                                                style="width: 100%; height: auto; border-radius: 10px;">

                                                            <!-- Posisi tulisan di atas gambar -->
                                                            <h1 class="absolute text-blue-800 text-4xl font-bold"
                                                                style="position: absolute; top: 100px; left: 50%; transform: translateX(-50%); z-index: 10;">
                                                                Kelas 10
                                                            </h1>

                                                            <!-- Dropdown menu and button container -->
                                                            <div
                                                                style="position: absolute; top: 75%; left: 50%; transform: translate(-50%, -50%); z-index: 10; width: 80%;">
                                                                <label id="dropdownLabel1"
                                                                    data-dropdown-toggle="dropdownHover1"
                                                                    class="w-full text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center shadow-md transition duration-300"
                                                                    type="button">
                                                                    Pilih Kelas
                                                                    <svg class="w-3 h-3 ml-2" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 10 6">
                                                                        <path stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M1 1l4 4 4-4" />
                                                                    </svg>
                                                                </label>

                                                                <!-- Dropdown menu -->
                                                                <form method="POST"
                                                                    action="{{ route('class.approval.store') }}">
                                                                    @csrf
                                                                    <input type="hidden" id="class_id"
                                                                        name="class_id">
                                                                    <div id="dropdownHover1"
                                                                        class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-full mt-2"
                                                                        name="class_id">
                                                                        <ul class="py-2 text-sm text-gray-700">
                                                                            @foreach ($kelas10 as $kelas)
                                                                                <li>
                                                                                    <a class="block px-4 py-2 hover:bg-gray-100"
                                                                                        onclick="selectClass('dropdownLabel1', '{{ $kelas->id }}', '{{ $kelas->name_class }}')">
                                                                                        {{ $kelas->name_class }}
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>

                                                                    <button type="submit"
                                                                        class="mt-3 text-white w-full bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 shadow-md transition duration-300">
                                                                        Pilih
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Card 2 -->
                                                    <div class="card"
                                                        style="flex: 1; max-width: 300px; min-width: 200px; position: relative;">
                                                        <div class="card-body shadow-lg"
                                                            style="border-radius: 10px; background: white; text-align: center;">
                                                            <img src="image/Frame 2056.svg" alt="Image 2"
                                                                style="width: 100%; height: auto; border-radius: 10px;">

                                                            <!-- Posisi tulisan di atas gambar -->
                                                            <h1 class="absolute text-blue-800 text-4xl font-bold"
                                                                style="position: absolute; top: 100px; left: 50%; transform: translateX(-50%); z-index: 10;">
                                                                Kelas 11
                                                            </h1>

                                                            <!-- Dropdown menu and button container -->
                                                            <div
                                                                style="position: absolute; top: 75%; left: 50%; transform: translate(-50%, -50%); z-index: 10; width: 80%;">
                                                                <label id="dropdownLabel2"
                                                                    data-dropdown-toggle="dropdownHover2"
                                                                    class="w-full text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center shadow-md transition duration-300"
                                                                    type="button">
                                                                    Pilih Kelas
                                                                    <svg class="w-3 h-3 ml-2" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 10 6">
                                                                        <path stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M1 1l4 4 4-4" />
                                                                    </svg>
                                                                </label>

                                                                <!-- Dropdown menu -->
                                                                <form method="POST"
                                                                    action="{{ route('class.approval.store') }}">
                                                                    @csrf
                                                                    <input type="hidden" id="class_id"
                                                                        name="class_id">
                                                                    <div id="dropdownHover2"
                                                                        class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-full mt-2"
                                                                        name="class_id">
                                                                        <ul class="py-2 text-sm text-gray-700">
                                                                            @foreach ($kelas11 as $kelas)
                                                                                <li>
                                                                                    <a class="block px-4 py-2 hover:bg-gray-100"
                                                                                        onclick="selectClass('dropdownLabel2', '{{ $kelas->id }}', '{{ $kelas->name_class }}')">
                                                                                        {{ $kelas->name_class }}
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>

                                                                    <button type="submit"
                                                                        class="mt-3 text-white w-full bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 shadow-md transition duration-300">
                                                                        Pilih
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Card 3 -->
                                                    <div class="card"
                                                        style="flex: 1; max-width: 300px; min-width: 200px; position: relative;">
                                                        <div class="card-body shadow-lg"
                                                            style="border-radius: 10px; background: white; text-align: center;">
                                                            <img src="image/Frame 2056.svg" alt="Image 3"
                                                                style="width: 100%; height: auto; border-radius: 10px;">

                                                            <!-- Posisi tulisan di atas gambar -->
                                                            <h1 class="absolute text-blue-800 text-4xl font-bold"
                                                                style="position: absolute; top: 100px; left: 50%; transform: translateX(-50%); z-index: 10;">
                                                                Kelas 12
                                                            </h1>

                                                            <!-- Dropdown menu and button container -->
                                                            <div
                                                                style="position: absolute; top: 75%; left: 50%; transform: translate(-50%, -50%); z-index: 10; width: 80%;">
                                                                <label id="dropdownLabel3"
                                                                    data-dropdown-toggle="dropdownHover3"
                                                                    class="w-full text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center shadow-md transition duration-300"
                                                                    type="button">
                                                                    Pilih Kelas
                                                                    <svg class="w-3 h-3 ml-2" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 10 6">
                                                                        <path stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M1 1l4 4 4-4" />
                                                                    </svg>
                                                                </label>

                                                                <!-- Dropdown menu -->
                                                                <form method="POST"
                                                                    action="{{ route('class.approval.store') }}">
                                                                    @csrf
                                                                    <input type="hidden" id="class_id"
                                                                        name="class_id">
                                                                    <div id="dropdownHover3"
                                                                        class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-full mt-2"
                                                                        name="class_id">
                                                                        <ul class="py-2 text-sm text-gray-700">
                                                                            @foreach ($kelas12 as $kelas)
                                                                                <li>
                                                                                    <a class="block px-4 py-2 hover:bg-gray-100"
                                                                                        onclick="selectClass('dropdownLabel3', '{{ $kelas->id }}', '{{ $kelas->name_class }}')">
                                                                                        {{ $kelas->name_class }}
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>

                                                                    <button type="submit"
                                                                        class="mt-3 text-white w-full bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 shadow-md transition duration-300">
                                                                        Pilih
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    ```
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <button type="submit"
                                    class="mt-3 text-white w-full bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 shadow-md transition duration-300">
                                    Pilih
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="card" style="flex: 1; max-width: 300px; min-width: 200px; position: relative;">
                    <div class="card-body shadow-lg"
                        style="border-radius: 10px; background: white; text-align: center;">
                        <img src="image/Frame 2056.svg" alt="Image 2"
                            style="width: 100%; height: auto; border-radius: 10px;">

                        <!-- Posisi tulisan di atas gambar -->
                        <h1 class="absolute text-blue-800 text-4xl font-bold"
                            style="position: absolute; top: 100px; left: 50%; transform: translateX(-50%); z-index: 10;">
                            Kelas 11
                        </h1>

                        <!-- Dropdown menu and button container -->
                        <div
                            style="position: absolute; top: 75%; left: 50%; transform: translate(-50%, -50%); z-index: 10; width: 80%;">
                            <label id="dropdownLabel2" data-dropdown-toggle="dropdownHover2"
                                class="w-full text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center shadow-md transition duration-300"
                                type="button">
                                Pilih Kelas
                                <svg class="w-3 h-3 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1l4 4 4-4" />
                                </svg>
                            </label>

                            <!-- Dropdown menu -->
                            <div id="dropdownHover2"
                                class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-full mt-2">
                                @foreach ($kelas11 as $kelas)
                                    <ul class="py-2 text-sm text-gray-700">
                                        <li>
                                            <a class="block px-4 py-2 hover:bg-gray-100"
                                                onclick="selectClass('dropdownLabel2', '{{ $kelas->nama_kelas }}')">
                                                {{ $kelas->name_class }}
                                            </a>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>

                            <button type="button"
                                class="mt-3 text-white w-full bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 shadow-md transition duration-300">
                                Pilih
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="card" style="flex: 1; max-width: 300px; min-width: 200px; position: relative;">
                    <div class="card-body shadow-lg"
                        style="border-radius: 10px; background: white; text-align: center;">
                        <img src="image/Frame 2056.svg" alt="Image 3"
                            style="width: 100%; height: auto; border-radius: 10px;">

                        <!-- Posisi tulisan di atas gambar -->
                        <h1 class="absolute text-blue-800 text-4xl font-bold"
                            style="position: absolute; top: 100px; left: 50%; transform: translateX(-50%); z-index: 10;">
                            Kelas 12
                        </h1>

                        <!-- Dropdown menu and button container -->
                        <div
                            style="position: absolute; top: 75%; left: 50%; transform: translate(-50%, -50%); z-index: 10; width: 80%;">
                            <label id="dropdownLabel3" data-dropdown-toggle="dropdownHover3"
                                class="w-full text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center shadow-md transition duration-300"
                                type="button">
                                Pilih Kelas
                                <svg class="w-3 h-3 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1l4 4 4-4" />
                                </svg>
                            </label>

                            <!-- Dropdown menu -->
                            <div id="dropdownHover3"
                                class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-full mt-2">
                                @foreach ($kelas12 as $kelas)
                                    <ul class="py-2 text-sm text-gray-700">
                                        <li>
                                            <a class="block px-4 py-2 hover:bg-gray-100"
                                                onclick="selectClass('dropdownLabel3', '{{ $kelas->nama_kelas }}')">
                                                {{ $kelas->name_class }}
                                            </a>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>

                            <button type="button"
                                class="mt-3 text-white w-full bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 shadow-md transition duration-300">
                                Pilih
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://class.hummatech.com/user-assets/js/scripts.bundle.js"></script>

    <script>
        function selectClass(labelId, classId, className) {
            document.getElementById(labelId).innerHTML = className +
                ' <svg class="w-3 h-3 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l4 4 4-4" /></svg>';

            document.getElementById('class_id').value = classId;

            document.getElementById('dropdownHover1').classList.add('hidden');
            document.getElementById('dropdownHover2').classList.add('hidden');
            document.getElementById('dropdownHover3').classList.add('hidden');
        }
    </script>

</html>
