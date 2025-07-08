@extends('layouts.app_adminkit') {{-- Ganti dengan layout utama kamu --}}

@section('content')


  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <h2 class="mb-4 font-weight-bold">Tambah <strong>Pengeluaran</strong></h2>
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

                <div class="form-group mb-3">
                    <label>Nama Pengeluaran</label>
                    <input type="text" name="pengeluaran" class="form-control" required value="{{ old('pengeluaran') }}">
                </div>

                <div class="form-group mb-3">
                    <label>Jumlah Dana</label>
                    <input type="text" name="jml_dana" class="form-control rupiah" required value="{{ old('jml_dana') }}">
                </div>

                <div class="form-group mb-3">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" required value="{{ old('keterangan') }}">
                </div>

                <div class="form-group mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required value="{{ old('tanggal') }}">
                </div>

                <button type="submit" class="btn btn-hijau">Simpan</button>
                <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Batal</a>

            </form>
          </div>

        </div>
      </div>
    </div>
  </div>


@endsection
