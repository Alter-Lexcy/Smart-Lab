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
<style>
    @keyframes floating {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-20px);
        }

        100% {
            transform: translateY(0);
        }
    }

    .floating {
        animation: floating 3s ease-in-out infinite;
    }

    .floating-delay {
        animation: floating 3s ease-in-out infinite;
        animation-delay: 1s;
        /* Delay 1.5 detik supaya tidak barengan */
    }

    .image-container {
        position: relative;
        z-index: 2;
        width: 500px;
    }

    .image-wedok {
        right: 250px;
        top: 150px;
        position: relative;
    }

    .image-laki {
        left: 300px;
        top: 150px;
        position: relative;
    }
</style>

<body>
    <div class="navbar-container">
        <x-navbar></x-navbar>
    </div>

    <!-- SECTION 1 -->
    <section class="h-screen"
        style="background: url('image/bc atas.svg') no-repeat center center; background-size: cover;">
        <div class="absolute text-white font-poppins text-5xl font-bold text-center w-full">
            <h1 class="mb-3">Platform LMS gratis yang</h1>
            <h1 class="mb-3">membuat belajar lebih menarik</h1>
            <p
                style="
        display: inline-block;
        padding-inline: 20px;
        padding-top: 1px;
        padding-bottom: 1px;
        background-color: #2765e0;
        border-radius: 10px;
        color: #ffffff;
        font-size: 23px;
        font-weight: 600;
        line-height: 45px;">
                Akses materi belajar interaktif kapan saja, di mana saja.
            </p>

            <div class="mt-12 flex justify-center gap-5">
                <a href="/register"
                    class="relative overflow-hidden text-gray-500 text-xl bg-gray-50 font-medium rounded-xl px-16 py-3 transition-colors duration-300 ease-in-out
                    before:absolute before:inset-0 before:w-0 before:bg-blue-800 before:rounded-xl before:transition-all before:duration-300 before:ease-in-out
                    hover:text-white hover:before:w-full">
                    <span class="relative z-10">Daftar</span>
                </a>
                <a href="/login"
                    class="relative overflow-hidden text-gray-500 text-xl bg-gray-50 font-medium rounded-xl px-16 py-3 transition-colors duration-300 ease-in-out
                    before:absolute before:inset-0 before:w-0 before:bg-blue-800 before:rounded-xl before:transition-all before:duration-300 before:ease-in-out
                    hover:text-white hover:before:w-full">
                    <span class="relative z-10">Masuk</span>
                </a>
            </div>
        </div>

        <div class="image-container image-wedok floating">
            <img src="image/orang wedok.svg" alt="orangwedok">
        </div>

        <div class="image-container image-laki floating-delay">
            <img src="image/element laki.svg" alt="wonglanang">
        </div>
    </section>

    <!-- BAGIAN JUMLAH GURU & SISWA (DIPOSISIKAN DI ANTARA SECTION 1 & 2) -->
    <div class="jumlah"
        style="position: absolute; top: 90vh; left: 50%; transform: translateX(-50%); display: flex; justify-content: center; align-items: center; flex-wrap: wrap; width: 40%; max-width: 600px; padding: 20px; background: rgba(255, 255, 255); border-radius: 20px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); text-align: center; z-index: 10;">

        <div class="jumlah-teks" style="display: flex; justify-content: center; width: 100%; gap: 20px;">
            <div class="jumlahsiswa" style="margin: 10px; display: flex; align-items: center; justify-content: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 256 256"
                    style="margin-right: 10px; color: #2765e0;">
                    <path fill="currentColor"
                        d="m227.79 52.62l-96-32a11.85 11.85 0 0 0-7.58 0l-96 32A12 12 0 0 0 20 63.37a6 6 0 0 0 0 .63v80a12 12 0 0 0 24 0V80.65l23.71 7.9a67.92 67.92 0 0 0 18.42 85A100.36 100.36 0 0 0 46 209.44a12 12 0 1 0 20.1 13.11C80.37 200.59 103 188 128 188s47.63 12.59 61.95 34.55a12 12 0 1 0 20.1-13.11a100.36 100.36 0 0 0-40.18-35.92a67.92 67.92 0 0 0 18.42-85l39.5-13.17a12 12 0 0 0 0-22.76Zm-99.79-8L186.05 64L128 83.35L70 64ZM172 120a44 44 0 1 1-81.06-23.71l33.27 11.09a11.9 11.9 0 0 0 7.58 0l33.27-11.09A43.85 43.85 0 0 1 172 120" />
                </svg>
                <div>
                    <h1 style="font-size: 2rem; font-weight: bold; color: #2765e0;">+5jt</h1>
                    <p style="font-size: 1.2rem; color: #333;">Siswa Bergabung</p>
                </div>
            </div>
            <div class="jumlahguru" style="margin: 10px; display: flex; align-items: center; justify-content: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"
                    style="margin-right: 10px; color: #2765e0;">
                    <path fill="currentColor"
                        d="M20 17a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H9.46c.35.61.54 1.3.54 2h10v11h-9v2m4-10v2H9v13H7v-6H5v6H3v-8H1.5V9a2 2 0 0 1 2-2zM8 4a2 2 0 0 1-2 2a2 2 0 0 1-2-2a2 2 0 0 1 2-2a2 2 0 0 1 2 2" />
                </svg>
                <div>
                    <h1 style="font-size: 2rem; font-weight: bold; color: #2765e0;">+40</h1>
                    <p style="font-size: 1.2rem; color: #333;">Guru Aktif</p>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 2 -->
    <section class="h-screen bg-cover bg-center relative" style="background-image: url('image/landing 2.svg');">

        <!-- Title above the slider -->
        <div class="absolute justify-center top-28 z-50">
            <h1 class="text-white font-bold text-4xl text-center font-poppins whitespace-nowrap">
                KEUNGGULAN MENGGUNAKAN SMART-LAB
            </h1>
        </div>

        <div id="default-carousel" class="relative w-full mx-12" data-carousel="slide">
            <!-- Carousel wrapper with border-radius -->
            <div class="relative overflow-hidden border-md shadow-lg rounded-3xl"
                style="height: 450px; margin-top: 100px;">
                <!-- Item 1 -->
                <div class="duration-700 ease-in-out opacity-0 absolute inset-0 w-full h-full object-cover rounded-3xl"
                    data-carousel-item style="transition: opacity 1s ease;">
                    <img src="image/1.png" class="w-full h-full object-cover rounded-3xl" alt="Slide1">
                </div>
                <!-- Item 2 -->
                <div class="duration-700 ease-in-out opacity-0 absolute inset-0 w-full h-full object-cover rounded-3xl"
                    data-carousel-item style="transition: opacity 1s ease;">
                    <img src="image/2.png" class="w-full h-full object-cover rounded-3xl" alt="Slide2">
                </div>
                <!-- Item 3 -->
                <div class="duration-700 ease-in-out opacity-0 absolute inset-0 w-full h-full object-cover rounded-3xl"
                    data-carousel-item style="transition: opacity 1s ease;">
                    <img src="image/3.png" class="w-full h-full object-cover rounded-3xl" alt="Slide3">
                </div>
            </div>

            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 transform -translate-x-1/2 left-1/2 mt-8">
                <button type="button" class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100"
                    data-carousel-slide-to="2"></button>
            </div>

            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 left-0 pt-52 z-30 flex items-center justify-center h-full px-4 cursor-pointer group"
                data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-400 hover:bg-blue-700">
                    <svg class="w-4 h-4 text-white" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 right-0 pt-52 z-30 flex items-center justify-center h-full px-4 cursor-pointer group"
                data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-400 hover:bg-blue-700">
                    <svg class="w-4 h-4 text-white" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
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
        <div style="position: absolute; text-align: center; color: rgb(0, 0, 177); top: 70px;">
            <h1
                style="font-size: 3.5rem; font-weight: bold; font-family: poppins; padding: 10px; padding-bottom: 50px">
                Ayo berkembang <br>bersama Smart-LAB!</h1>
            {{-- <p style="font-size: 1.5rem; margin-bottom: 50px;">Bergabunglah bersama Smart-LAB dan raih prestasimu
                setinggi langit</p> --}}
            <a href="{{ route('register') }}"
                style="display: inline-block; padding: 15px 70px; background-color: #007bff; color: white; text-decoration: none; border-radius: 10px; font-size: 1rem; font-weight: bold;">
                Daftar Sekarang
            </a>
        </div>

        <!-- Footer -->
        <footer style="position: absolute; bottom: 0px; width: 100%; padding: 20px; color: white;">
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

<script>
    function animateNumber(element, start, end, duration) {
        let range = end - start;
        let current = start;
        let increment = range / (duration / 16); // 16ms per frame (60fps)
        let timer = setInterval(function() {
            current += increment;
            if (current >= end) {
                current = end;
                clearInterval(timer);
            }
            element.innerText = '+' + Math.floor(current);
        }, 16);
    }

    document.addEventListener("DOMContentLoaded", function() {
        let siswaElement = document.querySelector(".jumlahsiswa h1");
        let guruElement = document.querySelector(".jumlahguru h1");

        animateNumber(siswaElement, 1, 50000, 2000); // dari 1 ke 5 juta dalam 2 detik
        animateNumber(guruElement, 1, 40, 2000); // dari 1 ke 40 dalam 2 detik
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

<script src="https://unpkg.com/@tailwindcss/browser@4"></script>

</html>
