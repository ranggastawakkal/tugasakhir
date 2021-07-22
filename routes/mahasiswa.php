<?php

use App\Http\Controllers\Mahasiswa\BuatPengajuanController;
use App\Http\Controllers\Mahasiswa\DaftarPengajuanController;
use App\Http\Controllers\Mahasiswa\DashboardController;
use App\Http\Controllers\Mahasiswa\DokumenController;
use App\Http\Controllers\Mahasiswa\LogActivityController;
use App\Http\Controllers\Mahasiswa\PembimbingAkademikController;
use App\Http\Controllers\Mahasiswa\PembimbingLapanganController;
use App\Http\Controllers\Mahasiswa\ProfileController;
use App\Http\Controllers\Mahasiswa\TemplateLaporanController;
use App\Http\Controllers\Mahasiswa\UbahPasswordController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:mahasiswa'], 'prefix' => 'mahasiswa'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('mahasiswa.index');
    Route::get('/buat-pengajuan/index', [BuatPengajuanController::class, 'index'])->name('mahasiswa.buat-pengajuan.index');
    Route::get('/daftar-pengajuan/index', [DaftarPengajuanController::class, 'index'])->name('mahasiswa.daftar-pengajuan.index');
    
    Route::group(['prefix' => 'profil'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('mahasiswa.profil.index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('mahasiswa.profil.edit');
        Route::post('/update', [ProfileController::class, 'update'])->name('mahasiswa.profil.update');
    });
    Route::group(['prefix' => 'pembimbing'], function () {
        Route::get('/akademik', [PembimbingAkademikController::class, 'index'])->name('mahasiswa.pembimbing.akademik.index');
        Route::get('/lapangan', [PembimbingLapanganController::class, 'index'])->name('mahasiswa.pembimbing.lapangan.index');
        Route::get('/lapangan/create', [PembimbingLapanganController::class, 'create'])->name('mahasiswa.pembimbing.lapangan.create');
    });

    Route::group(['prefix' => 'ubah-password'], function () {
        Route::get('/', [UbahPasswordController::class, 'index'])->name('mahasiswa.ubah-password.index');
        Route::post('/update', [UbahPasswordController::class, 'update'])->name('mahasiswa.ubah-password.update');
    });
    
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('mahasiswa.dokumen.index');
    Route::get('/template-laporan', [TemplateLaporanController::class, 'index'])->name('mahasiswa.template-laporan.index');
    Route::get('/log', [LogActivityController::class, 'index'])->name('mahasiswa.log-activity.index');
});

