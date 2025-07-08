@extends('layouts.app_adminkit')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h2 class="h3 mb-3">Edit <strong>Data User</strong></h2>

                <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                    <form action="{{ route('userprofil.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama', $user->nama) }}">
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="takmir" {{ old('role', $user->role) == 'takmir' ? 'selected' : '' }}>Takmir</option>
                                <option value="remas" {{ old('role', $user->role) == 'remas' ? 'selected' : '' }}>Remas</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('role') }}</span>
                        </div>


                            <button type="submit" class="btn btn-hijau">Simpan Perubahan</button>
                            <a href="{{ route('userprofil.index') }}" class="btn btn-secondary">Batal</a>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
