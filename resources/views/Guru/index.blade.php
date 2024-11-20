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

        <!-- Page Content  -->
        <div class="flex-1 p-4 ml-14">
            <nav class="flex items-center justify-between bg-white p-4 shadow-lg rounded-lg relative z-10">
                <div class="ml-auto relative flex">
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
                            class="opacity-0 invisible transition-opacity duration-300 absolute right-0 mt-14 w-80 bg-white rounded-lg shadow-lg z-50">
                            <div class="py-2 px-4">
                                <h5 class="text-xl mt-2 ml-2 font-semibold">User Profile</h5>
                            </div>
                            <div class="flex align-items-center pt-5 mx-5 border-bottom">
                                <img src="https://pkl.hummatech.com/user.webp" class="rounded-3xl" width="80"
                                    height="80" alt="">
                                <div class="ms-3">
                                    <h5 class="mb-1 font-medium"><span
                                            class="uppercase">{{ Auth::user()->name }}</span></h5>
                                    {{-- @php
                                        $roles = Auth::user()->getRoleNames()->filter(fn($role) => $role !== 'murid');
                                        $lastRole = $roles->last();
                                    @endphp
                                    <span class="mb-2 text-md">
                                        <span class="badge bg-primary">{{ $lastRole }}</span>
                                    </span> --}}

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
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

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
