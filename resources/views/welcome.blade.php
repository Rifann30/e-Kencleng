{{-- @extends('layouts.app_welcome')

@section('content')

<div class="content d-flex justify-content-center align-items-center text-center" style="min-height: 50vh;">
    <div class="container">
        <img src="{{ asset('icon/takmir.png') }}" alt="Logo Takmir" class="mb-3" style="max-width: 120px;">
        <h3>Selamat Datang di <span style="color: #23D155;">e-Kencleng Masjid</span></h3>
        <p>Mencatat dan memantau keuangan kencleng dengan mudah, cepat, dan transparan.</p>
        <a href="{{ route('dashboard') }}" class="btn btn-glass mt-3">Laporan Kencleng</a>
    </div>
</div>
@endsection --}}

@extends('layouts.app_welcome')

@section('content')

<div class="content d-flex justify-content-center align-items-center text-center px-3" style="min-height: 50vh;">
    <div class="container">
        <img
            src="{{ asset('icon/takmir.png') }}"
            alt="Logo Takmir"
            class="mb-3 img-fluid logo-welcome"
            style="width: clamp(80px, 10vw, 120px); height: auto; transition: all 0.3s ease;">

        <h3 class="fw-semibold mb-3" style="font-size: clamp(1rem, 1.2vw + 0.5rem, 2rem);">
            Selamat Datang di <br class="d-sm-none">
            <span class="text-utama" style="color: #23D155;">e-Kencleng</span>
             Masjid Akbar
        </h3>

        <p class="desc-welcome">
            Mencatat dan memantau keuangan kencleng
            dengan mudah, cepat, dan transparan.
        </p>

        <a href="{{ route('dashboard') }}" class="btn btn-glass ">
            Laporan Kencleng
        </a>
    </div>
</div>

@endsection

