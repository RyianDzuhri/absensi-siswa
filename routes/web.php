<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrangTua\DashboardController as OrangTuaDashboardController;
use App\Http\Controllers\WaliKelas\DashboardController as WaliKelasDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'verify'])->name('auth.verify');

Route::group(['middleware'=>'auth:admin'], function(){
    Route::get('/admin/home', [DashboardController::class, 'index'])->name('admin.dashboard.index');
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


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');