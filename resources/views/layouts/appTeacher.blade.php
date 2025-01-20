<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('image/logo.png') }}">
    <title>SmartLab</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="vendor/select2/dist/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])

    <!-- Scripts -->
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.10.5/dist/algoliasearch.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- SweetAlert2 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Preline Select CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.min.css">

    <!-- Preline Select JS -->
    <script src="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

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
    <div class="h-auto">
        <!-- Sidebar -->
        <aside
            class = "w-60 -translate-x-48 fixed transition transform ease-in-out duration-1000 z-50 flex h-screen bg-[#1E293B] ">
            <!-- open sidebar button -->
            <div
                class ="max-toolbar translate-x-24 scale-x-0 w-full -right-6 transition transform ease-in duration-300 flex items-center justify-between border-4 border-white dark:border-[#0F172A] bg-[#1E293B]  absolute top-2 rounded-full h-12">

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
                <a href="{{ route('homeguru') }}"
                    class =  "hover:ml-4 w-[90%] text-white hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
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
                <a href="{{ route('materis.index') }}"
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
                <a href="{{ route('tasks.index') }}"
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
                <a href="{{ route('collections.index') }}"
                    class ="hover:ml-4 w-[90%] text-white hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                        <path fill-rule="evenodd"
                            d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z"
                            clip-rule="evenodd" />
                    </svg>
                    <div>
                        Pengumpulan
                    </div>
                </a>
            </div>
            <!-- MINI SIDEBAR-->
            <div class= "mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)]">
                <button onclick="window.location.href='{{ route('homeguru') }}'"
                    class= "hover:ml-4 justify-end pr-3 text-white hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                        <path
                            d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                    </svg>
                </button>
                <button onclick="window.location.href='{{ route('materis.index') }}'"
                    class= "hover:ml-4 justify-end pr-3 text-white hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 0 0 3 3h15a3 3 0 0 1-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125ZM12 9.75a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H12Zm-.75-2.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H12a.75.75 0 0 1-.75-.75ZM6 12.75a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5H6Zm-.75 3.75a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75ZM6 6.75a.75.75 0 0 0-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-3A.75.75 0 0 0 9 6.75H6Z"
                            clip-rule="evenodd" />
                        <path d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 0 1-3 0V6.75Z"   />
                    </svg>
                </button>
                <button onclick="window.location.href='{{ route('tasks.index') }}'"
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
                <button onclick="window.location.href='{{ route('collections.index') }}'"
                    class= "hover:ml-4 justify-end pr-3 text-white hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                        <path fill-rule="evenodd"
                            d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

        </aside>

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
                                class="badge badge-light-success text-sm">{{ Auth::user()->getRoleNames()->first() }}
                            </span>
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
                                class="hidden absolute right-0 mt-5 bg-white shadow-lg rounded-md text-sm z-10 min-w-[250px]">
                                <div class="px-4 py-2 border-b">
                                    <h1 class="text-gray-800 font-bold break-words">PROFILE</h1>
                                </div>
                                <div class="px-4 py-2 text-gray-600 ">
                                    <p class="break-words font-poppins">Nama: {{ Auth::user()->name }}</p>
                                    <p class="break-words font-poppins">Email: {{ Auth::user()->email }}</p>
                                    <p class="break-words font-poppins">Mata Pembelajaran:
                                        {{ Auth::user()->subject?->name_subject ?? 'kosong' }}</p>
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
        </div>

        <div class="ml-12">
            @yield('content')
        </div>

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

                // Tutup semua dropdown lain
                document.querySelectorAll('[id^="dropdown-opsi-"]').forEach(item => {
                    if (item.id !== dropdownId) {
                        item.classList.add('hidden'); // Tutup dropdown lain
                    }
                });

                // Toggle dropdown yang dipilih
                dropdown.classList.toggle('hidden');
            }
        </script>

        {{-- <script>
            const navbar = document.getElementById("navbar");
            const initialNavOffset = navbar.offsetTop; // Posisi awal navbar

            window.addEventListener("scroll", () => {
                if (window.scrollY > initialNavOffset) {
                    navbar.classList.add("fixed", "top-2", "left-18", "w-[1480px]", "border-2", "z-20");
                    navbar.classList.remove("shadow-lg"); // Hilangkan border radius saat fixed
                } else {
                    navbar.classList.remove("fixed", "top-2", "left-18", "w-[1480px]", "border-2", "z-20");
                    navbar.classList.add("shadow-lg"); // Tambahkan kembali border radius saat di atas
                }
            });
        </script> --}}
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
</body>

</html>
