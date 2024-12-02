<!doctype html>
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
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.10.5/dist/algoliasearch.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- SweetAlert2 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Preline Select CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.min.css">

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

<body class="bg-gray-100 font-sans ">
    <div class="flex h-auto">
        <!-- Sidebar -->
        <aside
            class = "w-60 -translate-x-48 fixed transition transform ease-in-out duration-1000 z-50 flex h-screen bg-[#1E293B] ">
            <!-- open sidebar button -->
            <div
                class = "max-toolbar translate-x-24 scale-x-0 w-full -right-6 transition transform ease-in duration-300 flex items-center justify-between border-4 border-white dark:border-[#0F172A] bg-[#1E293B]  absolute top-2 rounded-full h-12">

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
                <a href="{{route('homeguru')}}" class =  "hover:ml-4 w-[90%] text-white hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
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
                <a href="{{route('materis.index')}}"
                    class ="hover:ml-4 w-[90%] text-white hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 0 0 3 3h15a3 3 0 0 1-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125ZM12 9.75a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H12Zm-.75-2.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H12a.75.75 0 0 1-.75-.75ZM6 12.75a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5H6Zm-.75 3.75a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75ZM6 6.75a.75.75 0 0 0-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-3A.75.75 0 0 0 9 6.75H6Z"
                            clip-rule="evenodd" />
                        <path d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 0 1-3 0V6.75Z"   />
                    </svg>
                    <div>
                        Materi
                    </div>
                </a>
                <a href="{{route('tasks.index')}}"
                    class ="hover:ml-4 w-[90%] text-white hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z"
                            clip-rule="evenodd"  />
                    </svg>
                    <div>
                        Tugas
                    </div>
                </a>
                <a href="{{route('assesments.index')}}"
                    class ="hover:ml-4 w-[90%] text-white hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z"
                            clip-rule="evenodd"  />
                    </svg>
                    <div>
                        Penilaian
                    </div>
                </a>
            </div>
            <!-- MINI SIDEBAR-->
            <div class= "mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)]">
                <button onclick="window.location.href='{{route('homeguru')}}'" class= "hover:ml-4 justify-end pr-3 text-white hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                        <path
                            d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                    </svg>
                </button>
                <button onclick="window.location.href='{{route('materis.index')}}'"
                    class= "hover:ml-4 justify-end pr-3 text-white hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 0 0 3 3h15a3 3 0 0 1-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125ZM12 9.75a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H12Zm-.75-2.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H12a.75.75 0 0 1-.75-.75ZM6 12.75a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5H6Zm-.75 3.75a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75ZM6 6.75a.75.75 0 0 0-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-3A.75.75 0 0 0 9 6.75H6Z"
                            clip-rule="evenodd" />
                        <path d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 0 1-3 0V6.75Z"   />
                    </svg>
                </button>
                <button onclick="window.location.href='{{route('tasks.index')}}'"
                    class= "hover:ml-4 justify-end pr-3 text-white hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z"
                            clip-rule="evenodd"  />
                    </svg>
                </button>
                <button onclick="window.location.href='{{route('assesments.index')}}'"
                    class= "hover:ml-4 justify-end pr-3 text-white hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z"
                            clip-rule="evenodd"  />
                    </svg>
                </button>
            </div>

        </aside>

        <!-- Page Content  -->
        <div class="flex-1 p-4 ml-14">
            <nav id="navbar"
                class="flex items-center pb-4 justify-between bg-white shadow-sm border rounded-xl z-10 transition-all duration-300">
                <!-- Search Input -->
                <form action="{{ route('search') }}" method="GET" class="flex items-center ml-4 mt-4">
                    <input type="text" name="search" placeholder="Search..."
                        class="w-64 p-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300" />
                    <button type="submit" class="ml-2 p-2 bg-blue-300 text-white rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24">
                            <path fill="black"
                                d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14" />
                        </svg>
                    </button>
                </form>

                <div class="ml-auto relative flex mt-3">
                    <!-- Inbox Icon Button -->
                    <button class="mr-4 border-2 rounded-lg p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                        </svg>
                    </button>

                    <!-- User Icon Button -->
                    <button id="userDropdown" onclick="toggleDropdown()" class="text-gray-700 mr-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-8 border-2 rounded-full">
                            <path fill-rule="evenodd"
                                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- User Profile Dropdown -->
                    <div class="relative">
                        <div id="dropdownMenu"
                            class="opacity-0 invisible transition-opacity duration-300 absolute right-0 mt-14 w-96 bg-white rounded-lg shadow-lg z-50">
                            <div class="py-2 px-4">
                                <h5 class="text-xl mt-2 ml-2 font-semibold">User Profile</h5>
                            </div>
                            <div class="flex align-items-center pt-5 mx-5 border-bottom">
                                <img src="https://pkl.hummatech.com/user.webp" class="rounded-3xl" width="80"
                                    height="80" alt="">
                                <div class="ms-3">
                                    <h5 class="mb-1 font-medium"><span
                                            class="uppercase">{{ Auth::user()->name }}</span>
                                    </h5>
                                    @foreach (Auth::user()->getRoleNames() as $role)
                                        <span class="mb-2 text-md">{{ $role }}</span>
                                    @endforeach
                                    <p class="mt-1 text-sm flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                        </svg>
                                        <span class="text-sm">{{ Auth::user()->email }}</span>
                                    </p>
                                </div>
                            </div>

                            <!-- Logout Button -->
                            <div class="grid p-2 text-center border-2 rounded-md  border-blue-200 my-4 mx-5">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <script>
                const navbar = document.getElementById("navbar");
                const initialNavOffset = navbar.offsetTop; // Posisi awal navbar

                window.addEventListener("scroll", () => {
                    if (window.scrollY > initialNavOffset) {
                        navbar.classList.add("fixed", "top-2", "left-18", "w-[93%]", "border-2", "z-10");
                        navbar.classList.remove("shadow-lg"); // Hilangkan border radius saat fixed
                    } else {
                        navbar.classList.remove("fixed", "top-2", "left-18", "w-[93%]", "border-2", "z-10");
                        navbar.classList.add("shadow-lg"); // Tambahkan kembali border radius saat di atas
                    }
                });
            </script>
            <script>
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
            </script>

            @yield('content')
        </div>
    </div>

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
    </script>
</body>

</html>
