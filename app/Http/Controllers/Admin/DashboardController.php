<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalUsers = User::count();
        $totalKelas = Kelas::count();
        $totalSiswa = Siswa::count();
        return view('content.admin.dashboard', compact('totalUsers', 'totalKelas', 'totalSiswa'));
    }
}
