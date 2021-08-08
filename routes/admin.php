<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminMahasiswaController;
use App\Http\Controllers\Admin\AdminPembimbingAkademikController;
use App\Http\Controllers\Admin\AdminPembimbingLapanganController;
use App\Http\Controllers\Admin\AdminProgramStudiController;
use App\Http\Controllers\Admin\AdminKelasController;
use App\Http\Controllers\Admin\AdminKelompokKeahlianController;
use App\Http\Controllers\Admin\AdminPeminatanController;
use App\Http\Controllers\Admin\AdminPeriodeController;
use App\Http\Controllers\Admin\AdminSuratPengantarController;
use App\Http\Controllers\Admin\AdminDokumenKpController;
use App\Http\Controllers\Admin\AdminDokumenMahasiswaController;
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
        Route::prefix('kelompok-keahlian')->group(function () {
            Route::get('/', [AdminKelompokKeahlianController::class, 'index'])->name('admin.data.kelompok-keahlian');
            Route::post('/store', [AdminKelompokKeahlianController::class, 'store'])->name('admin.data.kelompok-keahlian.store');
            Route::post('/update/{id}', [AdminKelompokKeahlianController::class, 'update'])->name('admin.data.kelompok-keahlian.update');
            Route::get('/destroy/{id}', [AdminKelompokKeahlianController::class, 'destroy'])->name('admin.data.kelompok-keahlian.destroy');
        });
        Route::prefix('peminatan')->group(function () {
            Route::get('/', [AdminPeminatanController::class, 'index'])->name('admin.data.peminatan');
            Route::post('/store', [AdminPeminatanController::class, 'store'])->name('admin.data.peminatan.store');
            Route::post('/update/{id}', [AdminPeminatanController::class, 'update'])->name('admin.data.peminatan.update');
            Route::get('/destroy/{id}', [AdminPeminatanController::class, 'destroy'])->name('admin.data.peminatan.destroy');
        });
        Route::prefix('periode')->group(function () {
            Route::get('/', [AdminPeriodeController::class, 'index'])->name('admin.data.periode');
            Route::post('/store', [AdminPeriodeController::class, 'store'])->name('admin.data.periode.store');
            Route::post('/update/{id}', [AdminPeriodeController::class, 'update'])->name('admin.data.periode.update');
            Route::get('/destroy/{id}', [AdminPeriodeController::class, 'destroy'])->name('admin.data.periode.destroy');
        });
    });

    Route::prefix('clo-plo')->group(function () {
        Route::prefix('plo')->group(function () {
            Route::get('/', [AdminPloController::class, 'index'])->name('admin.plo');
            Route::post('/store', [AdminPloController::class, 'store'])->name('admin.plo.store');
            Route::post('/update/{id}', [AdminPloController::class, 'update'])->name('admin.plo.update');
            Route::get('/destroy/{id}', [AdminPloController::class, 'destroy'])->name('admin.plo.destroy');
        });
        Route::prefix('clo')->group(function () {
            Route::get('/', [AdminCloController::class, 'index'])->name('admin.clo');
            Route::post('/store', [AdminCloController::class, 'store'])->name('admin.clo.store');
            Route::post('/update/{id}', [AdminCloController::class, 'update'])->name('admin.clo.update');
            Route::get('/destroy/{id}', [AdminCloController::class, 'destroy'])->name('admin.clo.destroy');
        });
        Route::prefix('sub-clo')->group(function () {
            Route::get('/', [AdminSubCloController::class, 'index'])->name('admin.sub-clo');
            Route::post('/store', [AdminSubCloController::class, 'store'])->name('admin.sub-clo.store');
            Route::post('/update/{id}', [AdminSubCloController::class, 'update'])->name('admin.sub-clo.update');
            Route::get('/destroy/{id}', [AdminSubCloController::class, 'destroy'])->name('admin.sub-clo.destroy');
        });
    });

    Route::prefix('surat-pengantar')->group(function () {
        Route::get('/', [AdminSuratPengantarController::class, 'index'])->name('admin.surat-pengantar');
        Route::post('/store', [AdminSuratPengantarController::class, 'store'])->name('admin.surat-pengantar.store');
        Route::post('/update{id}', [AdminSuratPengantarController::class, 'update'])->name('admin.surat-pengantar.update');
        Route::get('/destroy/{id}', [AdminSuratPengantarController::class, 'destroy'])->name('admin.surat-pengantar.destroy');
        Route::get('/get/{file}', [AdminSuratPengantarController::class, 'getFile'])->name('admin.surat-pengantar.get');
    });

    Route::prefix('dokumen-kp')->group(function () {
        Route::get('/', [AdminDokumenKpController::class, 'index'])->name('admin.dokumen-kp');
        Route::post('/store', [AdminDokumenKpController::class, 'store'])->name('admin.dokumen-kp.store');
        Route::post('/update{id}', [AdminDokumenKpController::class, 'update'])->name('admin.dokumen-kp.update');
        Route::get('/destroy/{id}', [AdminDokumenKpController::class, 'destroy'])->name('admin.dokumen-kp.destroy');
        Route::get('/get/{file}', [AdminDokumenKpController::class, 'getFile'])->name('admin.dokumen-kp.get');
    });

    Route::prefix('dokumen-mahasiswa')->group(function () {
        Route::get('/', [AdminDokumenMahasiswaController::class, 'index'])->name('admin.dokumen-mahasiswa');
        Route::get('/get/{file}', [AdminDokumenMahasiswaController::class, 'getFile'])->name('admin.dokumen-mahasiswa.get');
    });
});
