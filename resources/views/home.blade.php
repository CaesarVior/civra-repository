@extends('app')

@section('content')


<x-navbar />

<main>

    {{-- Hero --}}
    <x-hero />

    {{-- Event --}}
    <x-event-card />

    {{-- What is Artisantz --}}
    <x-container />

    <x-best-seller />
</main>

@endsection