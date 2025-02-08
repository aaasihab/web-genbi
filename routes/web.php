<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Beasiswa_bi\PengumumanController;
use App\Http\Controllers\Beasiswa_bi\PersyaratanController;
use App\Http\Controllers\Beasiswa_bi\TentangBiController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\Tentang\GenbiPointController;
use App\Http\Controllers\Tentang\Struktur\AnggotaController;
use App\Http\Controllers\Tentang\Struktur\DivisiController;
use App\Http\Controllers\Tentang\Struktur\OrganisasiController;
use App\Http\Controllers\Tentang\Struktur\PengurusDivisiController;
use App\Http\Controllers\Tentang\Struktur\PengurusHarianController;
use App\Http\Controllers\Tentang\StrukturController;
use App\Http\Controllers\Tentang\TentangGenbiController;
use App\Models\Struktur\Organisasi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// halaman home
Route::get('/', [HomeController::class, 'beranda'])->name('beranda');
Route::prefix('home')->name('home.')->group(function () {
    Route::get('/kegiatan', [HomeController::class, 'kegiatan'])->name('kegiatan');
    Route::get('/detail_kegiatan/{kegiatan}', [HomeController::class, 'detailKegiatan'])->name('detailKegiatan');
    Route::get('/download', [HomeController::class, 'download'])->name('download');
    Route::get('/persyaratan', [HomeController::class, 'persyaratan'])->name('persyaratan');
    Route::get('/pengumuman', [HomeController::class, 'pengumuman'])->name('pengumuman');
    Route::get('/tentang-BI', [HomeController::class, 'tentangBi'])->name('tentangBi');
    Route::get('/genbi-point', [HomeController::class, 'genbiPoint'])->name('genbiPoint');
    Route::get('/tentang-genbi', [HomeController::class, 'tentangGenbi'])->name('tentangGenbi');
    Route::get('/struktur_organisasi', [HomeController::class, 'strukturOrganisasi'])->name('strukturOrganisasi');

    Route::get('/downloadFile/{file}', [DownloadController::class, 'downloadFile'])->name('downloadFile');
    Route::get('/downloadPengumuman/{pengumuman}', [PengumumanController::class, 'downloadFile'])->name('downloadPengumuman');
});

// halaman admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // halaman kegiatan
    // Route::resource('/kegiatan', KegiatanController::class);
    Route::resource('kegiatan', KegiatanController::class);

    // halaman tentang
    Route::resource('/genbi_point', GenbiPointController::class);
    // struktur organisasi 
    Route::resource('/divisi', DivisiController::class);
    Route::resource('/pengurus_harian', PengurusHarianController::class);
    Route::resource('/pengurus_divisi', PengurusDivisiController::class);
    Route::resource('/anggota', AnggotaController::class);

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // pengumuman
    Route::prefix('/pengumuman')->name('pengumuman.')->group(function () {
        Route::resource('/', PengumumanController::class)
            ->parameters(['' => 'pengumuman']);
    });

    // halaman download
    Route::prefix('/download')->name('download.')->group(function () {
        Route::resource('/', DownloadController::class)
            ->parameters(['' => 'file']);
    });

    // coming soon
    // Route::get('/beranda', [BerandaController::class, 'beranda'])->name('beranda');
    // Route::get('/persyaratan', [PersyaratanController::class, 'persyaratan'])->name('persyaratan');
    // Route::get('/tentang-BI', [TentangBiController::class, 'tentangBi'])->name('tentangBi');
    // Route::get('/tentang-genbi', [TentangGenbiController::class, 'tentangGenbi'])->name('tentangGenbi');
});


Route::middleware('guest')->prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/blocked', [AuthController::class, 'blocked'])->name('blocked');
    Route::get('/unauthorized', [AuthController::class, 'unauthorized'])->middleware('auth')->name('unauthorized');
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});
// halaman error
Route::get('/404', [ErrorController::class, 'notFound'])->name('notFound');
Route::get('/methodNotAllowed', [ErrorController::class, 'methodNotAllowed'])->name('methodNotAllowed');
// Route::fallback(function () {
//     abort(404, 'Halaman tidak ditemukan.');
// });