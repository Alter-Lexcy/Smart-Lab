<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('image/logo.png') }}">
    <title>Smart-LAB</title>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="style/beranda.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="navbar-container">
        <x-navbar></x-navbar>
    </div>

    <section class="h-screen"
        style="background: url('image/bc atas.svg') no-repeat center center; background-size: cover;">
        <div class="absolute text-white font-poppins text-5xl font-bold text-center">
            <h1 class="mb-3">Platform LMS gratis yang</h1>
            <h1 class="mb-3">membuat belajar lebih menarik</h1>
            <p
                style="
                background-color: #2765e0;
                border-radius: 10px;
                color: #ffffff;
                text-align: center;
                font-family: Poppins;
                font-size: 23px;
                font-style: normal;
                font-weight: 600;
                line-height: 45px; /* 225% */">
                Akses materi belajar interaktif kapan saja, di mana saja.
            </p>

            <div style="position: relative; bottom: 50px; margin-top: 100px">
                <a href="/register" type="button"
                    class="text-white text-xl bg-blue-500 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full px-16 py-3 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-8">Daftar</a>
                <a href="/login" type="button"
                    class="text-white text-xl bg-blue-500 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full px-16 py-3 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-8">Masuk</a>
            </div>
        </div>

        <div style="position: relative; z-index: 2; width: 500px; right: 250px; top: 150px">
            <img src="image/orang wedok.svg" alt="orangwedok">
        </div>

        <div style="position: relative; z-index: 2; width: 500px; left: 300px; top:150px">
            <img src="image/element laki.svg" alt="wonglanang">
        </div>
    </section>

    <div class="jumlah-container">
        <img src="image/jumlah.svg" alt="Jumlah Pengguna" class="jumlah-gambar">
        <div class="jumlah-teks">
            <div class="jumlahsiswa">
                <h1>+5jt</h1>
                <p>Siswa Bergabung</p>
            </div>
            <div class="jumlahguru">
                <h1>+40</h1>
                <p>Guru Aktif</p>
            </div>
        </div>
    </div>

    <section class="h-screen"
        style="background: url('image/landing 2.svg') no-repeat center center; background-size: cover; position: relative;">

        <!-- Title above the slider -->
        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 pt-36 z-50">
            <h1 class="text-white font-bold text-4xl text-center" style="white-space: nowrap;">
                KEUNGGULAN MENGGUNAKAN SMART-LAB
            </h1>
        </div>

        <div id="default-carousel" class="relative w-full" style="margin-inline: 150px;" data-carousel="slide">
            <!-- Carousel wrapper with border-radius -->
            <div class="relative overflow-hidden border-md shadow-lg"
                style="height: 450px; border-radius: 30px; top: 100px">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="image/1.png"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        style="border-radius: 30px" alt="Slide1">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="image/2.png"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        style="border-radius: 30px" alt="Slide2">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="image/3.png"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        style="border-radius: 30px" alt="Slide3">
                </div>
            </div>

            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 left-1/2 space-x-3 rtl:space-x-reverse" style="margin-top: 50px">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
            </div>


            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 pt-52 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-400 hover:bg-blue-700 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 pt-52 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-400 hover:bg-blue-700 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </section>
</body>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</html>
