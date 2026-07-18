@extends('app')

@section('content')
    <x-navbar />

    <section class="event-section">

        <div class="event-container">

            <div class="event-header">
                <h2>Event details</h2>

                <p>
                    Konser Teruntuk Kamu – Punar Album Tour bersama @parade.hujan<br><br>

                    Malam untuk berbagi cerita, emosi serta kehangatan yang akan disajikan dengan konsep intimate konser
                    bersama deretan performer yang seru. Jangan lewatkan kesempatan untuk menjadi bagian dari malam
                    tersebut.<br><br>

                    🗓 Jumat, 31 Juli 2026<br>
                    📍 @fbn_artisantz<br><br>

                    Yuk, ajak teman, pasangan, atau orang tersayang dan rasakan langsung hangatnya Konser Teruntuk Kamu
                </p>
            </div>

            <div class="event-gallery">

                <div class="event-main-image">
                    <img src="{{ asset('img/event/event-parade-hujan.webp') }}" alt="">
                </div>

                <div class="event-bg-text">
                    EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT
                    EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT
                    EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT EVENT
                </div>

                <div class="event-thumbnails">

                    <div class="event-thumb">
                        <img src="{{ asset('img/event/event-parade-hujan-2.webp') }}" alt="">
                    </div>

                    <div class="event-thumb">
                        <img src="{{ asset('img/event/event-parade-hujan-2.webp') }}" alt="">
                    </div>

                    <div class="event-thumb">
                        <img src="{{ asset('img/event/event-parade-hujan-2.webp') }}" alt="">
                    </div>

                </div>

            </div>

            <div class="event-reservation">

                <h2>Cara Reservasi Meja</h2>

                <p>Booking spot mu untuk pengalaman terbaik</p>

                <div class="event-step">

                    <div class="event-number">
                        1
                    </div>

                    <span>DP 50% melalui pesanan</span>

                </div>

                <a href="https://wa.me/6285645160494" target="_blank" class="event-step">

                    <div class="event-number">
                        2
                    </div>

                    <span>
                        Pesan melalui nomor / klik disini :
                        <br>
                        0856-4516-0494
                    </span>

                </a>

                <div class="event-step">

                    <div class="event-number">
                        3
                    </div>

                    <span>
                        Reservasi sehari sebelum hari yang ditentukan,
                        selain itu tidak bisa
                    </span>

                </div>

            </div>

        </div>

    </section>
@endsection