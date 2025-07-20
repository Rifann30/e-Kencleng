@extends('layouts.app_adminkit')

@section('content')

<div class="content">
    <div class="row">
        <div class="">
            <div class="card">
                <h2 >Edit <strong>Data User</strong></h2>

                <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                    <form action="{{ route('userprofil.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-bto mb-3">
                            <label for="nama" style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Nama</label>
                            <input type="text" name="nama" class="form-control select2-hijau" style="width: 80%;"value="{{ old('nama', $user->nama) }}">
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        </div>

                        <div class="card-bto mb-3">
                            <label for="email" style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Email</label>
                            <input type="text" name="email" class="form-control select2-hijau" style="width: 80%;"value="{{ old('email', $user->email) }}">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>

                        <div class="card-bto mb-3">
                            <label for="password" style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Password</label>
                            <input type="password" name="password"  class="form-control select2-hijau" style="width: 80%;">
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>

                        <div class="card-bto mb-3">
                            <label for="role" style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Role</label>
                            <select name="role" class="form-control select2-hijau" style="width: 80%;"required>
                                <option value="">-- Pilih Role --</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="takmir" {{ old('role', $user->role) == 'takmir' ? 'selected' : '' }}>Takmir</option>
                                <option value="remas" {{ old('role', $user->role) == 'remas' ? 'selected' : '' }}>Remas</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('role') }}</span>
                        </div>

                        <div class="card-bto">
                            <button type="submit" class="btn btn-hijau">Update</button>
                            <a href="{{ route('userprofil.index') }}" class="btn btn-secondary">Batal</a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
