@extends('layouts.app_adminkit')

@section('content')

  <div class="content">
    <div class="row">
      <div class="">
        <div class="card">
            <h2 class="">Edit <strong>Pengeluaran</strong></h2>
          <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-bto mb-2">
                    <label style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Nama Pengeluaran</label>
                    <input type="text" name="pengeluaran" class="form-control select2-hijau" style="width: 80%;" required value="{{ old('pengeluaran', $pengeluaran->pengeluaran) }}">
                </div>

                <div class="card-bto mb-2">
                    <label style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Jumlah Dana</label>
                    <input type="text" name="jml_dana" class="form-control rupiah select2-hijau" style="width: 80%;" required value="{{ old('jml_dana', number_format($pengeluaran->jml_dana, 0, ',', '.')) }}">
                </div>

                <div class="card-bto mb-2">
                    <label style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control select2-hijau" style="width: 80%;" required value="{{ old('keterangan', $pengeluaran->keterangan) }}">
                </div>

                <div class="card-bto mb-3">
                    <label style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control select2-hijau" style="width: 80%;" required value="{{ old('tanggal', $pengeluaran->tanggal) }}">
                </div>

                <div class="card-bto">
                <button type="submit" class="btn btn-hijau">Update</button>
                <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Batal</a>
                </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
