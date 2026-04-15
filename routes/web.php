<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\DashboardAdminController;

Route::get('/', [RecommendationController::class, 'index']);
Route::get('/detail/{id}', [RecommendationController::class, 'detail']);

// LOGIN
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginProses']);

// REGISTER
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerProses']);

// LOGOUT
Route::get('/logout', [AuthController::class, 'logout']);

// 🔒 HARUS LOGIN
Route::get('/service', [ServiceController::class, 'index'])->middleware('ceklogin');
Route::get('/service', [PengaduanController::class, 'index'])->middleware('ceklogin');;

Route::get('/login_petugas', [PetugasController::class, 'loginPage']);
Route::post('/login_petugas', [PetugasController::class, 'login']);
Route::get('/logout_petugas', [PetugasController::class, 'logout']);
Route::post('/petugas/store', [PetugasController::class, 'store']);
Route::get('/petugas/edit/{id}', [PetugasController::class, 'edit']);
Route::post('/petugas/update/{id}', [PetugasController::class, 'update']);
Route::get('/petugas/delete/{id}', [PetugasController::class, 'destroy']);

// 🔹 PROTECTED
Route::get('/dashboard_admin', [DashboardAdminController::class, 'index'])->middleware('petugas');

Route::post('/pengaduan/store', [PengaduanController::class, 'store']);
Route::post('/tanggapan/store/{id}', [TanggapanController::class, 'store']);
