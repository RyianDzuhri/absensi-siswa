<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KelasController extends Controller
{
    public function index(): View
    {
        $kelas = Kelas::all();
        $waliKelas = User::where('role', 'Wali Kelas')->get();
        return view('content.admin.kelas', compact('kelas', 'waliKelas'));
    }
    // Menyimpan data pengguna baru
    public function store(Request $request)
    {
        // Validasi input dengan custom messages
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'wali_kelas_id' => 'required|exists:users,id',
        ]);

        // Menambahkan data pengguna baru ke dalam database
        Kelas::create([
            'name' => $validatedData['name'],
            'wali_kelas_id' => $validatedData['wali_kelas_id'],
        ]);

        return redirect()->route('content.admin.kelas')->with('success', 'Kelas Baru berhasil ditambahkan.');
    }


    // Mengupdate data pengguna
    public function update(Request $request, $id)
    {
        // Validasi input yang diterima
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'wali_kelas_id' => 'required|exists:users,id',
        ]);

        // Ambil data kelas berdasarkan id
        $kelas = Kelas::findOrFail($id);

        // Update data kelas dengan data yang telah tervalidasi
        $kelas->update([
            'name' => $validatedData['name'],
            'wali_kelas_id' => $validatedData['wali_kelas_id'],
        ]);

        // Kembalikan ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('content.admin.kelas')->with('success', 'Kelas berhasil diperbarui.');
    }

    // Menghapus kelas
    public function destroy($id)
    {
        // Mengambil kelas berdasarkan ID
        $kelas = Kelas::findOrFail($id);
        // Hapus kelas
        $kelas->delete();
        // Redirect ke halaman kelas dengan pesan sukses
        return redirect()->route('content.admin.kelas')->with('success', 'Pengguna berhasil dihapus.');
    }
}
