<style>
    /* Initial transition for smooth scaling of the menu */
    .menu {
        transition: transform 0.3s ease-in-out, background-color 0.3s ease, color 0.3s ease;
    }

    /* Class to scale and change color when scrolling */
    .menu-scrolled {
        transform: scale(1.05); /* Adjust this value for scaling */
        background-color: #1E40AF; /* Blue background when scrolled */
        color: white; /* White text color when scrolled */
    }

    .menu-scrolled a {
        color: white !important; /* Ensure the text inside links becomes white */
    }
</style>

<nav class="flex items-center px-5 py-3 mt-8 fixed top-0 left-0 right-0 z-10">
    <!-- Logo -->
    <a href="#" class="absolute left-5 top-1/2 transform -translate-y-1/2 flex-shrink-0">
        <img src="image/SMART-LAB.png" alt="Logo" class="h-auto w-52">
    </a>

    <!-- Menu Tengah -->
    <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <ul class="menu flex space-x-8 bg-white/80 rounded-2xl shadow-lg p-3 px-5">
            <li><a href="#" class="text-blue-800 hover:text-blue-600 font-medium">Beranda</a></li>
            <li><a href="#" class="text-blue-800 hover:text-blue-600 font-medium">Kelas</a></li>
            <li><a href="#" class="text-blue-800 hover:text-blue-600 font-medium">Materi</a></li>
            <li><a href="#" class="text-blue-800 hover:text-blue-600 font-medium">Tugas</a></li>
        </ul>
    </div>

    <!-- User Icon Button -->
    <button id="userDropdown" onclick="toggleDropdown()" class="absolute right-5 top-1/2 rounded-full transform -translate-y-1/2 text-blue-800">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="h-10 w-10 border-4 border-blue-800 rounded-full hover:bg-white/20">
            <path fill-rule="evenodd"
                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                clip-rule="evenodd" />
        </svg>
    </button>
</nav>

<script>
    // Detect the scroll event and add/remove the class based on scroll position
    window.addEventListener('scroll', function() {
        const menu = document.querySelector('.menu');
        if (window.scrollY > 0) {
            menu.classList.add('menu-scrolled');
        } else {
            menu.classList.remove('menu-scrolled');
        }
    });
</script>
