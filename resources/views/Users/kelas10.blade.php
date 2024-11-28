<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Cards</title>
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            max-width: 1200px;
        }

        .card {
            width: 200px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card h3 {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 0.9rem;
            color: #555;
        }

        .card button {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .card button:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: relative;
            width: 100%;
            bottom: 0;
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
        }

        footer a {
            color: #007bff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <x-navbar></x-navbar>

    <main>
        <body class="bg-gray-50 text-gray-600">
            <div class="mx-auto container flex justify-center py-16 px-4">
                <div class="flex flex-col space-y-8 w-full px-16 max-w-xl">

                    <!-- card -->
                    <div class="bg-gradient-to-tl from-gray-900 to-gray-800 text-white h-56 w-96 p-6 rounded-xl shadow-md">
                        <div class="h-full flex flex-col justify-between">
                            <div class="flex items-start justify-between space-x-4">
                                <div class=" text-xl font-semibold tracking-tigh">
                                    Matematika
                                </div>

                                <div class="inline-flex flex-col items-center justify-center">
                                    <svg class="h-8 w-8" width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2 15V9C2 5.68629 4.68629 3 8 3H16C19.3137 3 22 5.68629 22 9V15C22 18.3137 19.3137 21 16 21H8C4.68629 21 2 18.3137 2 15Z"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                        <path
                                            d="M13 15.5V12.7M15.8571 12.7C16.5714 12.7 18 12.7 18 10.6C18 8.5 16.5714 8.5 15.8571 8.5L13 8.5V12.7M15.8571 12.7C14.7143 12.7 13.4762 12.7 13 12.7M15.8571 12.7L18 15.5"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M11 8.5L8 15.5L5 8.5" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>

                                    <div
                                        class="font-semibold text-white">
                                        wallet
                                    </div>
                                </div>
                            </div>

                            <div
                                class="inline-block w-12 h-8 bg-gradient-to-tl from-yellow-200 to-yellow-100 rounded-md shadow-inner overflow-hidden">
                                <div class="relative w-full h-full grid grid-cols-2 gap-1">
                                    <div class="absolute border border-gray-900 rounded w-4 h-6 left-4 top-1"></div>
                                    <div class="border-b border-r border-gray-900 rounded-br"></div>
                                    <div class="border-b border-l border-gray-900 rounded-bl"></div>
                                    <div class=""></div>
                                    <div class=""></div>
                                    <div class="border-t border-r border-gray-900 rounded-tr"></div>
                                    <div class="border-t border-l border-gray-900 rounded-tl"></div>
                                </div>
                            </div>

                            <div class="">
                                <div class="text-xs font-semibold tracking-tight">
                                    balance
                                </div>

                                <div class="text-2xl font-semibold">
                                    $50
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- notification -->
                    <div class="relative">
                        <div
                            class="absolute right-10 flex space-x-2 items-start bg-white text-gray-900 border-gray-200 shadow-2xl -mt-16 w-72 px-2 py-3 rounded-lg">
                            <div class="flex-initial">
                                <div
                                    class="inline-flex items-center justify-center rounded-lg bg-gradient-tl from-green-400 via-green-400 bg-green-300">
                                    <div class="p-2">
                                        <svg class="h-4 w-4 text-white opacity-90" width="24" height="24" stroke-width="1.5"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path
                                                d="M15 8.5C14.315 7.81501 13.1087 7.33855 12 7.30872M9 15C9.64448 15.8593 10.8428 16.3494 12 16.391M12 7.30872C10.6809 7.27322 9.5 7.86998 9.5 9.50001C9.5 12.5 15 11 15 14C15 15.711 13.5362 16.4462 12 16.391M12 7.30872V5.5M12 16.391V18.5"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-1 inline-flex items-start justify-between">
                                <div>
                                    <h2 class="text-xs font-semibold tracking-tight">Loyalty program</h2>
                                    <p class="text-xs text-gray-500 font-light">You received $5 credit</p>
                                </div>

                                <div class="text-xs text-gray-400">17:15</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        <div class="container">
            <div class="card">
                <h3>Matematika</h3>
                <p>Pelajari konsep dan soal matematika secara mendalam.</p>
                <button>Selengkapnya</button>
            </div>
            <div class="card">
                <h3>IPA</h3>
                <p>Eksplorasi ilmu pengetahuan alam dan eksperimen menarik.</p>
                <button>Selengkapnya</button>
            </div>
            <div class="card">
                <h3>IPS</h3>
                <p>Pahami sejarah, geografi, dan ekonomi dengan mudah.</p>
                <button>Selengkapnya</button>
            </div>
            <div class="card">
                <h3>Kimia</h3>
                <p>Temukan reaksi kimia dan konsep molekul yang menarik.</p>
                <button>Selengkapnya</button>
            </div>
            <div class="card">
                <h3>Fisika</h3>
                <p>Pelajari hukum-hukum alam dan aplikasinya dalam kehidupan.</p>
                <button>Selengkapnya</button>
            </div>
            <div class="card">
                <h3>Sejarah</h3>
                <p>Kenali peristiwa penting dari masa lalu yang membentuk dunia.</p>
                <button>Selengkapnya</button>
            </div>
            <div class="card">
                <h3>Bahasa Indonesia</h3>
                <p>Kuasai tata bahasa dan seni menulis dalam Bahasa Indonesia.</p>
                <button>Selengkapnya</button>
            </div>
            <div class="card">
                <h3>Bahasa Inggris</h3>
                <p>Latih kemampuan berbicara, membaca, dan menulis dalam Bahasa Inggris.</p>
                <button>Selengkapnya</button>
            </div>
            <div class="card">
                <h3>Seni Budaya</h3>
                <p>Jelajahi dunia seni dan budaya dari berbagai daerah.</p>
                <button>Selengkapnya</button>
            </div>
            <div class="card">
                <h3>PPKN</h3>
                <p>Pahami nilai-nilai Pancasila dan kewarganegaraan Indonesia.</p>
                <button>Selengkapnya</button>
            </div>
        </div>
    </main>
    <x-footer></x-footer>
</body>

</html>
