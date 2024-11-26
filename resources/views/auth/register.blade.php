<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Smartlab</title>
    <link rel="icon" type="image/png" href="{{ asset('image/logo.png') }}">
    <link rel="stylesheet" href="style/login.css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        .error-message {
            background-color: #ffcccc;
            color: #d9534f;
            border: 1px solid #d9534f;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            margin-top: 5px;
            display: flex;
            align-items: center;
        }

        .error-message i {
            margin-right: 10px;
            font-size: 18px;
        }

    </style>
</head>

<body>
    <div class="login-image">
        <div class="logo-icon">
            <img src="{{ asset('image/SMART-LAB (DARK MODE).png') }}" alt="LOGO SMART-LAB">
        </div>
        <img src="image/background-login.png" alt="register Image">
        <div class="lottie">
            <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

            <dotlottie-player src="https://lottie.host/1d191dd9-3a9f-4cf1-b2ac-a27e3a49a9df/0Nwkk1y9me.json"
                background="transparent" speed="1" style="width: 450px;" loop autoplay></dotlottie-player>
        </div>
    </div>

    <div style="display: flex; flex-direction:column; width: 50%; justify-content:center; align-items:center;">
        <h2>Daftar</h2>
        <h5>Selamat Datang!</h5>
        <p>Buat akun baru dengan mengisi informasi di bawah ini</p>

        <!-- Tabs -->
        <div class="tabs">
            <button class="tab-button active" data-tab="siswa-tab">Siswa</button>
            <button class="tab-button" data-tab="guru-tab">Guru</button>
        </div>

        <!-- Form Register Siswa -->
        <div id="siswa-tab" class="tab-content active">
            <div class="register-form">
                <form action="{{ route('register_murid') }}" method="POST">
                    @csrf
                    <table class="form-table">
                        <!-- Input Nama -->
                        <tr>
                            <td colspan="2">
                                <span style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; width: 100%; max-width: 400px; margin: auto;">
                                    <i class="bx bx-user" style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        placeholder="Nama"
                                        style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                </span>
                            </td>
                        </tr>
                        <!-- Input Email -->
                        <tr>
                            <td colspan="2">
                                <span style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; width: 100%; max-width: 400px; margin: auto;">
                                    <i class="bx bx-envelope" style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        placeholder="Email"
                                        style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                </span>
                            </td>
                        </tr>
                        <!-- Password dan Konfirmasi Password -->
                        <tr>
                            <td colspan="2">
                                <div style="display: flex; gap: 10px; max-width: 400px; margin: auto;">
                                    <span style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; flex: 1;">
                                        <i class="bx bx-lock" style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                        <input
                                            type="password"
                                            id="password"
                                            name="password"
                                            placeholder="Password"
                                            style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                    </span>
                                    <span style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; flex: 1;">
                                        <i class="bx bx-lock-alt" style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                        <input
                                            type="password"
                                            id="password_confirmation"
                                            name="password_confirmation"
                                            placeholder="Konfirmasi Password"
                                            style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type="submit">Daftar Siswa</button></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="link">
                <p>Sudah punya akun? <a href="login">Masuk Sekarang!</a></p>
            </div>
        </div>

        <!-- Form Register Guru -->
        <div id="guru-tab" class="tab-content">
            <div class="register-form">
                <form action="{{ route('register_guru') }}" method="POST">
                    @csrf
                    <table class="form-table">
                        <!-- Input Nama -->
                        <tr>
                            <td colspan="2">
                                <span style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; width: 100%; max-width: 400px; margin: auto;">
                                    <i class="bx bx-user" style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        placeholder="Nama"
                                        style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                </span>
                            </td>
                        </tr>
                        <!-- Input Email -->
                        <tr>
                            <td colspan="2">
                                <span style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; width: 100%; max-width: 400px; margin: auto;">
                                    <i class="bx bx-envelope" style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        placeholder="Email"
                                        style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                </span>
                            </td>
                        </tr>
                        <!-- Input NIP -->
                        <tr>
                            <td colspan="2">
                                <span style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; width: 100%; max-width: 400px; margin: auto;">
                                    <i class="bx bx-id-card" style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                    <input
                                        type="text"
                                        id="nip"
                                        name="NIP"
                                        placeholder="NIP"
                                        style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                </span>
                            </td>
                        </tr>
                        <!-- Password dan Konfirmasi Password -->
                        <tr>
                            <td colspan="2">
                                <div style="display: flex; gap: 10px; max-width: 400px; margin: auto;">
                                    <span style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; flex: 1;">
                                        <i class="bx bx-lock" style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                        <input
                                            type="password"
                                            id="password"
                                            name="password"
                                            placeholder="Password"
                                            style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                    </span>
                                    <span style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; flex: 1;">
                                        <i class="bx bx-lock-alt" style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                        <input
                                            type="password"
                                            id="password_confirmation"
                                            name="password_confirmation"
                                            placeholder="Konfirmasi Password"
                                            style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type="submit">Daftar Guru</button></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="link">
                <p>Belum punya akun? <a href="register">Daftar Sekarang!</a></p>
            </div>
        </div>
    </div>

    <script>
        const tabs = document.querySelectorAll('.tab-button');
        const contents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(btn => btn.classList.remove('active'));
                contents.forEach(content => content.classList.remove('active'));

                tab.classList.add('active');
                document.getElementById(tab.getAttribute('data-tab')).classList.add('active');
            });
        });
    </script>
</body>

</html>
