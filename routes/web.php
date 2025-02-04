<?php

use App\Http\Controllers\Beasiswa_bi\PengumumanController;
use App\Http\Controllers\Beasiswa_bi\PersyaratanController;
use App\Http\Controllers\Beasiswa_bi\TentangBiController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\Tentang\GenbiPointController;
use App\Http\Controllers\Tentang\StrukturController;
use App\Http\Controllers\Tentang\TentangGenbiController;
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
// halaman error
Route::get('/notFound', function () {
    return view('errors.404'); // Sesuaikan dengan nama file view yang digunakan
})->name('notFound');


// halaman beranda
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// halaman kegiatan
Route::prefix('kegiatan')->name('kegiatan.')->group(function () {
    Route::get('/', [KegiatanController::class, 'index'])->name('index'); // Menampilkan semua kegiatan
    Route::get('/create', [KegiatanController::class, 'create'])->name('create'); // Form tambah kegiatan
    Route::post('/', [KegiatanController::class, 'store'])->name('store'); // Simpan kegiatan baru
    Route::get('/show', [KegiatanController::class, 'show'])->name('show'); // Menampilkan satu kegiatan
    Route::get('/{kegiatan}/edit', [KegiatanController::class, 'edit'])->name('edit'); // Form edit kegiatan
    Route::put('/{kegiatan}', [KegiatanController::class, 'update'])->name('update'); // Update kegiatan
    Route::delete('/{kegiatan}', [KegiatanController::class, 'destroy'])->name('destroy'); // Hapus kegiatan
});

// halaman tentang
Route::get('/tentang/point', [GenbiPointController::class, 'index'])->name('genbiPoint');
Route::get('/tentang/genbi', [TentangGenbiController::class, 'index'])->name('tentangGenbi');
Route::get('/tentang/struktur', [StrukturController::class, 'index'])->name('struktur');

// halaman beasiswa_bi
Route::get('/beasiswaBI/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
Route::get('/beasiswaBI/persyaratan', [PersyaratanController::class, 'index'])->name('persyaratan');
Route::get('/beasiswaBI/tentangBI', [TentangBiController::class, 'index'])->name('tentangBi');

// halaman download
Route::prefix('download')->name('download.')->group(function () {
    Route::get('/', [DownloadController::class, 'index'])->name('index'); // Menampilkan daftar file yang bisa didownload
    Route::get('/show', [DownloadController::class, 'show'])->name('show');
    Route::get('/create', [DownloadController::class, 'create'])->name('create'); // Form tambah file download
    Route::post('/', [DownloadController::class, 'store'])->name('store'); // Simpan file download
    Route::get('/{file}', [DownloadController::class, 'downloadFile'])->name('downloadFile');
    Route::get('/edit/{file}', [DownloadController::class, 'edit'])->name('edit'); // Form edit file download
    Route::put('/{file}', [DownloadController::class, 'update'])->name('update'); // Update file download
    Route::delete('/{file}', [DownloadController::class, 'destroy'])->name('destroy'); // Hapus file download
});