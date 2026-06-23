@extends('app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artisantzz</title>

    <link rel="stylesheet" href="{{ asset('css/navfot.css') }}">
</head>

<body>

    <!-- Navbar -->
    <x-navbar />

    <main>

        <!-- Pattern background (kalau kamu pakai ini) -->
        <div class="artisantz-pattern"></div>

        <!-- HERO SECTION -->
        <section class="hero">

            <x-artisantz-logo />

            <div class="hero-content">
                <div class="hero-h">
                    <h1>Where Art Meets <br>
                    Your Daily Brew.</h1>
                </div>
                <div class="hero-p">
                    <p>
                        Lebih dari sekadar tempat ngopi. Cafe Artisantz adalah ruang <br> kreatif bagi para penikmat rasa, pencari inspirasi, <br>dan pemburu estetika di tengah kota.

                    </p>
                </div>
            </div>

            </div>
        </section>

    </main>

    <!-- Footer -->
    <x-footer />

</body>
</html>

@endsection