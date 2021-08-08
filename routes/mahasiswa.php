<?php

use App\Http\Controllers\Mahasiswa\BuatPengajuanController;
use App\Http\Controllers\Mahasiswa\DaftarPengajuanController;
use App\Http\Controllers\Mahasiswa\DashboardController;
use App\Http\Controllers\Mahasiswa\DokumenController;
use App\Http\Controllers\Mahasiswa\DokumenMahasiswaController;
use App\Http\Controllers\Mahasiswa\KerjaPraktekDataController;
use App\Http\Controllers\Mahasiswa\KerjaPraktekDokumenController;
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
        Route::post('/akademik/store', [PembimbingAkademikController::class, 'store'])->name('mahasiswa.pembimbing.akademik.store');
        Route::get('/lapangan', [PembimbingLapanganController::class, 'index'])->name('mahasiswa.pembimbing.lapangan.index');
        Route::get('/lapangan/create', [PembimbingLapanganController::class, 'create'])->name('mahasiswa.pembimbing.lapangan.create');
        Route::post('/lapangan/store', [PembimbingLapanganController::class, 'store'])->name('mahasiswa.pembimbing.lapangan.store');
        Route::post('/lapangan/store/new', [PembimbingLapanganController::class, 'storeNew'])->name('mahasiswa.pembimbing.lapangan.store.new');
    });

    Route::group(['prefix' => 'ubah-password'], function () {
        Route::get('/', [UbahPasswordController::class, 'index'])->name('mahasiswa.ubah-password.index');
        Route::post('/update', [UbahPasswordController::class, 'update'])->name('mahasiswa.ubah-password.update');
    });

    Route::group(['prefix' => 'kerja-praktek'], function () {
        Route::get('/data', [KerjaPraktekDataController::class, 'index'])->name('mahasiswa.kerja-praktek.data.index');
        Route::group(['prefix' => 'dokumen-kp'], function () {
            Route::get('/', [KerjaPraktekDokumenController::class, 'index'])->name('mahasiswa.kerja-praktek.dokumen-kp.index');
            Route::post('/krs', [KerjaPraktekDokumenController::class, 'storeKrs'])->name('mahasiswa.kerja-praktek.dokumen-kp.storeKrs');
            Route::post('/bukti-diterima', [KerjaPraktekDokumenController::class, 'storeDiterima'])->name('mahasiswa.kerja-praktek.dokumen-kp.storeDiterima');
            Route::post('/laporan', [KerjaPraktekDokumenController::class, 'storeLaporan'])->name('mahasiswa.kerja-praktek.dokumen-kp.storeLaporan');
            Route::post('/bukti-selesai', [KerjaPraktekDokumenController::class, 'storeSelesai'])->name('mahasiswa.kerja-praktek.dokumen-kp.storeSelesai');
        });
        Route::get('/data/create', [KerjaPraktekDataController::class, 'create'])->name('mahasiswa.kerja-praktek.data.create');
        Route::post('/data/store', [KerjaPraktekDataController::class, 'store'])->name('mahasiswa.kerja-praktek.data.store');
    });
    
    Route::group(['prefix' => 'log'], function () {
        Route::get('/', [LogActivityController::class, 'index'])->name('mahasiswa.log-activity.index');
        Route::post('/store', [LogActivityController::class, 'store'])->name('mahasiswa.log-activity.store');
        Route::post('/update', [LogActivityController::class, 'update'])->name('mahasiswa.log-activity.update');
    });

    Route::group(['prefix' => 'surat-pengantar'], function () {
        Route::post('/', [BuatPengajuanController::class, 'store'])->name('mahasiswa.surat-pengantar.store');
    });

    Route::get('/dokumen-mahasiswa', [DokumenMahasiswaController::class, 'index'])->name('mahasiswa.template-laporan.index');
    Route::get('/dokumen-mahasiswa/download/{namaFile}', [DokumenMahasiswaController::class, 'download'])->name('mahasiswa.template-laporan.download');
});

