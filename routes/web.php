<?php

use App\Http\Controllers\admin\AdminPegawaiController;
use App\Http\Controllers\admin\AdminWilayahController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pegawai\PegawaiDashboardController;
use App\Http\Controllers\pegawai\PegawaiObatController;
use App\Http\Controllers\pegawai\PegawaiPasienController;
use App\Http\Controllers\pegawai\PegawaiPembayaranController;
use App\Http\Controllers\pegawai\PegawaiTindakanController;
use App\Http\Controllers\user\UserDashboardController;
use App\Http\Controllers\user\UserKonsultasiController;
use App\Http\Controllers\user\UserObatController;
use App\Http\Controllers\user\UserPegawaiController;
use App\Http\Controllers\user\UserRiwayatController;
use Illuminate\Support\Facades\Route;

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

Route::resource('/', UserDashboardController::class);
// akses admin
Route::middleware(['admin'])->group(function () {
    Route::resource('admin', AdminController::class);
    Route::resource('wilayah', AdminWilayahController::class);
    Route::resource('adminpegawai', AdminPegawaiController::class);
});
// akses pegawai
Route::middleware(['pegawai'])->group(function () {
    Route::resource('pegawai', PegawaiDashboardController::class);
    Route::resource('pegawaiobat', PegawaiObatController::class);
    Route::get('pegawaipasien', [PegawaiPasienController::class, 'index']);
    Route::resource('pegawaitindakan', PegawaiTindakanController::class);
    Route::post('pegawaitindakancari', [PegawaiTindakanController::class, 'tampilCari']);
    Route::resource('pegawaipembayaran', PegawaiPembayaranController::class);
});
// akses user
Route::middleware(['user'])->group(function () {
    Route::resource('userkonsultasi', UserKonsultasiController::class);
    Route::get('riwayat', [UserRiwayatController::class, 'index']);
    Route::get('bayar/{id}', [UserRiwayatController::class, 'bayar']);
});
//semua bisa akses
Route::resource('user', UserDashboardController::class);
Route::resource('userobat', UserObatController::class);
Route::get('userpegawai', [UserPegawaiController::class, 'index']);
Route::get('userobatjenis/{id}', [UserObatController::class, 'tampilJenis']);
Route::post('userobatcari', [UserObatController::class, 'tampilCari']);
//login
Route::get('login', [LoginController::class, 'login']);
Route::get('daftar', [LoginController::class, 'daftar']);
Route::post('loginuser', [LoginController::class, 'loginUser']);
Route::post('daftaruser', [LoginController::class, 'daftarUser']);
Route::get('logout', [LoginController::class, 'logout']);
