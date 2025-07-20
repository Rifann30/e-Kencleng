@extends('layouts.app_adminkit')

@section('content')

  <div class="content">
    <div class="row">
      <div class="">
        <div class="card">
            <h2>Tambah <strong>User Baru</strong></h2>
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

            <form action="{{ route('userprofil.store') }}" method="POST">
                @csrf

                <div class="card-bto mb-3">
                    <label for="nama" style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Nama</label>
                    <input type="text" name="nama" class="form-control select2-hijau" style="width: 80%;" value="{{ old('nama') }}" required>
                </div>

                <div class="card-bto mb-3">
                    <label for="email" style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Email</label>
                    <input type="email" name="email" class="form-control select2-hijau" style="width: 80%;" value="{{ old('email') }}" required>
                </div>

                <div class="card-bto mb-3">
                    <label for="password" style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Password</label>
                    <input type="password" name="password" class="form-control select2-hijau" style="width: 80%;" required>
                </div>

                <div class="card-bto mb-3">
                    <label for="role" style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Role</label>
                    <select name="role" class="form-control select2-hijau" style="width: 80%;" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="takmir" {{ old('role') == 'takmir' ? 'selected' : '' }}>Takmir</option>
                        <option value="remas" {{ old('role') == 'remas' ? 'selected' : '' }}>Remas</option>
                    </select>
                </div>

                <div class="card-bto">
                <button type="submit" class="btn btn-hijau mt-3">Simpan</button>
                <a href="{{ route('userprofil.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                </div>

            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
