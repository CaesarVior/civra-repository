@extends('app')

@push('schema')
    <script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "CafeOrCoffeeShop",
  "name": "Artisantz Coffee & Eatery",
  "image": "{{ asset('img/artisantz-logo.webp') }}",
  "@@id": "{{ config('app.url') }}/",
  "url": "{{ config('app.url') }}/",
  "telephone": "",
  "priceRange": "RP25000-RP50000",
  "address": {
    "@@type": "PostalAddress",
    "streetAddress": "Jl. Danau Kerinci Raya, Lesanpuro, Kec. Kedungkandang",
    "addressLocality": "Kota Malang",
    "addressRegion": "Jawa Timur",
    "postalCode": "65139",
    "addressCountry": "ID"
  }
}
</script>
@endpush
@section('title', 'Artisantz Coffee & Eatery - Kafe Nyaman & Tempat Nongkrong Terbaik')

@section('meta_description',
    'Cari cafe estetik untuk kerja atau bersantai? Kunjungi Artisantz Coffee & Eatery.
    Menyajikan kopi pilihan dan makanan lezat.')

@section('content')
    <section class="hero">
        <x-artisantz-logo />
        <div class="hero-content">
            <div class="hero-h">
                <h1>Where Art Meets <br> Your Daily Brew.</h1>
            </div>
            <div class="hero-p" style="padding-top:20px">
                <p>
                    Lebih dari sekadar tempat ngopi. Cafe Artisantz adalah ruang <br> kreatif bagi para penikmat rasa,
                    pencari inspirasi, <br>dan pemburu estetika di tengah kota.
                </p>
            </div>
        </div>
    </section>

    <x-container>
        <section class="artisantz-section">
            <div class="artisantz-wrapper">
                <div class="artisantz-left">
                    <h2>What Is Artisantz?</h2>
                </div>
                <div class="artisantz-right">
                    <p>
                        Artisantz Coffee & Eatery hadir sebagai pelepas penat di tengah kesibukan kota. Kami menyajikan
                        berbagai varian kopi arabika pilihan, menu masakan western dan lokal yang menggugah selera, serta
                        atmosfer ruangan yang dirancang khusus untuk kenyamanan Anda bekerja (WFC) maupun berkumpul bersama
                        orang terdekat.
                    </p>
                </div>
            </div>
        </section>
    </x-container>
@endsection
