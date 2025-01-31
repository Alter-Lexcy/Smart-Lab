<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo31/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 14:27:54 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <link rel="icon" type="image/png" href="{{ asset('image/logo.png') }}">
    <title>Smart-LAB</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta name="csrf-token" content="8IMVNabevkMVEFpvO472s41XBcvpCVja5sJxIXQO">
    <meta property="og:description" content="Improve your skill with hummatech internship.">

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    {{-- <link href="https://class.hummatech.com/user-assets/plugins/global/plugins.bundle.css" rel="stylesheet"
        type="text/css" /> --}}
    <link href="https://class.hummatech.com/user-assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    {{-- <link href="https://class.hummatech.com/user-assets/plugins/custom/datatables/datatables.bundle.css"
        rel="stylesheet" type="text/css" /> --}}

    {{-- flowbite --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Link Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-sidebar-stacked="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->

    <x-navbarsiswa></x-navbarsiswa>

    <div class="flex flex-col items-center justify-center h-[500px] p-10">
        <h1 class="text-4xl font-bold text-center mb-20 text-blue-800">Pilih Materi Sesuai Kelas!</h1>
        <div class="flex gap-10">
            <a href="/historimateri"
                class="card relative flex flex-col justify-center items-center text-blue-800 w-[268px] h-[184px] rounded-xl p-5 transition-all duration-300 ease-in-out shadow-md hover:scale-105 hover:bg-gray-500 bg-cover bg-center bg-[url('/image/bg-card-materi.svg')]">
                <!-- Icon X dengan background bulat -->
                <div
                    class="absolute top-6 left-1/2 transform -translate-x-1/2 bg-blue-500 text-white rounded-full w-12 h-12 flex items-center justify-center text-xl font-bold">
                    X
                </div>
                <div class="flex flex-col mt-5 items-center justify-center h-full">
                    <div class="text-4xl font-bold">Kelas 10</div>
                </div>
            </a>

            <a href="/historimateri"
                class="card relative flex flex-col justify-center items-center text-blue-800 w-[268px] h-[184px] rounded-xl p-5 transition-all duration-300 ease-in-out shadow-md hover:scale-105 hover:bg-gray-500 bg-cover bg-center bg-[url('/image/bg-card-materi.svg')]">
                <!-- Icon X dengan background bulat -->
                <div
                    class="absolute top-6 left-1/2 transform -translate-x-1/2 bg-blue-500 text-white rounded-full w-12 h-12 flex items-center justify-center text-xl font-bold">
                    XI
                </div>
                <div class="flex flex-col mt-5 items-center justify-center h-full">
                    <div class="text-4xl font-bold">Kelas 11</div>
                </div>
            </a>

            <a href="/historimateri"
                class="card relative flex flex-col justify-center items-center text-blue-800 w-[268px] h-[184px] rounded-xl p-5 transition-all duration-300 ease-in-out shadow-md hover:scale-105 hover:bg-gray-500 bg-cover bg-center bg-[url('/image/bg-card-materi.svg')]">
                <!-- Icon X dengan background bulat -->
                <div
                    class="absolute top-6 left-1/2 transform -translate-x-1/2 bg-blue-500 text-white rounded-full w-12 h-12 flex items-center justify-center text-xl font-bold">
                    XII
                </div>
                <div class="flex flex-col mt-5 items-center justify-center h-full">
                    <div class="text-4xl font-bold">Kelas 12</div>
                </div>
            </a>
        </div>
    </div>


    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://class.hummatech.com/user-assets/js/scripts.bundle.js"></script>
    {{-- script Modal --}}
    {{-- <script>
        function openModal(modalId) {
            // Tutup semua modal yang terbuka
            const modals = document.querySelectorAll('.tugasModal');
            modals.forEach(modal => modal.classList.add('hidden'));

            // Tampilkan modal yang diinginkan
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
            } else {
                console.error(`Modal dengan ID ${modalId} tidak ditemukan.`);
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
            } else {
                console.error(`Modal dengan ID ${modalId} tidak ditemukan.`);
            }
        }

        function updateFileName(input) {
            const fileNameSpan = document.getElementById(`file-name-${input.id.split('-')[1]}`);
            const fileName = input.files[0]?.name || 'Tidak ada file yang dipilih';
            fileNameSpan.textContent = fileName;
        }

        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'flex'; // Tampilkan modal
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'none'; // Sembunyikan modal
            }
        }
    </script> --}}
    {{-- end script modal --}}

    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"8f0bc3aff833fd88","version":"2024.10.5","r":1,"token":"a20ac1c0d36b4fa6865d9d244f4efe5a","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}}}'
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    {{-- npm flowbite --}}

    <script src="https://cdn.tailwindcss.com"></script>
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo31/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 14:30:13 GMT -->

</html>
