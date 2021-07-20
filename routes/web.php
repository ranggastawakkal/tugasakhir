<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PembimbingAkademikController;
use App\Http\Controllers\PembimbingLapanganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'formLogin'])->name('form-login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/data/mahasiswa', [AdminController::class, 'dataMahasiswa'])->name('admin.data.mahasiswa');
    Route::get('/admin/data/pembimbing-akademik', [AdminController::class, 'dataPembimbingAkademik'])->name('admin.data.pembimbing-akademik');
    Route::get('/admin/data/pembimbing-lapangan', [AdminController::class, 'dataPembimbingLapangan'])->name('admin.data.pembimbing-lapangan');
    Route::get('/admin/data/kelas', [AdminController::class, 'dataKelas'])->name('admin.data.kelas');
    Route::get('/admin/data/program-studi', [AdminController::class, 'dataProgramStudi'])->name('admin.data.program-studi');
    Route::get('/admin/surat-pengantar', [AdminController::class, 'suratPengantar'])->name('admin.surat-pengantar');
});

Route::middleware(['auth:mahasiswa'])->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
});

Route::middleware(['auth:pembimbing-akademik'])->prefix('pembimbing-akademik')->group(function () {
    Route::get('/', [PembimbingAkademikController::class, 'index'])->name('pembimbing-akademik.index');
    Route::get('/data-mahasiswa', [PembimbingAkademikController::class, 'dataMahasiswa'])->name('pembimbing-akademik.data-mahasiswa');
    Route::get('/log-kegiatan', [PembimbingAkademikController::class, 'logKegiatan'])->name('pembimbing-akademik.log-kegiatan');
    Route::get('/penilaian', [PembimbingAkademikController::class, 'penilaian'])->name('pembimbing-akademik.penilaian');
    Route::get('/laporan-kp', [PembimbingAkademikController::class, 'laporanKP'])->name('pembimbing-akademik.laporan-kp');
});

Route::middleware(['auth:pembimbing-lapangan'])->group(function () {
    Route::get('/pembimbing-lapangan', [PembimbingLapanganController::class, 'index'])->name('pembimbing-lapangan.index');
});

Route::get('/cekversi', function () {
    $laravel = app();
    return "Versi laravelmu adalah " . $laravel::VERSION;
});

Route::get('users/{id}', function ($id) {
});
