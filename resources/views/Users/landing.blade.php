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
                <div class="parallax home__parallax home__parallax-img1" data-rellax-speed="-9"></div>
                <div class="parallax home__parallax home__parallax-img2" data-rellax-speed="-7"></div>
                <div class="parallax home__parallax home__parallax-img3" data-rellax-speed="-6"></div>
                <div class="parallax home__parallax home__parallax-img4" data-rellax-speed="-3"></div>

                <h1 class="parallax home__title" data-rellax-speed="-6">Smart-LAB</h1>
                <span class="parallax home__subtitle" data-rellax-speed="-5">Smart People, Smart Learning</span>

                <div class="home__scroll">
                   <a href="#section"><i class='bx bx-mouse'></i></a>
                </div>
            </div>

            <!-- ===== SECTION =====-->
            <section class="l-section" id="section">
                <div class="section">
                    <div class="section__data">
                        <h2 class="section__title">Scaling mountains</h2>
                        <p class="section__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, laboriosam. Esse ipsum culpa laboriosam, totam hic quidem recusandae eos, numquam iusto aliquid expedita est sapiente quaerat inventore voluptatem corporis aliquam.</p>
                    </div>

                    <img src="assets/img/imgm.jpg" alt="" class="section__img">
                </div>
            </section>
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
