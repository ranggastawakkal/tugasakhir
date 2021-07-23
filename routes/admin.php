<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminKelasController;
use App\Http\Controllers\Admin\AdminMahasiswaController;
use App\Http\Controllers\Admin\AdminPembimbingAkademikController;
use App\Http\Controllers\Admin\AdminPembimbingLapanganController;
use App\Http\Controllers\Admin\AdminProgramStudiController;
use App\Http\Controllers\Admin\AdminSuratPengantarController;
use App\Http\Controllers\Admin\AdminTemplateLaporanController;
use App\Http\Controllers\Admin\AdminDokumenKPController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.index');
    Route::prefix('data')->group(function () {
        Route::prefix('mahasiswa')->group(function () {
            Route::get('/', [AdminMahasiswaController::class, 'index'])->name('admin.data.mahasiswa');
            Route::get('/cari', [AdminMahasiswaController::class, 'cari'])->name('admin.data.mahasiswa.cari');
        });
        Route::get('/pembimbing-akademik', [AdminPembimbingAkademikController::class, 'index'])->name('admin.data.pembimbing-akademik');
        Route::get('/pembimbing-lapangan', [AdminPembimbingLapanganController::class, 'index'])->name('admin.data.pembimbing-lapangan');
        Route::get('/kelas', [AdminKelasController::class, 'index'])->name('admin.data.kelas');
        Route::get('/program-studi', [AdminProgramStudiController::class, 'index'])->name('admin.data.program-studi');
    });
    Route::get('/surat-pengantar', [AdminSuratPengantarController::class, 'index'])->name('admin.surat-pengantar');
    Route::get('/template-laporan', [AdminTemplateLaporanController::class, 'index'])->name('admin.template-laporan');
    Route::get('/dokumen-kp', [AdminDokumenKPController::class, 'index'])->name('admin.dokumen-kp');
});
