@extends('app')
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </section>

    </x-container>
@endsection
