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
use App\Http\Controllers\Admin\PloController;
use App\Http\Controllers\Admin\CloController;
use App\Http\Controllers\Admin\IndikatorPenilaianController;
use App\Http\Controllers\Admin\BobotPenilaianController;
use App\Http\Controllers\Admin\KerjaPraktekController;
use App\Http\Controllers\Admin\NilaiMahasiswaController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\UbahPasswordController;
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

    Route::prefix('learning-outcomes')->group(function () {
        Route::prefix('plo')->group(function () {
            Route::get('/', [PloController::class, 'index'])->name('learning-outcomes.plo');
            Route::post('/store', [PloController::class, 'store'])->name('learning-outcomes.plo.store');
            Route::post('/update/{id}', [PloController::class, 'update'])->name('learning-outcomes.plo.update');
            Route::get('/destroy/{id}', [PloController::class, 'destroy'])->name('learning-outcomes.plo.destroy');
        });
        Route::prefix('clo')->group(function () {
            Route::get('/', [CloController::class, 'index'])->name('learning-outcomes.clo');
            Route::post('/store', [CloController::class, 'store'])->name('learning-outcomes.clo.store');
            Route::post('/update/{id}', [CloController::class, 'update'])->name('learning-outcomes.clo.update');
            Route::get('/destroy/{id}', [CloController::class, 'destroy'])->name('learning-outcomes.clo.destroy');
        });
        Route::prefix('indikator-penilaian')->group(function () {
            Route::get('/', [IndikatorPenilaianController::class, 'index'])->name('learning-outcomes.indikator-penilaian');
            Route::post('/store', [IndikatorPenilaianController::class, 'store'])->name('learning-outcomes.indikator-penilaian.store');
            Route::post('/update/{id}', [IndikatorPenilaianController::class, 'update'])->name('learning-outcomes.indikator-penilaian.update');
            Route::get('/destroy/{id}', [IndikatorPenilaianController::class, 'destroy'])->name('learning-outcomes.indikator-penilaian.destroy');
        });
        Route::prefix('bobot-penilaian')->group(function () {
            Route::get('/', [BobotPenilaianController::class, 'index'])->name('bobot-penilaian');
            Route::post('/store/pembimbing-akademik', [BobotPenilaianController::class, 'storePembAkd'])->name('bobot-penilaian.pembimbing-akademik.store');
            Route::post('/store/pembimbing-lapangan', [BobotPenilaianController::class, 'storePembLap'])->name('bobot-penilaian.pembimbing-lapangan.store');
            Route::post('/update/pembimbing-akademik/{id}', [BobotPenilaianController::class, 'updatePembAkd'])->name('bobot-penilaian.pembimbing-akademik.update');
            Route::post('/update/pembimbing-lapangan/{id}', [BobotPenilaianController::class, 'updatePembLap'])->name('bobot-penilaian.pembimbing-lapangan.update');
            Route::get('/destroy/pembimbing-akademik/{id}', [BobotPenilaianController::class, 'destroyPembAkd'])->name('bobot-penilaian.pembimbing-akademik.destroy');
            Route::get('/destroy/pembimbing-lapangan/{id}', [BobotPenilaianController::class, 'destroyPembLap'])->name('bobot-penilaian.pembimbing-lapangan.destroy');
        });
    });

    Route::prefix('surat-pengantar')->group(function () {
        Route::get('/', [AdminSuratPengantarController::class, 'index'])->name('admin.surat-pengantar');
        Route::post('/store', [AdminSuratPengantarController::class, 'store'])->name('admin.surat-pengantar.store');
        Route::post('/update/{id}', [AdminSuratPengantarController::class, 'update'])->name('admin.surat-pengantar.update');
        Route::get('/destroy/{id}', [AdminSuratPengantarController::class, 'destroy'])->name('admin.surat-pengantar.destroy');
        Route::get('/get/{file}', [AdminSuratPengantarController::class, 'getFile'])->name('admin.surat-pengantar.get');
    });

    Route::prefix('dokumen-kp')->group(function () {
        Route::get('/', [AdminDokumenKpController::class, 'index'])->name('admin.dokumen-kp');
        Route::post('/store', [AdminDokumenKpController::class, 'store'])->name('admin.dokumen-kp.store');
        Route::post('/update/{id}', [AdminDokumenKpController::class, 'update'])->name('admin.dokumen-kp.update');
        Route::get('/destroy/{id}', [AdminDokumenKpController::class, 'destroy'])->name('admin.dokumen-kp.destroy');
        Route::get('/get/{file}', [AdminDokumenKpController::class, 'getFile'])->name('admin.dokumen-kp.get');
    });

    Route::prefix('dokumen-mahasiswa')->group(function () {
        Route::get('/', [AdminDokumenMahasiswaController::class, 'index'])->name('admin.dokumen-mahasiswa');
        Route::get('/get/{file}', [AdminDokumenMahasiswaController::class, 'getFile'])->name('admin.dokumen-mahasiswa.get');
        Route::get('/destroy/{id}', [AdminDokumenMahasiswaController::class, 'destroy'])->name('admin.dokumen-mahasiswa.destroy');
    });

    Route::prefix('kerja-praktek')->group(function () {
        Route::get('/', [KerjaPraktekController::class, 'index'])->name('kerja-praktek');
        Route::post('/store', [KerjaPraktekController::class, 'store'])->name('kerja-praktek.store');
        Route::get('/show/{id}', [KerjaPraktekController::class, 'show'])->name('kerja-praktek.show');
        Route::post('/update/{id}', [KerjaPraktekController::class, 'update'])->name('kerja-praktek.update');
        Route::get('/destroy/{id}', [KerjaPraktekController::class, 'destroy'])->name('kerja-praktek.destroy');
    });
    Route::prefix('nilai-mahasiswa')->group(function () {
        Route::get('/', [NilaiMahasiswaController::class, 'index'])->name('admin.nilai-mahasiswa');
        Route::get('/show/{id}', [NilaiMahasiswaController::class, 'show'])->name('admin.nilai-mahasiswa.show');
    });
    Route::prefix('profil')->group(function () {
        Route::get('/', [ProfilController::class, 'index'])->name('admin.profil');
        Route::post('/update', [ProfilController::class, 'update'])->name('admin.profil.update');
    });
    Route::prefix('ubah-password')->group(function () {
        Route::get('/', [UbahPasswordController::class, 'index'])->name('admin.ubah-password');
        Route::post('/update', [UbahPasswordController::class, 'update'])->name('admin.ubah-password.update');
    });
});
