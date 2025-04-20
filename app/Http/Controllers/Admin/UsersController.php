<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsersController extends Controller
{
    // Menampilkan daftar pengguna
    public function index(): View
    {
        $users = User::all();
        return view('content.admin.users', compact('users'));
    }

    // Menyimpan data pengguna baru
    public function store(Request $request)
    {
        // Validasi input dengan custom messages
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Admin,Wali Kelas,Orang Tua',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role tidak valid.',
        ]);

        // Menambahkan data pengguna baru ke dalam database
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('content.admin.users')->with('success', 'Pengguna berhasil ditambahkan.');
    }


    // Mengupdate data pengguna
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:Admin,Wali Kelas,Orang Tua',
        ]);

        // Mengambil pengguna yang akan diupdate
        $user = User::findOrFail($id);

        // Update data pengguna
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
            'role' => $validatedData['role'],
        ]);

        // Redirect ke halaman pengguna dengan pesan sukses
        return redirect()->route('content.admin.users')->with('success', 'Pengguna berhasil diperbarui.');
    }

    // Menghapus pengguna
    public function destroy($id)
    {
        // Mengambil pengguna berdasarkan ID
        $user = User::findOrFail($id);
        // Hapus pengguna
        $user->delete();
        // Redirect ke halaman pengguna dengan pesan sukses
        return redirect()->route('content.admin.users')->with('success', 'Pengguna berhasil dihapus.');
    }

}