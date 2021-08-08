<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\KoordinatorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\RevisiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'], function() {
  Route::get('/all', [ReviewController::class, 'getAllReview']);
  Route::get('/data_review', [ReviewController::class, 'getReview'])->name('data');
  Route::get('/get', [ReviewController::class, 'filterReview']);
  Route::post('/store', [ReviewController::class, 'store']);
  Route::get('/edit/{id}', [ReviewController::class, 'edit']);
  Route::put('/update/{id}', [ReviewController::class, 'update']);
  Route::delete('/delete/{id}', [ReviewController::class, 'delete']);

  Route::get('/pegawai', [PegawaiController::class, 'pegawai_all']);
  Route::post('/pegawai', [PegawaiController::class, 'pegawai_store']);
  Route::get('/pegawai/{id}', [PegawaiController::class, 'pegawai_get']);
  Route::put('/pegawai/{id}', [PegawaiController::class, 'pegawai_update']);
  Route::delete('/pegawai/{id}', [PegawaiController::class, 'pegawai_delete']);

  Route::get('/unit', [UnitController::class, 'unit_all']);
  Route::post('/unit', [UnitController::class, 'unit_store']);
  Route::get('/unit/{id}', [UnitController::class, 'unit_get']);
  Route::put('/unit/{id}', [UnitController::class, 'unit_update']);
  Route::delete('/unit/{id}', [UnitController::class, 'unit_delete']);

  Route::get('/jabatan', [JabatanController::class, 'jabatan_all']);
  Route::post('/jabatan', [JabatanController::class, 'jabatan_store']);
  Route::get('/jabatan/{id}', [JabatanController::class, 'jabatan_get']);
  Route::put('/jabatan/{id}', [JabatanController::class, 'jabatan_update']);
  Route::delete('/jabatan/{id}', [JabatanController::class, 'jabatan_delete']);

  Route::get('/pengajuan', [PengajuanController::class, 'pengajuan_all']);
  Route::post('/pengajuan', [PengajuanController::class, 'pengajuan_store']);
  Route::get('/pengajuan/{id}', [PengajuanController::class, 'pengajuan_get']);
  Route::post('/pengajuan/{id}', [PengajuanController::class, 'pengajuan_update']);
  Route::delete('/pengajuan/{id}', [PengajuanController::class, 'pengajuan_delete']);
  Route::put('/approval/{id}', [KoordinatorController::class, 'status']);
  Route::put('/batalkan/{id}', [KoordinatorController::class, 'batal']);
  Route::put('/profile/{id}', [UserController::class, 'profile_update']);

  Route::post('/upload_photo/{id}', [UserController::class, 'upload_photo']);
  Route::delete('/delete_photo/{id}', [UserController::class, 'delete_photo']);

  Route::get('/absensi/{id}', [AbsensiController::class, 'absensi']);
  Route::get('/absensi_get/{id}', [AbsensiController::class, 'absensi_get']);
  Route::post('/absensi', [AbsensiController::class, 'clock_in']);
  Route::put('/absensi/{id}', [AbsensiController::class, 'clock_out']);
  Route::delete('/absensi/{id}', [AbsensiController::class, 'absensi_delete']);

  Route::get('/revisi/{id}', [RevisiController::class, 'revisi_all']);
  Route::post('/revisi', [RevisiController::class, 'revisi_store']);
  Route::get('/revisi_get/{id}', [RevisiController::class, 'revisi_get']);
  Route::put('/revisi/{id}', [RevisiController::class, 'revisi_update']);

  Route::get('/approval_revisi_all/{unit_id}', [RevisiController::class, 'approval_revisi_all']);
  Route::put('/approval_revisi/{id}', [RevisiController::class, 'approval']);
  Route::post('/request', [RevisiController::class, 'request']);

  Route::get('/approval_cuti_hrd', [HRDController::class, 'pengajuan']);
  Route::get('/approval_revisi_hrd', [HRDController::class, 'revisi']);
  Route::get('/absensi_hrd', [HRDController::class, 'absensi']);
});
