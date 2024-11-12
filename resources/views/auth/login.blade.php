<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <div class="login-image">
        <div class="logo-icon">
            <img src="{{ asset('image/SMART-LAB (DARK MODE).png') }}" alt="LOGO SMART-LAB">
        </div>
        <img src="{{ asset('image/background-login.png') }}" alt="Login Image">
        <!-- Animasi Lottie di tengah -->
        <div class="lottie">
            <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
            <dotlottie-player src="https://lottie.host/f256ae59-5457-4979-9aaa-4e825312fbfd/Ycwn8A8gFH.json"
                background="transparent" speed="1" style="width: 450px;" loop autoplay></dotlottie-player>
        </div>
    </div>
    <div style="display: flex; flex-direction:column; width: 50%; justify-content:center; align-items:center;">
        <h2>Masuk</h2>
        <h5>Selamat Datang!</h5>
        <p>Masukkan akun Email beserta Sandi nya yang sesuai</p>

        <!-- Alert untuk pesan sukses atau error -->
        @if(session()->has('success'))
            <div style="color: green; border: 1px solid green; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div style="color: red; border: 1px solid red; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="login-form">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <table class="form-table">
                    <tr>
                        <td colspan="2">
                            <span style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding: 0 15px;">
                                <i class='bx bxs-envelope' style="font-size: 24px; color: gray; padding-right: 10px;"></i>
                                <input type="email" id="email" name="email" placeholder="Email" style="border: none; outline: none; flex: 1;">
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <span style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 10px; padding: 0 15px;">
                                <i class='bx bxs-lock-open' style="font-size: 24px; color: gray; padding-right: 10px;"></i>
                                <input type="password" id="password" name="password" placeholder="Password" style="border: none; outline: none; flex: 1;">
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit">Masuk</button></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="link">
            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang!</a></p>
        </div>
    </div>
</body>

</html>
