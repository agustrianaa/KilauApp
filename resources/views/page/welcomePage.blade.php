<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/welcomepagestyle.css') }}">
</head>

<body>

    <header>
        <img src="{{ asset('images/LogoKilau2.png') }}" alt="" class="logo-kilau">

        <i class="fa-solid fa-bars tombolbar"></i>

        <nav class="navtop">
            <a href="#" style="--i:1;">Home</a>
            <a href="#" style="--i:2;">Event</a>
            <a href="#" style="--i:3;">Venue</a>
            <a href="#" style="--i:4;">About</a>
            <a href="#" style="--i:5;">Contact</a>
        </nav>

        <i class="fa-solid fa-moon mode"></i>

        <div class="bg-navtop"></div>
    </header>

    <section class="home">
        <div class="contenthome">
            <h3>Lembaga<br><span>Kilau</span><br>Berbagi Teknologi</h3>
            <p>
                Kilau Indonesia merupakan lembaga yang bergerak di bidang kemanusiaan dan memiliki program-program seperti Berbagi Makan, Berbagi Pendidikan, Berbagi Kesejahteraan dan lain sebagainya. Di Bidang Berbagi Teknologi Kilau berjalan di bidang Informasi dan Teknologi, untuk mengatur struktural secara digital. Menggunakan Website maupun Andriod. Di zaman yang serba canggih sekarang ini sudah tidak aneh rasanya dengan dunia digital, Smartphone seperti sudah menjadi kebutuhan pokok.
            </p>
            <a href="{{ route('login') }}" class="tombol" id="login-button"><span></span>Masuk ke Login</a>          
            <div class="iconsosmed">
                <a href="#" style="--i:14;"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" style="--i:15;"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.instagram.com/kilauonline/?hl=id" target="_blank" style="--i:16;"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>

        <div class="gambar">
            <img src="{{ asset('images/LogoKilau3.png') }}" alt="" class="siluet-kilau">
            <img src="{{ asset('images/LogoKilau2.png') }}" alt="" class="logokilau2">
        </div>
        <img src="{{ asset('images/boderkilau.png') }}" alt="" class="border">
    </section>

    <script src="{{ asset('javascript/welcomepage.js') }}"></script>

</body>

</html>
