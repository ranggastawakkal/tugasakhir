<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembAkademik\PembAkademikDashboardController;
use App\Http\Controllers\PembAkademik\PembAkademikMahasiswaController;
use App\Http\Controllers\PembAkademik\PembAkademikLogAktivitasController;
use App\Http\Controllers\PembAkademik\PembAkademikPenilaianMahasiswaController;
use App\Http\Controllers\PembAkademik\PembAkademikPenilaianController;
use App\Http\Controllers\PembAkademik\PembAkademikLaporanKpController;
use App\Http\Controllers\PembAkademik\PembAkademikProfileController;

Route::middleware(['auth:pembimbing-akademik'])->prefix('pembimbing-akademik')->group(function () {
    Route::get('/', [PembAkademikDashboardController::class, 'index'])->name('pembimbing-akademik.index');
    Route::prefix('data-mahasiswa')->group(function () {
        Route::get('/', [PembAkademikMahasiswaController::class, 'index'])->name('pembimbing-akademik.data-mahasiswa');
        Route::get('/show/{id}', [PembAkademikMahasiswaController::class, 'show'])->name('pembimbing-akademik.data-mahasiswa.show');
    });
    Route::prefix('log-aktivitas')->group(function () {
        Route::get('/', [PembAkademikLogAktivitasController::class, 'index'])->name('pembimbing-akademik.log-aktivitas');
        Route::get('/show/{id}', [PembAkademikLogAktivitasController::class, 'show'])->name('pembimbing-akademik.log-aktivitas.show');
    });
    Route::prefix('laporan-kp')->group(function () {
        Route::get('/', [PembAkademikLaporanKpController::class, 'index'])->name('pembimbing-akademik.laporan-kp');
        Route::get('/get/{file}', [PembAkademikLaporanKpController::class, 'getFile'])->name('pembimbing-akademik.laporan-kp.get');
    });
    Route::prefix('penilaian')->group(function () {
        Route::get('/indikator-penilaian', [PembAkademikPenilaianController::class, 'index'])->name('pembimbing-akademik.penilaian.indikator-penilaian');
        Route::prefix('penilaian-mahasiswa')->group(function () {
            Route::get('/index', [PembAkademikPenilaianMahasiswaController::class, 'index'])->name('pembimbing-akademik.penilaian.penilaian-mahasiswa.index');
            Route::get('/show/{id}', [PembAkademikPenilaianMahasiswaController::class, 'show'])->name('pembimbing-akademik.penilaian.penilaian-mahasiswa.show');
            Route::post('/store', [PembAkademikPenilaianMahasiswaController::class, 'store'])->name('pembimbing-akademik.penilaian.penilaian-mahasiswa.store');
        });
    });
    Route::get('/profil', [PembAkademikProfileController::class, 'index'])->name('pembimbing-akademik.profil');
});
