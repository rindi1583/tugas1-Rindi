<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\jadwalKaryawanController;
use App\Http\Controllers\API\JenisController;
use App\Http\Controllers\API\KaryawanController;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:santcum')->get('kategori', [KategoriController::class,'index']);
Route::post('kategori/store', [KategoriController::class,'store']);
Route::delete('kategori/delete/{id}', [KategoriController::class, 'destroy']);
Route::put('kategori/update/{id}', [KategoriController::class, 'update']);

Route::get('jenis', [JenisController::class,'index']);
Route::post('jenis/store', [JenisController::class,'store']);
Route::delete('jenis/delete/{id}', [JenisController::class, 'destroy']);
Route::put('jenis/update/{id}', [JenisController::class, 'update']);

Route::get('transaksi', [TransaksiController::class,'index']);
Route::post('transaksi/store', [TransaksiController::class,'store']);
Route::delete('transaksi/delete/{id}', [TransaksiController::class, 'destroy']);
Route::put('transaksi/update/{id}', [TransaksiController::class, 'update']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::post('karyawan/store', [KaryawanController::class,'store']);
Route::delete('karyawan/delete/{id}', [KaryawanController::class, 'destroy']);
Route::put('karyawan/update/{id}', [KaryawanController::class, 'update']);

Route::post('jadwal_karyawan/store', [jadwalKaryawanController::class,'store']);
Route::delete('jadwal_karyawan/delete/{id}', [jadwalKaryawanController::class, 'destroy']);
Route::put('jadwal_karyawan/update/{id}', [jadwalKaryawanController::class, 'update']);