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

    <div
        style="display: flex; flex-direction:column; width: 50%; justify-content:center; align-items:center; padding-top: 40px; padding-bottom: 30px;">
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
            <div class="register-form"
                style="height: 400px; width: 500px; overflow: auto; padding: 20px; box-sizing: border-box;">
                <form action="{{ route('register_murid') }}" method="POST">
                    @csrf
                    <table class="form-table">
                        <!-- Input Nama -->
                        <tr>
                            <td colspan="2">
                                <span
                                    style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; margin: auto;">

                                    <i class="bx bx-user" style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                    <input type="text" id="name" name="name" placeholder="Nama Lengkap Siswa"
                                        style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                </span>
                                @error('name')
                                    <div class="error-message" style="color: #e74c3c; font-size: 12px; margin-top: 5px;">
                                        <i class='bx bx-error-circle'></i>{{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <!-- Input Email -->
                        <tr>
                            <td colspan="2">
                                <span
                                    style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; margin: auto;">
                                    <i class="bx bx-envelope"
                                        style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                    <input type="email" id="email" name="email" placeholder="Email"
                                        style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                </span>
                                @error('email')
                                    <div class="error-message" style="color: #e74c3c; font-size: 12px; margin-top: 5px;">
                                        <i class='bx bx-error-circle'></i>{{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <!-- Password dan Konfirmasi Password -->
                        <tr>
                            <td colspan="2">
                                <div style="display: flex; gap: 10px; margin: auto;">
                                    <span
                                        style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; flex: 1;">
                                        <i class="bx bx-lock"
                                            style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                        <input type="password" id="siswa_password" name="password"
                                            placeholder="Password"
                                            style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                        <i class="bx bx-show" id="toggleSiswaPassword"
                                            style="cursor: pointer; font-size: 16px; padding-left: 10px; margin-right: 10px; color: #666;"></i>
                                    </span>
                                    <span
                                        style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; flex: 1;">
                                        <i class="bx bx-lock-alt"
                                            style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                        <input type="password" id="siswa_password_confirmation"
                                            name="password_confirmation" placeholder="Konfirmasi Password"
                                            style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                        <i class="bx bx-show" id="toggleSiswaPasswordConfirmation"
                                            style="cursor: pointer; font-size: 16px; padding-left: 10px; margin-right: 10px; color: #666;"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <div class="error-message" style="color: #e74c3c; font-size: 12px; margin-top: 5px;">
                                        <i class='bx bx-error-circle'></i>{{ $message }}
                                    </div>
                                @enderror
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
            <div class="register-form"
                style="height: 400px; width: 500px; overflow: hidden; padding: 20px; box-sizing: border-box;">
                <div style="height: 100%; overflow-y: auto;">
                    <form action="{{ route('register_guru') }}" method="POST">
                        @csrf
                        <table class="form-table" style="width: 100%;">
                            <!-- Input Nama -->
                            <tr>
                                <td colspan="2">
                                    <span
                                        style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; margin: auto;">

                                        <i class="bx bx-user"
                                            style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                        <input type="text" id="name" name="name"
                                            placeholder="Nama Lengkap Guru"
                                            style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                    </span>
                                    @error('name')
                                        <div class="error-message"
                                            style="color: #e74c3c; font-size: 12px; margin-top: 5px;">
                                            <i class='bx bx-error-circle'></i>{{ $message }}
                                        </div>
                                    @enderror
                                </td>
                            </tr>
                            <!-- Input Email -->
                            <tr>
                                <td colspan="2">

                                    <span
                                        style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; margin: auto;">
                                        <i class="bx bx-envelope"
                                            style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                        <input type="email" id="email" name="email" placeholder="Email"
                                            style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                    </span>
                                    @error('email')
                                        <div class="error-message"
                                            style="color: #e74c3c; font-size: 12px; margin-top: 5px;">
                                            <i class='bx bx-error-circle'></i>{{ $message }}
                                        </div>
                                    @enderror
                                </td>
                            </tr>
                            <!-- Input NIP -->
                            <tr>
                                <td colspan="2">

                                    <span
                                        style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding-left: 10px; margin: auto;">
                                        <i class="bx bx-id-card"
                                            style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                        <input type="text" id="NIP" name="NIP" placeholder="NIP"
                                            style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                    </span>
                                    @error('NIP')
                                        <div class="error-message"
                                            style="color: #e74c3c; font-size: 12px; margin-top: 5px;">
                                            <i class='bx bx-error-circle'></i>{{ $message }}
                                        </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div style="display: flex; gap: 10px; margin: auto;">
                                        <span
                                            style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding: 0 10px; flex: 1;">
                                            <i class="bx bx-lock"
                                                style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                            <input type="password" id="guru_password" name="password"
                                                placeholder="Password"
                                                style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                            <i class="bx bx-show" id="toggleGuruPassword"
                                                style="cursor: pointer; font-size: 16px; padding-left: 10px; margin-right: 10px; color: #666;"></i>
                                        </span>
                                        <span+
                                            style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding: 0 10px; flex: 1;">
                                            <i class="bx bx-lock-alt"
                                                style="margin-right: 10px; font-size: 16px; color: #666;"></i>
                                            <input type="password" id="guru_password_confirmation"
                                                name="password_confirmation" placeholder="Konfirmasi Password"
                                                style="border: none; outline: none; flex: 1; font-size: 14px; padding: 10px;">
                                            <i class="bx bx-show" id="toggleGuruPasswordConfirmation"
                                                style="cursor: pointer; font-size: 16px; padding-left: 10px; margin-right: 10px; color: #666;"></i>
                                            </span>
                                    </div>
                                    @error('password')
                                        <div class="error-message"
                                            style="color: #e74c3c; font-size: 12px; margin-top: 5px;">
                                            <i class='bx bx-error-circle'></i>{{ $message }}
                                        </div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2"><button type="submit">Daftar Guru</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="link">
                <p>Sudah punya akun? <a href="login">Masuk Sekarang!</a></p>
            </div>
        </div>
    </div>

    <script>
        // Siswa: Show/Hide Password
        document.getElementById('toggleSiswaPassword').addEventListener('click', function() {
            const passwordField = document.getElementById('siswa_password');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            this.classList.toggle('bx-show');
            this.classList.toggle('bx-hide');
        });

        document.getElementById('toggleSiswaPasswordConfirmation').addEventListener('click', function() {
            const passwordField = document.getElementById('siswa_password_confirmation');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            this.classList.toggle('bx-show');
            this.classList.toggle('bx-hide');
        });

        // Guru: Show/Hide Password
        document.getElementById('toggleGuruPassword').addEventListener('click', function() {
            const passwordField = document.getElementById('guru_password');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            this.classList.toggle('bx-show');
            this.classList.toggle('bx-hide');
        });

        document.getElementById('toggleGuruPasswordConfirmation').addEventListener('click', function() {
            const passwordField = document.getElementById('guru_password_confirmation');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            this.classList.toggle('bx-show');
            this.classList.toggle('bx-hide');
        });
    </script>

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

        document.addEventListener('DOMContentLoaded', function() {
            const activeTab = "{{ session('activeTab', 'murid') }}"; // Default to "murid"
            const tabToActivate = activeTab === 'guru' ? 'guru-tab' : 'siswa-tab';
            document.querySelector(`button[data-tab="${tabToActivate}"]`).click();
        });
    </script>

</body>

</html>
