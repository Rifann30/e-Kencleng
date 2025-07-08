@extends('layouts.app_welcome')

@section('content')

<div class="content d-flex justify-content-center align-items-center text-center" style="min-height: 50vh;">
    <div class="container">
        <img src="{{ asset('icon/takmir.png') }}" alt="Logo Takmir" class="mb-3" style="max-width: 120px;">
        <h3>Selamat Datang di <span style="color: #23D155;">Sistem Kencleng Masjid</span></h3>
        <p>Mencatat dan memantau keuangan kencleng dengan mudah, cepat, dan transparan.</p>
        <a href="{{ route('dashboard') }}" class="btn btn-glass mt-3">Laporan Kencleng</a>
    </div>
</div>
@endsection
