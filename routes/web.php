<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminKelasController;
use App\Http\Controllers\Admin\AdminMahasiswaController;
use App\Http\Controllers\Admin\AdminPembimbingAkademikController;
use App\Http\Controllers\Admin\AdminPembimbingLapanganController;
use App\Http\Controllers\Admin\AdminProgramStudiController;
use App\Http\Controllers\Admin\AdminSuratPengantarController;
use App\Http\Controllers\Admin\AdminTemplateLaporanController;
use App\Http\Controllers\Admin\AdminDokumenKPController;
use App\Http\Controllers\Mahasiswa\MhsBuatPengajuanController;
use App\Http\Controllers\Mahasiswa\MhsDaftarPengajuanController;
use App\Http\Controllers\Mahasiswa\MhsDashboardController;
use App\Http\Controllers\Mahasiswa\MhsDokumenController;
use App\Http\Controllers\Mahasiswa\MhsPembimbingAkademikController;
use App\Http\Controllers\Mahasiswa\MhsPembimbingLapanganController;
use App\Http\Controllers\Mahasiswa\MhsProfileController;
use App\Http\Controllers\Mahasiswa\MhsTemplateLaporanController;
use App\Http\Controllers\Mahasiswa\MhsUbahPasswordController;
use App\Http\Controllers\Mahasiswa\PembimbingAkademikController;
use App\Http\Controllers\Mahasiswa\PembimbingLapanganController;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::group(['middleware' => ['auth:mahasiswa'], 'prefix' => 'mahasiswa'], function () {
    Route::get('/', [MhsDashboardController::class, 'index'])->name('mahasiswa.index');
    Route::get('/buat-pengajuan/index', [MhsBuatPengajuanController::class, 'index'])->name('mahasiswa.buat-pengajuan.index');
    Route::get('/daftar-pengajuan/index', [MhsDaftarPengajuanController::class, 'index'])->name('mahasiswa.daftar-pengajuan.index');
    Route::group(['prefix' => 'profil'], function () {
        Route::get('/', [MhsProfileController::class, 'index'])->name('mahasiswa.profil.index');
    });
    Route::group(['prefix' => 'pembimbing'], function () {
        Route::get('/akademik', [MhsPembimbingAkademikController::class, 'index'])->name('mahasiswa.pembimbing.akademik.index');
        Route::get('/lapangan', [MhsPembimbingLapanganController::class, 'index'])->name('mahasiswa.pembimbing.lapangan.index');
    });
    Route::get('/ubah-password', [MhsUbahPasswordController::class, 'index'])->name('mahasiswa.ubah-password.index');
    Route::get('/dokumen', [MhsDokumenController::class, 'index'])->name('mahasiswa.dokumen.index');
    Route::get('/template-laporan', [MhsTemplateLaporanController::class, 'index'])->name('mahasiswa.template-laporan.index');
});


Route::middleware(['auth:pembimbing-akademik'])->group(function () {
    Route::get('/pembimbing-akademik', [PembimbingAkademikController::class, 'index'])->name('pembimbing-akademik.index');
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
