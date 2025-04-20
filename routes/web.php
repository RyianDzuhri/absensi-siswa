<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrangTua\DashboardController as OrangTuaDashboardController;
use App\Http\Controllers\WaliKelas\DashboardController as WaliKelasDashboardController;
use App\Models\Kelas;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Login Route
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'verify'])->name('auth.verify');

// Authentication Role Route
Route::group(['middleware'=>'auth:admin'], function(){
        // Dashboard
        Route::get('/admin/home', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.pengguna');

        // Users
        Route::get('/admin/users', [UsersController::class, 'index'])->name('content.admin.users');
        Route::post('/admin/users', [UsersController::class, 'store'])->name('admin.users.store');
        Route::put('/admin/users/{id}', [UsersController::class, 'update'])->name('admin.users.update');
        Route::delete('/admin/users/{id}', [UsersController::class, 'destroy'])->name('admin.users.destroy');

        //Route Kelas
        Route::get('/admin/kelas', [KelasController::class, 'index'])->name('content.admin.kelas');
        Route::post('/admin/kelas', [KelasController::class, 'store'])->name('admin.kelas.store');
        Route::put('/admin/kelas/{id}', [KelasController::class, 'update'])->name('admin.kelas.update');
        Route::delete('/admin/kelas/{id}', [KelasController::class, 'destroy'])->name('admin.kelas.destroy');

        //Route Siswa
        Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('content.admin.siswa');
        Route::post('/admin/siswa', [SiswaController::class, 'store'])->name('admin.siswa.store');
        Route::put('/admin/siswa/{id}', [SiswaController::class, 'update'])->name('admin.siswa.update');
        Route::delete('/admin/siswa/{id}', [SiswaController::class, 'destroy'])->name('admin.siswa.destroy');
    }
);
Route::group(['middleware'=>'auth:wali_kelas'], function(){
        Route::get('/walikelas/home', [WaliKelasDashboardController::class, 'index'])->name('walikelas.dashboard.index');
    }
);
Route::group(['middleware'=>'auth:ortu'], function(){
        Route::get('/ortu/home', [OrangTuaDashboardController::class, 'index'])->name('ortu.dashboard.index');
    }
);

// Login Route
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');