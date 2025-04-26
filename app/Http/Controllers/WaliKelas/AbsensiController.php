<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AbsensiController extends Controller
{
    // public function index(): View
    // {
    //     return view('content.walikelas.absensi');
    // }
    // Menampilkan daftar siswa berdasarkan wali kelas yang login
    public function index()
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login
        if ($user->role !== 'wali_kelas') {
            abort(403, 'Unauthorized');
        }

        // Ambil kelas wali kelas yang login
        $kelas = Kelas::where('wali_kelas_id', $user->id)->first();

        // Ambil semua siswa dalam kelas tersebut
        $siswa = Siswa::where('kelas_id', $kelas->id)->get();

        // Ambil tanggal bulan ini
        $tanggal = now()->format('Y-m'); // Format: 2025-04

        // Ambil absensi yang sudah ada untuk bulan ini
        $absensi = Absensi::whereHas('siswa', function ($query) use ($kelas) {
                $query->where('kelas_id', $kelas->id);
            })
            ->whereDate('tanggal', 'like', $tanggal . '%') // Filter berdasarkan bulan
            ->get();

        // Ambil absensi yang sudah ada untuk bulan ini
        $absensi = Absensi::whereHas('siswa', function ($query) use ($kelas) {
            $query->where('kelas_id', $kelas->id);
        })
        ->whereDate('tanggal', 'like', $tanggal . '%') // Filter berdasarkan bulan
        ->get();

        $absensiData = [];
        foreach ($absensi as $item) {
        $day = (int) \Carbon\Carbon::parse($item->tanggal)->format('d'); // Gunakan Carbon untuk memastikan tanggal diubah menjadi objek DateTime
        $absensiData[$item->siswa_id][$day] = $item;
        }

        return view('content.walikelas.absensi', compact('siswa', 'tanggal', 'kelas', 'absensiData'));
    }

    // Menyimpan absensi
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|array',
            'siswa_id.*' => 'required|array',
            'siswa_id.*.*' => 'nullable|in:hadir,izin,sakit,alpa',
        ]);

        // Proses penyimpanan absensi
        foreach ($request->siswa_id as $siswa_id => $days) {
            foreach ($days as $day => $status) {
                // Periksa apakah absensi sudah ada untuk siswa_id dan tanggal tersebut
                $tanggal = now()->format('Y-m-') . $day; // Format tanggal dengan hari
                $existingAbsensi = Absensi::where('siswa_id', $siswa_id)
                                        ->whereDate('tanggal', $tanggal)
                                        ->first(); // Cari absensi yang sudah ada

                // Jika tidak ada absensi yang sudah ada, simpan absensi baru
                if (!$existingAbsensi && $status) {
                    Absensi::create([
                        'siswa_id' => $siswa_id,
                        'status' => $status,
                        'tanggal' => $tanggal,
                        'created_by' => Auth::id(),
                    ]);
                }
            }
        }

        return redirect()->route('content.walikelas.absensi')->with('success', 'Absensi berhasil disimpan!');
    }
}