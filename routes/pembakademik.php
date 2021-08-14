<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembAkademik\PembAkademikDashboardController;
use App\Http\Controllers\PembAkademik\PembAkademikMahasiswaController;
use App\Http\Controllers\PembAkademik\PembAkademikLogAktivitasController;
use App\Http\Controllers\PembAkademik\DokumenMahasiswaController;
use App\Http\Controllers\PembAkademik\DokumenKpController;
use App\Http\Controllers\PembAkademik\PenilaianMahasiswaController;
use App\Http\Controllers\PembAkademik\ProfilController;
use App\Http\Controllers\PembAkademik\UbahPasswordController;

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
    Route::prefix('dokumen-mahasiswa')->group(function () {
        Route::get('/', [DokumenMahasiswaController::class, 'index'])->name('pembimbing-akademik.dokumen-mahasiswa');
        Route::get('/get/{file}', [DokumenMahasiswaController::class, 'getFile'])->name('pembimbing-akademik.dokumen-mahasiswa.get');
    });
    Route::prefix('dokumen-kp')->group(function () {
        Route::get('/', [DokumenKpController::class, 'index'])->name('pembimbing-akademik.dokumen-kp');
        Route::get('/get/{file}', [DokumenKpController::class, 'getFile'])->name('pembimbing-akademik.dokumen-kp.get');
    });
    Route::prefix('penilaian-mahasiswa')->group(function () {
        Route::get('/index', [PenilaianMahasiswaController::class, 'index'])->name('pembimbing-akademik.penilaian-mahasiswa');
        Route::post('/store', [PenilaianMahasiswaController::class, 'store'])->name('pembimbing-akademik.penilaian-mahasiswa.store');
        Route::get('/show/{id}', [PenilaianMahasiswaController::class, 'show'])->name('pembimbing-akademik.penilaian-mahasiswa.show');
        Route::post('/update', [PenilaianMahasiswaController::class, 'update'])->name('pembimbing-akademik.penilaian-mahasiswa.update');
    });
    Route::prefix('profil')->group(function () {
        Route::get('/', [ProfilController::class, 'index'])->name('pembimbing-akademik.profil');
        Route::post('/update', [ProfilController::class, 'update'])->name('pembimbing-akademik.profil.update');
    });
    Route::prefix('ubah-password')->group(function () {
        Route::get('/', [UbahPasswordController::class, 'index'])->name('pembimbing-akademik.ubah-password');
        Route::post('/update', [UbahPasswordController::class, 'update'])->name('pembimbing-akademik.ubah-password.update');
    });
});
