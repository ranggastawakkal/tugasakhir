<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembLapangan\DashboardController;
use App\Http\Controllers\PembLapangan\PembLapanganDetailMahasiswaController;
use App\Http\Controllers\PembLapangan\PembLapanganMahasiswaController;
use App\Http\Controllers\PembLapangan\PembLapanganLogAktivitasController;
use App\Http\Controllers\PembLapangan\PembLapanganPenilaianMahasiswaController;
use App\Http\Controllers\PembLapangan\PembLapanganLaporanKpController;
use App\Http\Controllers\PembLapangan\DokumenKpController;
use App\Http\Controllers\PembLapangan\PenilaianMahasiswaController;
use App\Http\Controllers\PembLapangan\PembLapanganProfilController;
use App\Http\Controllers\PembLapangan\PembLapanganUbahPasswordController;

Route::middleware(['auth:pembimbing-lapangan'])->prefix('pembimbing-lapangan')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('pembimbing-lapangan.index');
    Route::prefix('data-mahasiswa')->group(function () {
        Route::get('/', [PembLapanganMahasiswaController::class, 'index'])->name('pembimbing-lapangan.data-mahasiswa');
        Route::get('/show/{id}', [PembLapanganMahasiswaController::class, 'show'])->name('pembimbing-lapangan.data-mahasiswa.show');
    });
    Route::prefix('log-aktivitas')->group(function () {
        Route::get('/', [PembLapanganLogAktivitasController::class, 'index'])->name('pembimbing-lapangan.log-aktivitas');
        Route::get('/show/{id}', [PembLapanganLogAktivitasController::class, 'show'])->name('pembimbing-lapangan.log-aktivitas.show');
        Route::post('/update/{id}', [PembLapanganLogAktivitasController::class, 'update'])->name('pembimbing-lapangan.log-aktivitas.update');
    });
    Route::prefix('laporan-kp')->group(function () {
        Route::get('/', [PembLapanganLaporanKpController::class, 'index'])->name('pembimbing-lapangan.laporan-kp');
        Route::get('/get/{file}', [PembLapanganLaporanKpController::class, 'getFile'])->name('pembimbing-lapangan.laporan-kp.get');
    });
    Route::prefix('dokumen-kp')->group(function () {
        Route::get('/', [DokumenKpController::class, 'index'])->name('pembimbing-lapangan.dokumen-kp');
        Route::get('/get/{file}', [DokumenKpController::class, 'getFile'])->name('pembimbing-lapangan.dokumen-kp.get');
    });
    Route::prefix('penilaian-mahasiswa')->group(function () {
        Route::get('/index', [PenilaianMahasiswaController::class, 'index'])->name('pembimbing-lapangan.penilaian-mahasiswa');
        Route::post('/store', [PenilaianMahasiswaController::class, 'store'])->name('pembimbing-lapangan.penilaian-mahasiswa.store');
        Route::get('/show/{id}', [PenilaianMahasiswaController::class, 'show'])->name('pembimbing-lapangan.penilaian-mahasiswa.show');
        Route::post('/update', [PenilaianMahasiswaController::class, 'update'])->name('pembimbing-lapangan.penilaian-mahasiswa.update');
    });
    Route::prefix('profil')->group(function () {
        Route::get('/', [PembLapanganProfilController::class, 'index'])->name('pembimbing-lapangan.profil.index');
        Route::post('/update', [PembLapanganProfilController::class, 'update'])->name('pembimbing-lapangan.profil.update');
    });
    Route::prefix('ubah-password')->group(function () {
        Route::get('/', [PembLapanganUbahPasswordController::class, 'index'])->name('pembimbing-lapangan.ubah-password.index');
        Route::post('/update', [PembLapanganUbahPasswordController::class, 'update'])->name('pembimbing-lapangan.ubah-password.update');
    });
});
