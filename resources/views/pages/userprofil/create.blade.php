@extends('layouts.app_adminkit')

@section('content')

  <div class="content">
    <div class="row">
      <div class="col-md-12">
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

                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email" >Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="password" >Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="takmir" {{ old('role') == 'takmir' ? 'selected' : '' }}>Takmir</option>
                        <option value="remas" {{ old('role') == 'remas' ? 'selected' : '' }}>Remas</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-hijau mt-3">Simpan</button>
                <a href="{{ route('userprofil.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
