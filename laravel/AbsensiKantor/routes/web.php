<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengajuanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('components.auth');
})->name('auth');
Route::get('/home', function () {
    return view('Pages.Home');
})->name('home');

Route::get('/forgetpassword', function () {
    return view('components.auth');
})->name('forgetPassword');
Route::get('/verif', function () {
    return view('components.auth');
})->name('verif');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/forgot-password', [AuthController::class, 'sendResetToken'])->name('verifemail');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('verif_token');
Route::get('/logout', [AuthController::class, "logout"])->name('logout');
Route::post('/addpengajuan', [PengajuanController::class, 'addPengajuan'])->name('addPengajuan');


Route::get('/login', function () {
    return view('components.auth');
});

Route::post('/pengajuan/{id}/approve', [PengajuanController::class, 'approve'])->name('pengajuan.approve');
Route::post('/pengajuan/{id}/reject', [PengajuanController::class, 'reject'])->name('pengajuan.reject');

Route::post('/absen', [AbsenController::class, 'absen']);
Route::get('/rekap-absen/export', [AbsenController::class, 'export'])->name('rekap.export');
