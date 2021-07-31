<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembAkademik\PembAkademikDashboardController;
use App\Http\Controllers\PembAkademik\PembAkademikDetailMahasiswaController;
use App\Http\Controllers\PembAkademik\PembAkademikFormPenilaianController;
use App\Http\Controllers\PembAkademik\PembAkademikMahasiswaController;
use App\Http\Controllers\PembAkademik\PembAkademikLogKegiatanController;
use App\Http\Controllers\PembAkademik\PembAkademikPenilaianController;
use App\Http\Controllers\PembAkademik\PembAkademikLaporanKPController;
use App\Http\Controllers\PembAkademik\PembAkademikProfileController;

Route::middleware(['auth:pembimbing-akademik'])->prefix('pembimbing-akademik')->group(function () {
    Route::get('/', [PembAkademikDashboardController::class, 'index'])->name('pembimbing-akademik.index');
    Route::prefix('data-mahasiswa')->group(function () {
        Route::get('/', [PembAkademikMahasiswaController::class, 'index'])->name('pembimbing-akademik.data-mahasiswa');
        Route::get('/detail-mahasiswa', [PembAkademikDetailMahasiswaController::class, 'index'])->name('pembimbing-akademik.data-mahasiswa.detail-mahasiswa');
    });
    Route::get('/log-kegiatan', [PembAkademikLogKegiatanController::class, 'index'])->name('pembimbing-akademik.log-kegiatan');
    Route::get('/penilaian', [PembAkademikPenilaianController::class, 'index'])->name('pembimbing-akademik.penilaian');
    Route::get('/form-penilaian', [PembAkademikFormPenilaianController::class, 'index'])->name('pembimbing-akademik.form-penilaian');
    Route::get('/laporan-kp', [PembAkademikLaporanKPController::class, 'index'])->name('pembimbing-akademik.laporan-kp');
    Route::get('/profil', [PembAkademikProfileController::class, 'index'])->name('pembimbing-akademik.profil');
});
