<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembLapangan\PembLapanganDashboardController;
use App\Http\Controllers\PembLapangan\PembLapanganDetailMahasiswaController;
use App\Http\Controllers\PembLapangan\PembLapanganMahasiswaController;
use App\Http\Controllers\PembLapangan\PembLapanganLogKegiatanController;
use App\Http\Controllers\PembLapangan\PembLapanganPenilaianController;
use App\Http\Controllers\PembLapangan\PembLapanganLaporanKPController;
use App\Http\Controllers\PembLapangan\PembLapanganProfileController;

Route::middleware(['auth:pembimbing-lapangan'])->prefix('pembimbing-lapangan')->group(function () {
    Route::get('/', [PembLapanganDashboardController::class, 'index'])->name('pembimbing-lapangan.index');
    Route::prefix('data-mahasiswa')->group(function () {
        Route::get('/', [PembLapanganMahasiswaController::class, 'index'])->name('pembimbing-lapangan.data-mahasiswa');
    });
    Route::get('/log-kegiatan', [PembLapanganLogKegiatanController::class, 'index'])->name('pembimbing-lapangan.log-kegiatan');
    Route::get('/penilaian', [PembLapanganPenilaianController::class, 'index'])->name('pembimbing-lapangan.penilaian');
    Route::get('/laporan-kp', [PembLapanganLaporanKPController::class, 'index'])->name('pembimbing-lapangan.laporan-kp');
    Route::get('/profil', [PembLapanganProfileController::class, 'index'])->name('pembimbing-lapangan.profil');
    Route::get('/detail-mahasiswa', [PembLapanganDetailMahasiswaController::class, 'index'])->name('pembimbing-akademik.detail-mahasiswa');
});
