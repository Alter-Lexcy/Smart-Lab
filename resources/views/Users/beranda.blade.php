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
            <h1 class="text-white font-bold text-4xl text-center" style="white-space: nowrap; font-family: Poppins;">
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
            <div class="absolute z-30 flex -translate-x-1/2 left-1/2 space-x-3 rtl:space-x-reverse"
                style="margin-top: 50px">
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
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </section>
    <section
        style="height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; position: relative; overflow: hidden;">
        <!-- Lingkaran besar di belakang gambar -->
        <div
            style="position: absolute; width: 650px; height: 650px; background-color: #b2ebf2; border-radius: 50%; opacity: 0.8; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); z-index: -10;">
        </div <!-- Gambar utama -->
        <img src="image/Smart-Lab blue.png" style="width: 400px; z-index: 1;" alt="logo">

        <!-- Teks -->
        <p
            style="color: #1e40af; font-weight: 600; font-size: 15px; text-align: center; margin-top: 16px; font-family: 'Poppins', sans-serif; width: 500px; z-index: 1;">
            Smart-LAB adalah platform E-learning inovatif yang dirancang untuk memberikan pengalaman belajar yang
            interaktif
            dan menyeluruh bagi pelajar dan profesional. Fokusnya adalah pada pengembangan keterampilan praktis dan
            pemahaman
            mendalam di berbagai bidang.
        </p>

        <!-- Gambar dekoratif -->
        <img src="image/motif mtk.png" style="position: absolute; top: 200px; left: 50px; width: 200px; opacity: 0.8;"
            alt="Motif MTK">
        <img src="image/motif bangun ruang.png"
            style="position: absolute; bottom: 100px; right: 50px; width: 300px; opacity: 0.8;"
            alt="Motif Bangun Ruang">

        <!-- Lingkaran dekoratif besar -->
        <div
            style="position: absolute; top: 40px; left: 80px; width: 80px; height: 80px; background-color: #81d4fa; border-radius: 50%; opacity: 0.6; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
        </div>
        <div
            style="position: absolute; top: 128px; right: 40px; width: 64px; height: 64px; background-color: #4fc3f7; border-radius: 50%; opacity: 0.5; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
        </div>
        <div
            style="position: absolute; bottom: 80px; left: 160px; width: 96px; height: 96px; background-color: #29b6f6; border-radius: 50%; opacity: 0.4; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
        </div>
        <div
            style="position: absolute; bottom: 40px; right: 112px; width: 48px; height: 48px; background-color: #81d4fa; border-radius: 50%; opacity: 0.7; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
        </div>

        <!-- Lingkaran dekoratif kecil -->
        <div
            style="position: absolute; top: 100px; left: 150px; width: 24px; height: 24px; background-color: #4fc3f7; border-radius: 50%; opacity: 0.8; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
        </div>
        <div
            style="position: absolute; top: 200px; right: 80px; width: 32px; height: 32px; background-color: #81d4fa; border-radius: 50%; opacity: 0.6; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
        </div>
        <div
            style="position: absolute; bottom: 120px; left: 220px; width: 20px; height: 20px; background-color: #29b6f6; border-radius: 50%; opacity: 0.7; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
        </div>
        <div
            style="position: absolute; bottom: 60px; right: 60px; width: 28px; height: 28px; background-color: #4fc3f7; border-radius: 50%; opacity: 0.5; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
        </div>
        <div
            style="position: absolute; top: 60px; right: 160px; width: 16px; height: 16px; background-color: #29b6f6; border-radius: 50%; opacity: 0.9; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
        </div>
    </section>
    <section
        style="height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; position: relative; overflow: hidden;">
        <!-- Gambar Latar -->
        <img src="image/motif bawah landing.png" style="width: 100%; height: 100%; margin-top: 200px;"
            alt="">

        <!-- Konten Teks dan Tombol -->
        <div style="position: absolute; text-align: center; color: rgb(0, 0, 177); top: 150px;">
            <h1 style="font-size: 2.5rem; font-weight: bold;">Ayo berkembang bersama Smart-LAB</h1>
            <p style="font-size: 1rem; margin-bottom: 50px;">Bergabunglah bersama Smart-LAB dan raih prestasimu
                setinggi langit</p>
            <a href="#daftar"
                style="display: inline-block; padding: 15px 30px; background-color: #007bff; color: white; text-decoration: none; border-radius: 30px; font-size: 1rem; font-weight: bold;">
                Daftar Sekarang
            </a>
        </div>

        <!-- Footer -->
        <footer style="position: absolute; bottom: 0; width: 100%; padding: 20px; color: white;">
            <div style="display: flex; justify-content: center; align-items: center; gap: 50px;">
                <!-- Gambar -->
                <div style="flex: 0 0 auto;">
                    <img src="image/Smart-LAB White Logo.png" style="width: 300px;" alt="Logo Smart-LAB">
                </div>

                <!-- Kontainer kolom -->
                <div style="display: flex; flex-wrap: nowrap; gap: 20px;">
                    <!-- Menu Links Column -->
                    <div style="margin-right: 20px;">
                        <h4
                            style="font-weight: bold; margin-bottom: 10px; border-bottom: 2px solid white; padding-bottom: 5px;">
                            Link Menu</h4>
                        <a href="#beranda"
                            style="color: white; display: block; text-decoration: none; margin: 0;">Beranda</a>
                        <a href="#tentang"
                            style="color: white; display: block; text-decoration: none; margin: 0;">Tentang Kami</a>
                        <a href="#kursus"
                            style="color: white; display: block; text-decoration: none; margin: 0;">Kursus</a>
                        <a href="#blog"
                            style="color: white; display: block; text-decoration: none; margin: 0;">Blog</a>
                    </div>

                    <!-- Contact & Support Column -->
                    <div style="margin-right: 20px;">
                        <h4
                            style="font-weight: bold; margin-bottom: 10px; border-bottom: 2px solid white; padding-bottom: 5px;">
                            Bantuan</h4>
                        <a href="#hubungi"
                            style="color: white; display: block; text-decoration: none; margin: 0;">Hubungi</a>
                        <a href="#panduan"
                            style="color: white; display: block; text-decoration: none; margin: 0;">Panduan
                            Pengguna</a>
                        <a href="#bantuan"
                            style="color: white; display: block; text-decoration: none; margin: 0;">Pusat Bantuan</a>
                        <a href="#privasi"
                            style="color: white; display: block; text-decoration: none; margin: 0;">Kebijakan
                            Privasi</a>
                        <a href="#syarat"
                            style="color: white; display: block; text-decoration: none; margin: 0;">Syarat dan
                            Ketentuan</a>
                    </div>

                    <!-- Social Media Column -->
                    <div>
                        <h4
                            style="font-weight: bold; margin-bottom: 10px; border-bottom: 2px solid white; padding-bottom: 5px;">
                            Sosial Media</h4>

                        <!-- Facebook -->
                        <a href="https://facebook.com" target="_blank"
                            style="color: white; display: flex; align-items: center; text-decoration: none; margin: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                fill="currentColor" viewBox="0 0 24 24" style="margin-right: 5px;">
                                <path
                                    d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" />
                            </svg>
                            Facebook
                        </a>

                        <!-- Twitter -->
                        <a href="https://twitter.com" target="_blank"
                            style="color: white; display: flex; align-items: center; text-decoration: none; margin: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                fill="currentColor" viewBox="0 0 24 24" style="margin-right: 5px;">
                                <path
                                    d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z" />
                            </svg>
                            Twitter
                        </a>

                        <!-- Instagram -->
                        <a href="https://instagram.com" target="_blank"
                            style="color: white; display: flex; align-items: center; text-decoration: none; margin: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                fill="currentColor" viewBox="0 0 24 24" style="margin-right: 5px;">
                                <path
                                    d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm10 2H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3ZM12 7.5a4.5 4.5 0 1 1 0 9 4.5 4.5 0 0 1 0-9Zm0 2a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Zm4-2a1 1 0 1 1 0 2 1 1 0 0 1 0-2Z" />
                            </svg>
                            Instagram
                        </a>

                        <!-- Email -->
                        <a href="mailto:example@example.com"
                            style="color: white; display: flex; align-items: center; text-decoration: none; margin: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                fill="currentColor" viewBox="0 0 24 24" style="margin-right: 5px;">
                                <path
                                    d="M3 5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5Zm2.02.01L12 11.007 18.98 5.01H5.02ZM20 7.676l-8 5.999-8-6V19h16V7.676Z" />
                            </svg>
                            Email
                        </a>
                    </div>
                </div>
            </div>
            <p style="margin: 10px 0 0; font-size: 12px; text-align: center; margin-top: 30px">&copy; 2025 Smart-LAB.
                Hak Cipta Dilindungi.</p>
        </footer>
    </section>


</body>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</html>
