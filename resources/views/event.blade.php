@extends('app')

@section('content')
    <x-navbar />

    <section class="event-section">

        <div class="event-container">

            <div class="event-header">
                <h2>Event details</h2>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
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

                <div class="event-step">

                    <div class="event-number">
                        2
                    </div>

                    <span>
                        Pesan melalui nomor :
                        <br>
                        0856-4516-0494
                    </span>

                </div>

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
