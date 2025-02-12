<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\UKMController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KalenderAkademikController;

// Halaman utama (welcome)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Halaman admin (dashboard)
Route::get('admin', function () {
    return view('home.index');
})->name('admin');

// Resource routes dengan prefix admin agar lebih terstruktur
Route::prefix('admin')->group(function () {
    Route::resource('fakultas', FakultasController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::resource('ukm', UKMController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('prestasi', PrestasiController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('kalender-akademik', KalenderAkademikController::class);
});
