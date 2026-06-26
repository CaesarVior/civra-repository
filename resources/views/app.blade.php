<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artisantzz</title>

    @vite(['resources/css/navfot.css'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div id="footer-preloader">
        <div class="footer-loader-wrapper">
            <div class="footer-loader-spinner"></div>
            <p class="footer-loader-text">Tunggu Sebentar</p>
        </div>
    </div>
    <!-- Navbar global -->
    <x-navbar />

    <!-- Konten halaman -->
    <main>
        @yield('content')
    </main>

    <x-footer />

    <script>
        window.addEventListener('scroll', function() {

            const navbar = document.querySelector('.navbar');

            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        window.addEventListener('load', function() {
            const preloader = document.getElementById('footer-preloader');
            if (preloader) {
                preloader.classList.add('footer-preloader-hidden');
            }
        });
    </script>
</body>

</html>
