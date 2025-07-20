@extends('layouts.app_adminkit') {{-- Ganti dengan layout utama kamu --}}

@section('content')


  <div class="content">
    <div class="row">
      <div class="">
        <div class="card">
            <h2 class="">Tambah <strong>Pengeluaran</strong></h2>
          <div class="card-body">
               @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan!</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pengeluaran.store') }}" method="POST">
                @csrf

                <div class="card-bto mb-3">
                    <label style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Nama Pengeluaran</label>
                    <input type="text" name="pengeluaran" class="form-control select2-hijau" style="width: 80%;" required value="{{ old('pengeluaran') }}">
                </div>

                <div class="card-bto mb-3">
                    <label style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Jumlah Dana</label>
                    <input type="text" name="jml_dana" class="form-control select2-hijau rupiah" style="width: 80%;" required value="{{ old('jml_dana') }}">
                </div>

                <div class="card-bto mb-3">
                    <label style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control select2-hijau" style="width: 80%;" required value="{{ old('keterangan') }}">
                </div>

                <div class="card-bto mb-3">
                    <label style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control select2-hijau" style="width: 80%;" required value="{{ old('tanggal') }}">
                </div>

                <div class="card-bto">
                    <button type="submit" class="btn btn-hijau mt-3">Simpan</button>
                    <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                </div>

            </form>
          </div>

        </div>
      </div>
    </div>
  </div>


@endsection
