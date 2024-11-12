<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="style/login.css">
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
        <div class="login-form">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <table class="form-table">
                    <!-- Input Nama -->
                    <tr>
                        <td colspan="2">
                            <span style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding: 0 15px;">
                                <i class='bx bxs-user' style="font-size: 24px; color: gray; padding-right: 10px;"></i>
                                <input type="text" id="name" name="name" placeholder="Nama" style="border: none; outline: none; flex: 1;">
                            </span>
                        </td>
                    </tr>
                    <!-- Input Email -->
                    <tr>
                        <td colspan="2">
                            <span style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding: 0 15px;">
                                <i class='bx bxs-envelope' style="font-size: 24px; color: gray; padding-right: 10px;"></i>
                                <input type="email" id="email" name="email" placeholder="Email" style="border: none; outline: none; flex: 1;">
                            </span>
                        </td>
                    </tr>
                    <!-- Password dan Konfirmasi Password dalam satu baris -->
                    <tr>
                        <td>
                            <span style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding: 0 15px; margin-right: 10px;">
                                <i class='bx bxs-lock' style="font-size: 24px; color: gray; padding-right: 10px;"></i>
                                <input type="password" id="password" name="password" placeholder="Password" style="border: none; outline: none; flex: 1;">
                            </span>
                        </td>
                        <td>
                            <span style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding: 0 15px;">
                                <i class='bx bxs-lock' style="font-size: 24px; color: gray; padding-right: 10px;"></i>
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" style="border: none; outline: none; flex: 1;">
                            </span>
                        </td>
                    </tr>
                    <!-- Tombol Daftar -->
                    <tr>
                        <td colspan="2"><button type="submit">Daftar</button></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="link">
            <p>Sudah punya akun? <a href="login">Masuk Sekarang!</a></p>
        </div>
    </div>
</body>

</html>
