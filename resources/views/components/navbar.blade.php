<style>
    /* Animasi transisi menu */
    .menu {
        transition: background-color 0.3s ease, transform 0.3s ease, padding 0.3s ease;
    }

    /* Menu dalam kondisi di-scroll */
    .menu-scrolled {
        background-color: #000a7b !important;
        transform: scale(1.05);
        padding: 15px 20px;
    }

    /* Menu kembali ke posisi awal */
    .menu-default {
        background-color: #fff !important;
        transform: scale(1);
        padding: 10px 15px;
    }


    /* Tombol "Beranda", "Kelas", "Tugas" */
    .menu-scrolled .text-blue-800 {
        color: white !important;
        transition: color 0.3s ease-in-out;
    }

    .menu-scrolled .text-blue-800:hover {
        color: white !important;
    }

    /* CSS untuk dropdown */
    .menu-scrolled #dropdown-menu {
        background-color: #2379c4 !important;
        transition: background-color 0.3s ease-in-out;
    }

    .menu-scrolled #dropdown-menu a {
        color: white !important;
        transition: color 0.3s ease-in-out;
    }

    .menu-scrolled #dropdown-menu a:hover {
        background-color: lightblue !important;
        transition: background-color 0.3s ease-in-out;
    }
</style>
<nav class="flex items-center px-5 py-3 mt-8 fixed top-0 left-0 right-0 z-modal">
    <!-- Logo -->
    <a href="#" class="absolute left-5 top-1/2 transform -translate-y-1/2 flex-shrink-0">
        <img src="image/logo-smartlab.png" alt="Logo" class="h-auto w-52">
    </a>
    <!-- Menu Tengah -->
    <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <ul class="menu flex space-x-8 bg-white/80 rounded-2xl shadow-lg p-3 px-5">
            <li><a href="#" class="text-blue-800 hover:text-blue-600 font-medium">Beranda</a></li>
            <li class="relative">
                <button id="kelasButton" class="text-blue-800 hover:text-blue-600 font-medium focus:outline-none"
                    onclick="toggleDropdown('dropdown-menu')">
                    Kelas
                </button>
                <div id="dropdown-menu" class="hidden absolute bg-white shadow-md rounded-lg mt-5 w-32 fadeindown">
                    <ul class="py-2">
                        <li><a href="/kelas10" class="block px-4 py-2 hover:bg-blue-100 text-gray-800">Kelas 10</a></li>
                        <li><a href="/kelas11" class="block px-4 py-2 hover:bg-blue-100 text-gray-800">Kelas 11</a></li>
                        <li><a href="/kelas12" class="block px-4 py-2 hover:bg-blue-100 text-gray-800">Kelas 12</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#" class="text-blue-800 hover:text-blue-600 font-medium">Tugas</a></li>
        </ul>
    </div>

    <!-- Sign-in or Profile Button -->
    @guest
        @if (Route::has('login'))
            <a href="/login" id="Login-button"
                class="absolute top-[0.6rem] right-5 flex items-center gap-2 rounded-full transform -translate-y-1/2 px-4 py-2 text-blue-800 bg-white hover:bg-blue-300 transition"
                style="border: 1px solid #7676762f;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                    <path fill-rule="evenodd"
                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="text-lg font-medium">Sign-in</span>
            </a>
        @endif
    @else
        <!-- Profile Button -->
        <a href="#" id="profile-button"
            class="absolute top-[0.6rem] right-5 flex items-center gap-2 rounded-full transform -translate-y-1/2 px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 transition"
            style="border: 1px solid #7676762f;" onclick="toggleDropdown('dropdown-profile')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                <path fill-rule="evenodd"
                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                    clip-rule="evenodd" />
            </svg>
            <span class="text-lg font-medium">
                {{ Auth::user()->name }}
            </span>
        </a>

        <!-- Dropdown Profile -->
        <div id="dropdown-profile"
            class="absolute hidden bg-white shadow-lg rounded-md w-48 top-12 right-6 text-gray-800 text-sm">
            <div class="px-4 py-2 border-b">Email: {{ Auth::user()->email }}</div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full py-2 hover:bg-gray-100">Logout</button>
            </form>
        </div>

    @endguest
</nav>


<script>
    // Optimized scroll detection with smooth animation
    window.addEventListener('scroll', function() {
        const menu = document.querySelector('.menu'); // Selector untuk menu utama

        if (window.scrollY > 0) {
            if (!menu.classList.contains('menu-scrolled')) {
                menu.classList.remove('menu-default'); // Pastikan menu default dihapus
                menu.classList.add('menu-scrolled'); // Tambahkan menu scrolled
            }
        } else {
            if (!menu.classList.contains('menu-default')) {
                menu.classList.remove('menu-scrolled'); // Pastikan menu scrolled dihapus
                menu.classList.add('menu-default'); // Tambahkan menu default
            }
        }
    });
</script>

<script>
    function toggleDropdown(dropdownId) {
        const dropdown = document.getElementById(dropdownId);

        if (dropdown.classList.contains('hidden')) {
            dropdown.classList.remove('hidden'); // Tampilkan dropdown
        } else {
            dropdown.classList.add('hidden'); // Sembunyikan dropdown
        }
    }

    // Klik di luar dropdown untuk menutupnya
    window.addEventListener('click', function(event) {
        const profileButton = document.getElementById('profile-button');
        const profileDropdown = document.getElementById('dropdown-profile');

        if (!profileButton.contains(event.target) && !profileDropdown.contains(event.target)) {
            profileDropdown.classList.add('hidden'); // Sembunyikan dropdown jika klik di luar
        }
    });
</script>
