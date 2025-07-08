@extends('layouts.app_adminkit')

@section('content')

  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <h2 class="mb-4 font-weight-bold">Edit <strong>Pengeluaran</strong></h2>
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

                <div class="form-group mb-2">
                    <label>Nama Pengeluaran</label>
                    <input type="text" name="pengeluaran" class="form-control" required value="{{ old('pengeluaran', $pengeluaran->pengeluaran) }}">
                </div>

                <div class="form-group mb-2">
                    <label>Jumlah Dana</label>
                    <input type="text" name="jml_dana" class="form-control rupiah" required value="{{ old('jml_dana', number_format($pengeluaran->jml_dana, 0, ',', '.')) }}">
                </div>

                <div class="form-group mb-2">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" required value="{{ old('keterangan', $pengeluaran->keterangan) }}">
                </div>

                <div class="form-group mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required value="{{ old('tanggal', $pengeluaran->tanggal) }}">
                </div>

                <button type="submit" class="btn btn-hijau">Update</button>
                <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
