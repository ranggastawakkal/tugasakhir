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
            Route::post('/store', [AdminMahasiswaController::class, 'store'])->name('admin.data.mahasiswa.store');
            Route::post('/update/{id}', [AdminMahasiswaController::class, 'update'])->name('admin.data.mahasiswa.update');
            Route::get('/destroy/{id}', [AdminMahasiswaController::class, 'destroy'])->name('admin.data.mahasiswa.destroy');
        });
        Route::prefix('pembimbing-akademik')->group(function () {
            Route::get('/', [AdminPembimbingAkademikController::class, 'index'])->name('admin.data.pembimbing-akademik');
            Route::post('/store', [AdminPembimbingAkademikController::class, 'store'])->name('admin.data.pembimbing-akademik.store');
            Route::post('/update/{id}', [AdminPembimbingAkademikController::class, 'update'])->name('admin.data.pembimbing-akademik.update');
            Route::get('/destroy/{id}', [AdminPembimbingAkademikController::class, 'destroy'])->name('admin.data.pembimbing-akademik.destroy');
        });
        Route::prefix('pembimbing-lapangan')->group(function () {
            Route::get('/', [AdminPembimbingLapanganController::class, 'index'])->name('admin.data.pembimbing-lapangan');
            Route::post('/store', [AdminPembimbingLapanganController::class, 'store'])->name('admin.data.pembimbing-lapangan.store');
            Route::post('/update/{id}', [AdminPembimbingLapanganController::class, 'update'])->name('admin.data.pembimbing-lapangan.update');
            Route::get('/destroy/{id}', [AdminPembimbingLapanganController::class, 'destroy'])->name('admin.data.pembimbing-lapangan.destroy');
        });
        Route::prefix('program-studi')->group(function () {
            Route::get('/', [AdminProgramStudiController::class, 'index'])->name('admin.data.program-studi');
            Route::post('/store', [AdminProgramStudiController::class, 'store'])->name('admin.data.program-studi.store');
            Route::post('/update/{id}', [AdminProgramStudiController::class, 'update'])->name('admin.data.program-studi.update');
            Route::get('/destroy/{id}', [AdminProgramStudiController::class, 'destroy'])->name('admin.data.program-studi.destroy');
        });
        Route::prefix('kelas')->group(function () {
            Route::get('/', [AdminKelasController::class, 'index'])->name('admin.data.kelas');
            Route::post('/store', [AdminKelasController::class, 'store'])->name('admin.data.kelas.store');
            Route::post('/update/{id}', [AdminKelasController::class, 'update'])->name('admin.data.kelas.update');
            Route::get('/destroy/{id}', [AdminKelasController::class, 'destroy'])->name('admin.data.kelas.destroy');
        });
    });
    Route::prefix('surat-pengantar')->group(function () {
        Route::get('/', [AdminSuratPengantarController::class, 'index'])->name('admin.surat-pengantar');
        Route::post('/store', [AdminSuratPengantarController::class, 'store'])->name('admin.surat-pengantar.store');
        Route::post('/update{id}', [AdminSuratPengantarController::class, 'update'])->name('admin.surat-pengantar.update');
        Route::get('/destroy/{id}', [AdminSuratPengantarController::class, 'destroy'])->name('admin.surat-pengantar.destroy');
    });
    Route::get('/template-laporan', [AdminTemplateLaporanController::class, 'index'])->name('admin.template-laporan');
    Route::get('/dokumen-kp', [AdminDokumenKPController::class, 'index'])->name('admin.dokumen-kp');
});
