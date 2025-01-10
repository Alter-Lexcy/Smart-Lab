<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('image/logo.png') }}">
    <title>SmartLab</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])

    <!-- Scripts -->
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.10.5/dist/algoliasearch.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- SweetAlert2 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css">

    <!-- Preline Select CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.min.css">

    {{-- font poppins --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <!-- Preline Select JS -->
    <script src="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.min.js"></script>
    <script>
        window.addEventListener('load', function() {
            setTimeout(function() {
                // Tambahkan class 'slide-out-up' untuk memulai transisi
                document.getElementById('preloader').classList.add('transform', '-translate-y-full');

                // Hapus preloader setelah transisi selesai (misal 700ms)
                setTimeout(function() {
                    document.getElementById('preloader').style.display = 'none';
                    document.getElementById('content').classList.remove('opacity-0');
                    document.getElementById('content').classList.add('opacity-100');
                }, 700); // Sesuaikan dengan durasi transisi
            }, 700); // Durasi preloader ditampilkan (3000ms = 3 detik)
        });
    </script>
</head>

<body class="bg-gray-50  font-sans ">
    <div class="flex h-auto overflow-auto">
        <!-- Sidebar -->
        <aside
            class = "w-60 -translate-x-48 fixed transition transform ease-in-out duration-1000 z-50 flex h-screen bg-[#1E293B] ">
            <!-- open sidebar button -->
            <div
                class = "max-toolbar translate-x-24 scale-x-0 w-full -right-6 transition transform ease-in duration-300 flex items-center justify-between border-4 border-white   absolute top-2 rounded-full h-12">

                <div class="flex pl-4 items-center space-x-2 ">
                </div>
                <div
                    class = "flex items-center space-x-3 group bg-gradient-to-r from-cyan-500 to-blue-500   pl-10 pr-2 py-1 rounded-full text-white  ">
                    <div class= "transform ease-in-out duration-300 mr-12 font-medium">
                        SmartLab
                    </div>
                </div>
            </div>
            <div onclick="openNav()"
                class = "-right-6 transition transform ease-in-out duration-500 flex border-4 border-white dark:border-[#0F172A] bg-[#1E293B] hover:bg-blue-500  absolute top-2 p-3 rounded-full text-white hover:rotate-45">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={3}
                    stroke="currentColor" class="w-4 h-4">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                </svg>
            </div>
            <!-- MAX SIDEBAR-->
            <div class= "max hidden text-white mt-20 flex-col space-y-2 w-full h-[calc(100vh)]">
                <a href="/admin/dashboard"
                    class="flex hover:ml-4 w-[90%] hover:text-blue-500 p-2 pl-8 rounded-full transform ease-in-out duration-300 flex-row items-center space-x-3 before:transition-all {{ request()->routeIs('home') ? 'text-blue-600 ' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                        <path
                            d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                    </svg>
                    <div>
                        Dashboard
                    </div>
                </a>
                <button type="button"
                    class=" w-[90%] text-white hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                            clip-rule="evenodd"  />
                    </svg>
                    <span class="flex-1 text-left " sidebar-toggle-item>User</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('teachers.index') }}"
                            class="hover:ml-6 ml-4 w-[80%]  hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out flex-row items-center space-x-3 flex text-base font-normal transition duration-75 group before:transition-all {{ request()->routeIs('teachers.index') ? 'text-blue-600 ' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor"
                                class="size-6 mr-3">
                                <path
                                    d="M208 352c-2.39 0-4.78.35-7.06 1.09C187.98 357.3 174.35 360 160 360c-14.35 0-27.98-2.7-40.95-6.91-2.28-.74-4.66-1.09-7.05-1.09C49.94 352-.33 402.48 0 464.62.14 490.88 21.73 512 48 512h224c26.27 0 47.86-21.12 48-47.38.33-62.14-49.94-112.62-112-112.62zm-48-32c53.02 0 96-42.98 96-96s-42.98-96-96-96-96 42.98-96 96 42.98 96 96 96zM592 0H208c-26.47 0-48 22.25-48 49.59V96c23.42 0 45.1 6.78 64 17.8V64h352v288h-64v-64H384v64h-76.24c19.1 16.69 33.12 38.73 39.69 64H592c26.47 0 48-22.25 48-49.59V49.59C640 22.25 618.47 0 592 0z" />
                            </svg>
                            Guru
                        </a>
                    </li>
                    <li>
                        <a href="/Students"
                            class="hover:ml-6 ml-4 w-[80%]  hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out flex-row items-center space-x-3 flex text-base font-normal transition duration-75 group before:transition-all {{ request()->routeIs('Students') ? 'text-blue-600 ' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6 mr-3">
                                <path
                                    d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                                <path
                                    d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                                <path
                                    d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                            </svg>
                            Siswa
                        </a>
                    </li>

                </ul>
                <a href="{{ route('classes.index') }}"
                    class="flex hover:ml-4 w-[90%] hover:text-blue-500 p-2 pl-8 rounded-full transform ease-in-out duration-300 flex-row items-center space-x-3 before:transition-all {{ request()->routeIs('classes.index') ? 'text-blue-600 ' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M4.5 2.25a.75.75 0 0 0 0 1.5v16.5h-.75a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5h-.75V3.75a.75.75 0 0 0 0-1.5h-15ZM9 6a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm-.75 3.75A.75.75 0 0 1 9 9h1.5a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM9 12a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm3.75-5.25A.75.75 0 0 1 13.5 6H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM13.5 9a.75.75 0 0 0 0 1.5H15A.75.75 0 0 0 15 9h-1.5Zm-.75 3.75a.75.75 0 0 1 .75-.75H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM9 19.5v-2.25a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-.75.75h-4.5A.75.75 0 0 1 9 19.5Z"
                            clip-rule="evenodd"  />
                    </svg>
                    <div>
                        Kelas
                    </div>
                </a>
                <a href="{{ route('subject.index') }}"
                    class="flex hover:ml-4 w-[90%] hover:text-blue-500 p-2 pl-8 rounded-full transform ease-in-out duration-300 flex-row items-center space-x-3 before:transition-all {{ request()->routeIs('subject.index') ? 'text-blue-600 ' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                    </svg>
                    <div>
                        Mapel
                    </div>
                </a>
            </div>
            <!-- MINI SIDEBAR-->
            <div class= "mini mt-20 flex flex-col space-y-1 w-full h-[calc(100vh)]">
                <button onclick="window.location.href='{{ route('home') }}'"
                    class= "hover:ml-4 justify-end pr-3  hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex before:transition-all {{ request()->routeIs('home') ? 'text-blue-600 ' : 'text-white' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                        <path
                            d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                    </svg>
                </button>
                <button onclick="window.location.href='{{ route('teachers.index') }}'"
                    class= "hover:ml-4 justify-end pr-3  hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex before:transition-all {{ request()->routeIs('teachers.index') ? 'text-blue-600 ' : 'text-white' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor" class="size-6">
                        <path
                            d="M208 352c-2.39 0-4.78.35-7.06 1.09C187.98 357.3 174.35 360 160 360c-14.35 0-27.98-2.7-40.95-6.91-2.28-.74-4.66-1.09-7.05-1.09C49.94 352-.33 402.48 0 464.62.14 490.88 21.73 512 48 512h224c26.27 0 47.86-21.12 48-47.38.33-62.14-49.94-112.62-112-112.62zm-48-32c53.02 0 96-42.98 96-96s-42.98-96-96-96-96 42.98-96 96 42.98 96 96 96zM592 0H208c-26.47 0-48 22.25-48 49.59V96c23.42 0 45.1 6.78 64 17.8V64h352v288h-64v-64H384v64h-76.24c19.1 16.69 33.12 38.73 39.69 64H592c26.47 0 48-22.25 48-49.59V49.59C640 22.25 618.47 0 592 0z" />
                    </svg>
                </button>
                <button onclick="window.location.href='/Students'"
                    class= "hover:ml-4 justify-end pr-3  hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex before:transition-all {{ request()->routeIs('Students') ? 'text-blue-600 ' : 'text-white' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                        <path
                            d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                        <path
                            d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                    </svg>
                </button>
                <button onclick="window.location.href='{{ route('classes.index') }}'"
                    class= "hover:ml-4 justify-end pr-3  hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex before:transition-all {{ request()->routeIs('classes.index') ? 'text-blue-600 ' : 'text-white' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M4.5 2.25a.75.75 0 0 0 0 1.5v16.5h-.75a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5h-.75V3.75a.75.75 0 0 0 0-1.5h-15ZM9 6a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm-.75 3.75A.75.75 0 0 1 9 9h1.5a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM9 12a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm3.75-5.25A.75.75 0 0 1 13.5 6H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM13.5 9a.75.75 0 0 0 0 1.5H15A.75.75 0 0 0 15 9h-1.5Zm-.75 3.75a.75.75 0 0 1 .75-.75H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM9 19.5v-2.25a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-.75.75h-4.5A.75.75 0 0 1 9 19.5Z"
                            clip-rule="evenodd"  />
                    </svg>
                </button>
                <button onclick="window.location.href='{{ route('subject.index') }}'"
                    class= "hover:ml-4 justify-end pr-3  hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex before:transition-all {{ request()->routeIs('subject.index') ? 'text-blue-600 ' : 'text-white' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                    </svg>
                </button>
            </div>

        </aside>

        <!-- Page Content  -->
        <div class="flex-1 p-4 ml-[70px]">
            <div id="kt_app_header" class="app-header bg-white shadow rounded-xl">
                <div class="container-fluid flex justify-between items-center py-2 px-5">
                    <!-- Logo -->
                    <div class="flex items-center space-x-3">
                        <a href="/dashboard">
                            <img alt="Logo" src="{{ asset('image/logo.png') }}" class="h-10" />
                        </a>
                    </div>

                    <!-- User Info and Profile -->
                    <div class="flex items-center space-x-3">
                        <div class="hidden md:flex flex-col text-right">
                            <p class="font-bold text-gray-800 uppercase">{{ Auth::user()->name }}</p>
                            <span
                                class="badge badge-light-success text-sm">{{ Auth::user()->getRoleNames()->first() }}</span>
                        </div>
                        <div class="relative">
                            <!-- Profile Button -->
                            <button id="profile-button"
                                class="flex items-center p-2 text-white bg-blue-500 rounded-full hover:bg-blue-600 transition"
                                onclick="toggleDropdown('dropdown-profile')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-6 w-6">
                                    <path fill-rule="evenodd"
                                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- Dropdown Profile -->
                            <div id="dropdown-profile"
                                class="hidden absolute right-0 mt-5 bg-white shadow-lg rounded-md text-sm z-50 min-w-[250px]">
                                <div class="px-4 py-2 border-b">
                                    <h1 class="text-gray-800 font-bold break-words">PROFILE</h1>
                                </div>
                                <div class="px-4 py-2 text-gray-600">
                                    <p class="break-words">Nama: {{ Auth::user()->name }}</p>
                                    <p class="break-words">Email: {{ Auth::user()->email }}</p>
                                </div>
                                <form action="{{ route('logout') }}" method="POST" class="px-4 py-2">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex items-center justify-center px-3 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6-4v8" />
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>

    <script>
        const navbar = document.getElementById("navbar");
        const initialNavOffset = navbar.offsetTop; // Posisi awal navbar

        window.addEventListener("scroll", () => {
            if (window.scrollY > initialNavOffset) {
                navbar.classList.add("fixed", "top-2", "left-18", "w-[94%]", "border-2", "z-20");
                navbar.classList.remove("shadow-lg"); // Hilangkan border radius saat fixed
            } else {
                navbar.classList.remove("fixed", "top-2", "left-18", "w-[94%]", "border-2", "z-20");
                navbar.classList.add("shadow-lg"); // Tambahkan kembali border radius saat di atas
            }
        });
    </script>
    {{-- <script>
        // Toggle dropdown visibility on button click
        function toggleDropdown() {
            const dropdown = document.getElementById("dropdownMenu");
            if (dropdown) {
                dropdown.classList.toggle("hidden");
                console.log("Dropdown toggled:", dropdown.classList.contains("hidden") ? "Hidden" : "Visible");
            } else {
                console.error("Dropdown element not found!");
            }
        }
        // Close dropdown if clicking outside of it
        document.addEventListener("click", function(event) {
            const dropdown = document.getElementById("dropdownMenu");
            const userDropdownButton = document.getElementById("userDropdown");

            if (!dropdown.classList.contains("hidden") && !dropdown.contains(event.target) && !userDropdownButton
                .contains(event.target)) {
                dropdown.classList.add("hidden");
            }
        });
    </script> --}}

    <!-- Sidebar Toggle Script -->
    <script>
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('hidden');
        });
    </script>
    <script>
        const sidebar = document.querySelector("aside");
        const maxSidebar = document.querySelector(".max")
        const miniSidebar = document.querySelector(".mini")
        const roundout = document.querySelector(".roundout")
        const maxToolbar = document.querySelector(".max-toolbar")
        const logo = document.querySelector('.logo')
        const content = document.querySelector('.content')
        const moon = document.querySelector(".moon")
        const sun = document.querySelector(".sun")



        function openNav() {
            if (sidebar.classList.contains('-translate-x-48')) {
                // max sidebar
                sidebar.classList.remove("-translate-x-48")
                sidebar.classList.add("translate-x-none")
                maxSidebar.classList.remove("hidden")
                maxSidebar.classList.add("flex")
                miniSidebar.classList.remove("flex")
                miniSidebar.classList.add("hidden")
                maxToolbar.classList.add("translate-x-0")
                maxToolbar.classList.remove("translate-x-24", "scale-x-0")
                logo.classList.remove("ml-12")
                content.classList.remove("ml-12")
                content.classList.add("ml-12", "md:ml-60")
            } else {
                // mini sidebar
                sidebar.classList.add("-translate-x-48")
                sidebar.classList.remove("translate-x-none")
                maxSidebar.classList.add("hidden")
                maxSidebar.classList.remove("flex")
                miniSidebar.classList.add("flex")
                miniSidebar.classList.remove("hidden")
                maxToolbar.classList.add("translate-x-24", "scale-x-0")
                maxToolbar.classList.remove("translate-x-0")
                logo.classList.add('ml-12')
                content.classList.remove("ml-12", "md:ml-60")
                content.classList.add("ml-12")

            }

        }
    </script>

    <script>
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            dropdown.classList.toggle('hidden');
        }
    </script>
    {{-- <script>
        function toggleDropdown() {
            const dropdown = document.getElementById("dropdownMenu");
            if (dropdown.classList.contains("invisible")) {
                dropdown.classList.remove("opacity-0", "invisible");
                dropdown.classList.add("opacity-100", "visible");
            } else {
                dropdown.classList.add("opacity-0", "invisible");
                dropdown.classList.remove("opacity-100", "visible");
            }
        }
    </script> --}}
    <!-- Tambahkan script ini di file Blade -->
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'warning', // atau 'error', 'warning', 'info'
                title: 'Oops...',
                text: '{{ session('error') }}',
                background: '#f0f9ff', // Warna background pop-up
                color: '#1a202c', // Warna teks
                confirmButtonColor: '#3b82f6', // Warna tombol konfirmasi
            });
        </script>
    @endif
</body>

</html>
