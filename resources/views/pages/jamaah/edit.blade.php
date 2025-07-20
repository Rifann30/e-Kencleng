@extends('layouts.app_adminkit') {{-- Sesuaikan dengan layout milikmu --}}

@section('content')

  <div class="content">
    <div class="row">
      <div class="">
        <div class="card">
            <h2>Edit <strong>Data Jamaah</strong></h2>
          <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('jamaah.update', $jamaah->id) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <div class="card-bto mb-3">
                        <label for="nama" class="form-label"  style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Nama Jamaah</label>
                        <input type="text" name="nama" id="nama"
                            class="select2-hijau form-control @error('nama') is-invalid @enderror" style="width: 80%;"
                            value="{{ old('nama', $jamaah->nama) }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="card-bto mb-3">
                        <label for="alamat" class="form-label"  style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Alamat</label>
                        <select name="alamat" id="alamat" class="form-select @error('alamat') is-invalid @enderror select2-hijau" style="width: 80%;"  required>
                            <option value="">Pilih Alamat</option>
                            @foreach(['RT 1/RW 3', 'RT 2/RW 3'] as $group)
                                <option value="{{ $group }}" {{ old('alamat', $jamaah->alamat) == $group ? 'selected' : '' }}>
                                    {{ $group }}
                                </option>
                            @endforeach
                        </select>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="card-bto mb-3">
                        <label for="kelompok" class="form-label"  style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Kelompok</label>
                        <select name="kelompok" id="kelompok" class="select2-hijau form-select @error('kelompok') is-invalid @enderror" style="width: 80%;" required>
                            <option value="">Pilih Kelompok</option>
                            @foreach(['Kelompok 1', 'Kelompok 2', 'Kelompok 3', 'Kelompok 4'] as $group)
                                <option value="{{ $group }}" {{ old('kelompok', $jamaah->kelompok) == $group ? 'selected' : '' }}>
                                    {{ $group }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelompok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="card-bto justify-content-between">
                        <button type="submit" class="btn btn-hijau">Update Data</button>
                        <a href="{{ route('jamaah.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
