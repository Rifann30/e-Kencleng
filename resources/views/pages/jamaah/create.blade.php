@extends('layouts.app_adminkit')

@section('content')

  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <h2 >Tambah<strong> Data Jamaah</trong></h2>
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

              <div class="form-group mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
              </div>

              <div class="form-group mb-3">
                <label for="alamat">Alamat</label>
                <select class="form-control" name="alamat" id="alamat" required>
                  <option value="">Pilih Alamat</option>
                  @foreach(['RT 1/RW 3', 'RT 2/RW 3'] as $group)
                    <option value="{{ $group }}" {{ old('alamat') == $group ? 'selected' : '' }}>{{ $group }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="kelompok">Kelompok</label>
                <select class="form-control" name="kelompok" id="kelompok" required>
                  <option value="">Pilih Kelompok</option>
                  @foreach(['Kelompok 1', 'Kelompok 2', 'Kelompok 3', 'Kelompok 4'] as $kelompok)
                    <option value="{{ $kelompok }}" {{ old('kelompok') == $kelompok ? 'selected' : '' }}>{{ $kelompok }}</option>
                  @endforeach
                </select>
              </div>

                <button type="submit" class="btn btn-hijau mt-3">Simpan</button>
                <a href="{{ route('jamaah.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
