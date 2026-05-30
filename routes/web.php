<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KemahasiswaanController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfilProdiController;
use App\Http\Controllers\ProjectController as ControllersProjectController;
use App\Http\Controllers\PkmController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
 
//Untuk login saat di klik
Route::post('/login', [AuthController::class, 'login']);
 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
Route::get('/', function () {
    return view('dashboard');
});

Route::resource('mahasiswa', MahasiswaController::class);
Route::post('mahasiswa/{mahasiswa}/toggle-status', [MahasiswaController::class, 'toggleStatus'])->name('mahasiswa.toggleStatus');

Route::resource('dosen', DosenController::class);

// Route::prefix('api')->group(function () {
//     Route::apiResource('dosen', ApiDosenController::class);
// });

Route::resource('berita', BeritaController::class)->parameters([
    'berita' => 'berita'
]);

// Route::resource('berita', BeritaController::class);

Route::resource('pengumuman', PengumumanController::class);

Route::resource('kurikulum', KurikulumController::class);

Route::resource('akademik', AkademikController::class);

Route::resource('kemahasiswaan', KemahasiswaanController::class);

Route::resource('administrasi', AdministrasiController::class);

Route::resource('keuangan', KeuanganController::class);

Route::resource('project', ControllersProjectController ::class);

Route::resource('profil_prodi', ProfilProdiController::class);

Route::resource('kegiatan', KegiatanController::class);

Route::resource('galeri', GaleriController::class);

Route::resource('agenda', AgendaController::class);

Route::resource('penelitian', PenelitianController::class);

Route::resource('pkm', PkmController::class);

Route::resource('alumni', AlumniController::class)
    ->parameters(['alumni' => 'alumni']);


Route::resource('admin', AdminController::class);

});