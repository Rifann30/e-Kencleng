<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfilController extends Controller
{
    // Tampilkan semua user
    public function index()
    {
        $users = User::all();
        return view('userprofil', compact('users'),['title' => 'Data User']);
    }

    // Form tambah user baru
    public function create()
    {
        return view('pages.userprofil.create');
    }

    // Simpan user baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'     => 'required|max:100',
            'email'    => 'required|email|max:100|unique:users',
            'password' => 'required|min:3',
            'role'     => 'required|in:admin,takmir,remas',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('userprofil.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Tampilkan detail user tertentu
    public function show(User $user)
    {
        return view('userprofil.show', compact('user'));
    }

    // Form edit user
    public function edit($id)
        {
            $user = User::findOrFail($id);
            return view('pages.userprofil.edit', compact('user'));
        }

    // Simpan perubahan user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|min:3',
            'role' => 'required|in:admin,takmir,remas'
        ]);

        // Update data
        $user->nama = $validated['nama'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];

        // Hanya update password jika diisi
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        return redirect()->route('userprofil.index')->with('success', 'Data user berhasil diperbarui.');
    }


    // Hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('userprofil.index')->with('success', 'User berhasil dihapus.');
    }

}


