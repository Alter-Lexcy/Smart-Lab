<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parallax responsive landing page</title>

    <link rel="stylesheet" href="style/styles.css">
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
    <!-- ICONS BOXICONS -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @keyframes fadeindown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fadeindown {
            animation: fadeindown 0.3s ease-in-out;
        }
    </style>

</head>

<body>
    <!-- ===== HEADER =====-->
    <header class="l-header">
        <x-navbar></x-navbar>
    </header>

    <main>
        <!-- ===== HOME =====-->
        <div class="home">

            <div class="parallax home__parallax home__parallax-img1" data-rellax-speed="-7"></div>
            <div class="parallax home__parallax home__parallax-img2" data-rellax-speed="-5"></div>
            <div class="parallax home__parallax home__parallax-img3" data-rellax-speed="-3"></div>
            <div class="parallax home__parallax home__parallax-img4" data-rellax-speed="0"></div>

            <h1 class="parallax home__title relative font-poppins" data-rellax-speed="-6">SMART-LAB</h1>
            <span class="parallax home__subtitle" data-rellax-speed="-5">Smart People, Smart Learning</span>

            <div class="home__scroll">
                <a href="#section"><i class='bx bx-mouse'></i></a>
            </div>
        </div>
        <div class="section">
            <div class="section__content">
                <div class="section__image">
                    <dotlottie-player src="https://lottie.host/2034ccc6-3963-4f92-8890-bca04286bec5/DRpkfvWfZ3.json"
                        background="transparent" speed="1" style="width: 100%; height: 300px;" loop autoplay>
                    </dotlottie-player>
                </div>
                <div class="section__heading">
                    <h2 class="section__title">Smart-LAB</h2>
                    <p class="section__text">
                        Smart-LAB adalah platform e-learning inovatif yang dirancang untuk memberikan pengalaman belajar
                        yang interaktif dan menyeluruh bagi pelajar dan profesional. Fokusnya adalah pada pengembangan
                        keterampilan praktis dan pemahaman mendalam di berbagai bidang.
                    </p>
                </div>
            </div>
        </div>
        <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>


        <!-- component card -->
        <div class="section__heading text-center">
            <h1 class="section__subtitle">KEUNGGULAN MENGGUNAKAN SMART-LAB</h1>
        </div>

        <div class="section__cards">
            <!-- 1 card -->
            <div class="card">
                <div class="card__icon bg-pink-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <div class="card__content">
                    <p class="card__title">Belajar Kapanpun dan Dimanapun</p>
                    <div class="card__divider"></div>
                    <p class="card__text">Dengan Smart-LAB, Anda dapat belajar kapan saja dan dimana saja yang kamu mau.
                    </p>
                </div>
            </div>

            <!-- 2 card -->
            <div class="card">
                <div class="card__icon bg-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                    </svg>
                </div>
                <div class="card__content">
                    <p class="card__title">Pembelajaran Yang Fleksibel</p>
                    <div class="card__divider"></div>
                    <p class="card__text">Mempermudah sistem belajar mengajar dengan melalui sistem pembelajaran online.
                    </p>
                </div>
            </div>

            <!-- 3 card -->
            <div class="card">
                <div class="card__icon bg-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                </div>
                <div class="card__content">
                    <p class="card__title">Mempermudah Sistem Belajar Mengajar</p>
                    <div class="card__divider"></div>
                    <p class="card__text">Sistem belajar mengajar yang fleksibel dan mudah diakses bagi guru dan siswa.
                    </p>
                </div>
            </div>

            <!-- 4 card -->
            <div class="card">
                <div class="card__icon bg-yellow-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 10.559a55.391 55.391 0 0 1 5.25 1.766v3.675m0 0a.75.75 0 1 0 1.5 0m0 0v-.551a57.797 57.797 0 0 0 2.017-5.527c-.943-.49-1.979-.913-3.016-1.23m0 0V8.294" />
                    </svg>
                </div>
                <div class="card__content">
                    <p class="card__title">Fleksibilitas Pembelajaran</p>
                    <div class="card__divider"></div>
                    <p class="card__text">Membuka akses kepada siapa saja untuk belajar dan mengembangkan
                        keterampilannya.</p>
                </div>
            </div>
        </div>
        <div
            class="flex flex-col md:flex-row items-center justify-between bg-gradient-to-r from-cyan-100 to-cyan-200 p-8 rounded-lg shadow-lg mt-10 gap-6">
            <!-- Mascot Image -->
            <div class="w-full md:w-1/3 flex justify-center">
                <img src="image/mascot sma.png" alt="mascot-sma"
                    class="w-2/3 md:w-full rounded-lg hover:scale-105 transform transition duration-300">
            </div>

            <!-- Call-to-Action Section -->
            <div class="text-center md:text-left flex flex-col items-center md:items-start w-full md:w-2/3">
                <h1 class="text-3xl md:text-4xl font-bold text-blue-800 mb-4">
                    Ayo daftar sekarang juga!
                </h1>
                <p class="text-lg text-blue-600 mb-6">
                    Gabung bersama kami dan raih masa depan yang cerah!
                </p>

                <!-- Sign-in Button -->
                <a href="/register" id="register-button"
                    class="flex items-center gap-2 px-6 py-3 text-white bg-blue-600 hover:bg-blue-700 rounded-full shadow-lg transition transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                        <path fill-rule="evenodd"
                            d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-lg font-medium">Sign-up</span>
                </a>
            </div>
        </div>



        <!-- component -->
        <x-footer></x-footer>
    </main>

    <!-- RELLAX JS -->
    <script src="assets/js/rellax.min.js"></script>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"></script>

    <!-- SCROLL REVEAL -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- MAIN JS -->
    <script src="assets/js/main.js"></script>

    <script>
        window.onload = function() {
          // Pastikan posisi halaman berada di atas saat halaman dimuat
          window.scrollTo(0, 0);

          // Nonaktifkan pengguliran dengan menyembunyikan overflow pada body
          document.body.style.overflow = "hidden";

          // Setel timer 2 detik
          setTimeout(() => {
            // Aktifkan kembali pengguliran
            document.body.style.overflow = "auto";
          }, 3000); // 2000ms = 2 detik
        };
      </script>



</body>

</html>
