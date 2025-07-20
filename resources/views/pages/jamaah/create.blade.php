@extends('layouts.app_adminkit')

@section('content')

  <div class="content">
    <div class="row">
      <div class="">
        <div class="card">
            <h2>Tambah<strong> Data Jamaah</strong></h2>
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <strong>Terjadi kesalahan!</strong>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif


            <form method="POST" action="{{ route('jamaah.store') }}">
              @csrf

              <div class="card-bto mb-3">
                <label for="nama" style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Nama</label>
                <input type="text" class="form-control select2-hijau" style="width: 80%;" id="nama" name="nama" value="{{ old('nama') }}" required>
              </div>

              <div class="card-bto mb-3">
                <label for="alamat" style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Alamat</label>
                <select class="form-control select2-hijau" style="width: 80%;" name="alamat" id="alamat" required>
                  <option value="">Pilih Alamat</option>
                  @foreach(['RT 1/RW 3', 'RT 2/RW 3'] as $group)
                    <option value="{{ $group }}" {{ old('alamat') == $group ? 'selected' : '' }}>{{ $group }}</option>
                  @endforeach
                </select>
              </div>

              <div class="card-bto">
                <label for="kelompok" style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Kelompok</label>
                <select class="form-control select2-hijau" style="width: 80%;" name="kelompok" id="kelompok" required>
                  <option value="">Pilih Kelompok</option>
                  @foreach(['Kelompok 1', 'Kelompok 2', 'Kelompok 3', 'Kelompok 4'] as $kelompok)
                    <option value="{{ $kelompok }}" {{ old('kelompok') == $kelompok ? 'selected' : '' }}>{{ $kelompok }}</option>
                  @endforeach
                </select>
              </div>

              <div class="card-bto">
                <button type="submit" class="btn btn-hijau mt-3">Simpan</button>
                <a href="{{ route('jamaah.index') }}" class="btn btn-secondary mt-3">Kembali</a>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
