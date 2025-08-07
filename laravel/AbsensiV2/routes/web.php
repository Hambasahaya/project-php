<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeaveController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pages.Home');
});
Route::get('/login', function () {
    return view('Pages.AuthPages');
})->name('login');
Route::get('/verifemail', function () {
    return view('Pages.AuthPages');
})->name('verifemail');
Route::get('/veriftoken', function () {
    return view('Pages.AuthPages');
})->name('veriftoken');


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/verifemail', [AuthController::class, 'sendResetToken'])->name('verifikasiemail');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('resetpassword');


Route::post('/addstaff', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/faceverif', [AuthController::class, 'verifFace'])->name('verifFace');
Route::post('/Absens', [AbsenController::class, 'absen']);



Route::get('/pengajuan', [LeaveController::class, 'index'])->name('pengajuan.index');
Route::post('/pengajuan', [LeaveController::class, 'addPengajuan'])->name('pengajuan.store');
Route::post('/pengajuan/{id}/approve', [LeaveController::class, 'approve'])->name('pengajuan.approve');
Route::post('/pengajuan/{id}/reject', [LeaveController::class, 'reject'])->name('pengajuan.reject');

Route::get('/absensi/filter', [AbsenController::class, 'filter'])->name('absensi.filter');
Route::get('/absensiall/filter', [AbsenController::class, 'filterAll'])->name('absensi.filterall');
Route::get('/rekap-absen/export', [AbsenController::class, 'exportRekap'])->name('rekap.absen.export');
