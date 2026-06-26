<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artisantzz</title>

    @vite(['resources/css/navfot.css'])
</head>

<body>

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
    </script>
</body>

</html>
