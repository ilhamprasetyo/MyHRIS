<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KoordinatorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\RevisiController;
use App\Http\Controllers\HRDController;

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

Route::get('/welcome', function () {
  return view('welcome');
});

Route::get('/', function () {
  return view('index');
})->name('index');

Route::get('/test', function () {
  return view('test');
})->name('test');

Route::middleware(['admin', 'auth'])->group(function () {
  Route::get('/pegawai', [PegawaiController::class, 'pegawai']);
  Route::get('/unit', [UnitController::class, 'unit']);
  Route::get('/jabatan', [JabatanController::class, 'jabatan']);
  Route::get('/pengajuan', [PengajuanController::class, 'pengajuan']);
});

Route::middleware(['karyawan', 'auth'])->group(function () {
  Route::post('/pengajuan/store', [PengajuanController::class, 'store']);
  Route::post('/pengajuan/update/{id}', [PengajuanController::class, 'update']);
  Route::get('/pengajuan/hapus/{id}', [PengajuanController::class, 'delete']);
  Route::get('/pengajuan/rincian/{id}', [PengajuanController::class, 'rincian']);

  Route::get('/pengajuan/download/{id}', [PengajuanController::class, 'download']);


});

Route::middleware(['koordinator', 'auth'])->group(function () {
  Route::get('/approval', [KoordinatorController::class, 'approval']);
  Route::get('/karyawan', [KoordinatorController::class, 'karyawan']);
  Route::get('/pengajuan/status/{id}', [KoordinatorController::class, 'status']);
  Route::get('/pengajuan/batal/{id}', [KoordinatorController::class, 'batal']);
  Route::get('/approval_revisi', [RevisiController::class, 'approval_revisi']);
});

Route::middleware(['auth'])->group(function () {
  Route::get('/pengajuan_user', [PengajuanController::class, 'pengajuan_user']);
  Route::get('/pegawai_user', [PegawaiController::class, 'pegawai_user']);
  Route::get('/approval_all', [PengajuanController::class, 'approval_all']);
  Route::get('/karyawan_all', [KoordinatorController::class, 'karyawan_all']);
});

Route::get('/check', [PegawaiController::class, 'check']);
Route::get('/request', [PegawaiController::class, 'request']);
Route::get('/checked', [PegawaiController::class, 'checked']);
Route::get('/register/{id}', [PegawaiController::class, 'register']);
Route::get('/registered', [PegawaiController::class, 'registered']);

Route::get('/logout', [LoginController::class, 'logout']);

Auth::routes();

Route::get('/password/reset/{token}', function ($token) {
  return view('auth/passwords/reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::middleware(['user', 'auth'])->group(function () {
  Route::post('/upload_photo/{id}', [UserController::class, 'upload_photo']);
  Route::get('/delete_photo/{id}', [UserController::class, 'delete_photo']);
  Route::get('/download_photo/{id}', [PegawaiController::class, 'download']);
  Route::get('/user', [UserController::class, 'user']);
  Route::get('/profile', [UserController::class, 'profile']);
  Route::get('/absensi', [AbsensiController::class, 'index']);
  Route::get('/revisi', [RevisiController::class, 'revisi']);

  Route::get('/hrd', [HRDController::class, 'hrd']);
  Route::get('/approval_cuti_hrd', [HRDController::class, 'approval_cuti']);
  Route::get('/approval_revisi_hrd', [HRDController::class, 'approval_revisi']);
});

Route::post('/review_input', [ReviewController::class, 'store']);
