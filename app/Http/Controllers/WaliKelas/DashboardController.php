<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Ambil kelas yang diawali user ini (wali kelas)
        $kelas = Kelas::where('wali_kelas_id', $user->id)->first();

        $totalSiswa = $kelas->siswa()->count();
        
        $today = now()->toDateString();

        $hadirHariIni = Absensi::whereDate('tanggal', $today)
            ->whereIn('siswa_id', $kelas->siswa->pluck('id'))
            ->where('status', 'Hadir')
            ->count();

        $tidakHadirHariIni = Absensi::whereDate('tanggal', $today)
            ->whereIn('siswa_id', $kelas->siswa->pluck('id'))
            ->whereIn('status', ['Izin', 'Sakit', 'Alpa'])
            ->count();

        // Hitung persentase kehadiran bulan ini
        $bulanIni = now()->format('Y-m');
        $totalAbsensiBulanIni = Absensi::whereMonth('tanggal', now()->month)
            ->whereIn('siswa_id', $kelas->siswa->pluck('id'))
            ->count();

        $jumlahHadirBulanIni = Absensi::whereMonth('tanggal', now()->month)
            ->whereIn('siswa_id', $kelas->siswa->pluck('id'))
            ->where('status', 'Hadir')
            ->count();

        $persentaseKehadiran = $totalAbsensiBulanIni > 0
            ? round(($jumlahHadirBulanIni / $totalAbsensiBulanIni) * 100, 2)
            : 0;

        return view('content.walikelas.dashboard', compact(
            'user', 'kelas', 'totalSiswa',
            'hadirHariIni', 'tidakHadirHariIni',
            'persentaseKehadiran'
        ));
    }
}
