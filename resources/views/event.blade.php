@extends('app')

@section('title', 'Event - Artisantz Coffee & Eatery')

@section('content')

    <x-navbar />

    <section class="event-section">

        <div class="event-container">

            <!-- HERO IMAGE -->
            <div class="event-hero">
                <img src="{{ asset('img/event-banner.webp') }}" alt="Parade Hujan">
            </div>

            <!-- EVENT CARD -->
            <div class="event-card">

                <!-- LEFT -->
                <div class="event-left">

                    <h2 class="event-title">
                        Konser Teruntuk Kamu
                    </h2>

                    <div class="event-info">
                        <span>📅</span>
                        <div>
                            <strong>Jumat, 31 Juli 2026</strong><br>
                            19.00 WIB
                        </div>
                    </div>

                    <div class="event-info">
                        <span>📍</span>
                        <div>
                            Artisantz Coffee & Eatery
                        </div>
                    </div>

                    <div class="event-info">
                        <span>🎤</span>
                        <div>
                            Parade Hujan — Tour Album Punar
                        </div>
                    </div>

                </div>

                <!-- RIGHT -->
                <div class="event-right">

                    <h3>Reservasi Sekarang</h3>

                    <p>
                        Booking meja terlebih dahulu agar tidak kehabisan tempat.
                    </p>

                    <a href="https://wa.me/6285645160494" target="_blank" class="reserve-btn">

                        Reservasi via WhatsApp

                    </a>

                </div>

            </div>

            <!-- CONTENT -->

            <div class="event-bottom-card">

                <!-- DESCRIPTION -->

                <div class="event-description">

                    <h2>Event Details</h2>

                    <p>
                        Malam untuk berbagi cerita, emosi serta kehangatan yang akan
                        disajikan dengan konsep intimate concert bersama Parade Hujan.
                        Nikmati pengalaman menikmati kopi sambil mendengarkan musik
                        secara langsung di Artisantz Coffee & Eatery.
                    </p>

                    <p>
                        Jangan lewatkan kesempatan untuk menjadi bagian dari malam
                        spesial ini bersama teman, pasangan maupun keluarga.
                    </p>

                </div>

                <!-- ORGANIZER -->

                <div class="organizer-card">

                    <h2>Organizer</h2>

                    <p>
                        <strong>Artisantz Coffee & Eatery</strong>
                    </p>

                    <p>📞 0856-4516-0494</p>
                    <p>
                        <a href="https://maps.google.com/?q=Artisantz+Coffee+%26+Eatery+Malang" target="_blank">
                            📍 Artisantz Coffee & Eatery
                        </a>
                    </p>

                    <a href="https://www.instagram.com/fbn_artisantz" target="_blank">
                        📷 @fbn_artisantz
                    </a>

                </div>

            </div>

            <!-- GALLERY -->

            <div class="event-gallery">

                <h2>Gallery Event</h2>

                <div class="event-gallery-grid">
                    @foreach ($events as $event)
                        @php dd($event); @endphp;
                        <h2>{{ $event->name }}</h2>
                        <p>Dibuat oleh: {{ $event->user->name ?? 'Anonim' }}</p>

                        <img src="{{ asset('img/event/' . $event->image) }}" alt="{{ $event->name }}">
                    @endforeach

                    <div class="event-thumb coming-soon">
                        <span>COMING SOON</span>
                    </div>
                </div>

            </div>

        </div>

    </section>

@endsection
