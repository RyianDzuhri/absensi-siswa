<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiswaController extends Controller
{
    public function index(): View
    {   
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $ortu = User::where('role', 'ortu')->get();
        return view('content.admin.siswa', compact('siswa', 'kelas', 'ortu'));
    }
    // Menyimpan data pengguna baru
    public function store(Request $request)
    {
        // Validasi input dengan custom messages
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'required|string|max:20|unique:siswa,nisn',
            'kelas_id' => 'required|exists:kelas,id',
            'ortu_id' => 'required|exists:users,id',
        ]);

        // Menambahkan data siswa baru ke dalam database
        Siswa::create([
            'name' => $validatedData['name'],
            'nisn' => $validatedData['nisn'],
            'kelas_id' => $validatedData['kelas_id'],
            'ortu_id' => $validatedData['ortu_id'],
        ]);

        return redirect()->route('content.admin.siswa')->with('success', 'Siswa Baru berhasil ditambahkan.');
    }

    // Mengupdate data pengguna
    public function update(Request $request, $id)
    {
        // Validasi input yang diterima
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'required|string|max:20|unique:siswa,nisn',
            'kelas_id' => 'required|exists:kelas,id',
            'ortu_id' => 'required|exists:users,id',
        ]);

        // Ambil data siswa berdasarkan id
        $siswa = Siswa::findOrFail($id);

        // Update data siswa dengan data yang telah tervalidasi
        $siswa->update([
            'name' => $validatedData['name'],
            'nisn' => $validatedData['nisn'],
            'kelas_id' => $validatedData['kelas_id'],
            'ortu_id' => $validatedData['ortu_id'],
        ]);

        // Kembalikan ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('content.admin.siswa')->with('success', 'Siswa berhasil diperbarui.');
    }

    // Menghapus siswa
    public function destroy($id)
    {
        // Mengambil siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);
        // Hapus siswa
        $siswa->delete();
        // Redirect ke halaman siswa dengan pesan sukses
        return redirect()->route('content.admin.siswa')->with('success', 'Siswa berhasil dihapus.');
    }
}
