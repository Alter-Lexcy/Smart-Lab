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

            <h1 class="parallax home__title relative" data-rellax-speed="-6">SMART-LAB</h1>
            <span class="parallax home__subtitle" data-rellax-speed="-5">Smart People, Smart Learning</span>

            <div class="home__scroll">
                <a href="#section"><i class='bx bx-mouse'></i></a>
            </div>
        </div>

        <!-- ===== SECTION =====-->
        <section class="l-section" id="section">
            <div class="section">
                <div class="section__data">
                    <h2 class="section__title">Smart-LAB</h2>
                    <p class="section__text">Smart-LAB adalah platform e-learning inovatif yang dirancang untuk
                        memberikan pengalaman belajar yang interaktif dan menyeluruh bagi pelajar dan profesional.
                        Dengan fokus pada pengembangan keterampilan praktis dan pemahaman mendalam di berbagai bidang
                    </p>
                </div>

                <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
                <dotlottie-player src="https://lottie.host/2034ccc6-3963-4f92-8890-bca04286bec5/DRpkfvWfZ3.json"
                    background="transparent" speed="1"
                    style="width: 100rem; height: 300px; margin-bottom: 8    `0px" loop autoplay></dotlottie-player>
            </div>
        </section>

        <!-- component card -->
        <div judul-card class="relative text-center text-4xl font-bold bottom-28">
            <h1>KEUNGGULAN MENGGUNAKAN SMART-LAB</h1>
        </div>

        <div class="flex items-center justify-center">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">
                <!-- 1 card -->
                <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl" style="border: 1px solid #7676762f;">
                    <div
                        class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-pink-500 left-4 -top-6">
                        <!-- svg  -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <div class="mt-8">
                        <p class="text-l font-semibold my-2">Belajar Kapanpun dan Dimanapun</p>
                        <div class="border-t-2"></div>

                        <div class="flex space-x-2 text-gray-600 text-sm py-3">
                            <p>Dengan Smart-LAB , Anda dapat belajar kapan saja dan dimana saja yang kamu mau.</p>
                        </div>
                    </div>
                </div>

                <!-- 2 card -->
                <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl" style="border: 1px solid #7676762f;">
                    <div
                        class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-green-500 left-4 -top-6">
                        <!-- svg  -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                          </svg>

                    </div>
                    <div class="mt-8">
                        <p class="text-l font-semibold my-2">Pembelajaran Yang Fleksibel</p>
                        <div class="border-t-2 "></div>

                        <div class="flex space-x-2 text-gray-600 text-sm py-3">
                            <p>Mempermudah sistem belajar mengajar dengan melaui sistem pembelajaran online.</p>
                        </div>
                    </div>
                </div>

                <!-- 3 card -->
                <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl" style="border: 1px solid #7676762f;">
                    <div
                        class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6">
                        <!-- svg  -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>

                    </div>
                    <div class="mt-8">
                        <p class="text-l font-semibold my-2">Mempermudah Sistem Belajar Mengajar</p>
                        <div class="border-t-2 "></div>

                        <div class="flex space-x-2 text-gray-600 text-sm py-3">
                            <p>SIstem belajar mengajar yang fleksibel dan mudah diakses bagi guru dan siswa.</p>
                        </div>
                    </div>
                </div>

                <!-- 4 card -->
                <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl" style="border: 1px solid #7676762f;">
                    <div
                        class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-yellow-500 left-4 -top-6">
                        <!-- svg  -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>

                    </div>
                    <div class="mt-8">
                        <p class="text-l font-semibold my-2">Guru Berpengalaman dan Profesional</p>
                        <div class="border-t-2 "></div>

                        <div class="flex space-x-2 text-gray-600 text-sm py-3">
                            <p>Smart-LAB Memiliki guru - guru yang berpengalaman dan profesional dalam mengajar.</p>
                        </div>
                    </div>
                </div>
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

</body>

</html>
