<?php

use App\Http\Controllers\Absen;
use App\Http\Controllers\AdminControllers\AdminController;
use App\Http\Controllers\Auth\authController as AuthAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthServices\AuthController;
use App\Http\Controllers\Hr\Hrcontroller;
use App\Http\Controllers\Task;
use App\Services\AbsenServices\AbesenService;
use Illuminate\Http\Request;

Route::get('/dasboard', function () {
    return view('Layouts.MainLayout');
})->name('dasboard');
Route::get('/login', function () {
    return view('components.auth');
})->name('login');
Route::get('/forgetpassword', function () {
    return view('components.auth');
})->name('forgetpassword');
Route::get('/resetpassword', function () {
    if (!session()->has('email_verif')) {
        return redirect()->route('login')->withErrors(['email' => 'Akses tidak diizinkan.']);
    }
    return view('components.auth');
})->name('resetpassword');
Route::post('/forget-session', function () {
    session()->forget('email_verif');
})->name('forget.session');

Route::get('/logout', [AuthAuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthAuthController::class, 'login'])->name('login');
Route::post('/forgetpassword', [AuthAuthController::class, 'verifEmail'])->name('forgetpassword');
Route::post('/resetpassword', [AuthAuthController::class, 'resetpassword'])->name('resetpassword');
Route::get('/createHr', function () {
    return view('Pages.AdminPages.ManageHr');
})->name('Managehr');

Route::get('/createDivisi', function () {
    return view('Pages.AdminPages.Managedivisi');
})->name('Managedivisi');
Route::get('/task', function () {
    return view('Pages.Task');
})->name('Task');

Route::post('/task', [Task::class, "AddNewTask"])->name('AddNewTask');
Route::get('/task/{id}', [Task::class, 'getTaskByid'])->name('task.show');
Route::put('/task/update/{id}', [Task::class, 'UpdateTask'])->name('task.update');
Route::get('/deletetask/{id}', [Task::class, 'Deletetask'])->name('hapustask');


Route::get('/Role', function () {
    return view('Pages.AdminPages.ManageRole');
})->name('Managerole');

Route::post('/createHr', [AdminController::class, 'createHr']);
Route::post('/Role', [AdminController::class, 'createRole']);
Route::post('/createDivisi', [AdminController::class, 'AddDivison']);
Route::get('/deletedivisi/{id}', [AdminController::class, 'DeleteDivison'])->name('deletedivisi');
Route::get('/deleterole/{id}', [AdminController::class, 'DeleteRole'])->name('deleterole');
Route::get('/divisi/{id}', [AdminController::class, 'getDivisiById'])->name('divisi.show');
Route::get('/role/{id}', [AdminController::class, 'getRoleById'])->name('role.show');
Route::put('/divisi/update/{id}', [AdminController::class, 'updateDivision'])->name('divisi.update');
Route::put('/role/update/{id}', [AdminController::class, 'UppdateRole'])->name('role.update');

Route::get('/absen', function () {
    return view('Pages.Absen');
})->name('Absen');
Route::post('/absen', [Absen::class, "Absen"])->name('Absen');

Route::get('/karyawan', function () {
    return view('Pages.EmployeePages.ManageEmployee');
})->name('ManageEmployee');
Route::post('/karyawan', [Hrcontroller::class, "AddNewKaryawan"])->name('ManageEmployee');
Route::get('/karyawan/{id}', [Hrcontroller::class, 'getdatakaryawanByid'])->name('karyawan.show');
Route::get('/karyawanrekapmerge', [Hrcontroller::class, 'exportExcelMerge'])->name('karyawanmerge');
Route::put('/karyawan/update/{id}', [Hrcontroller::class, 'updateKaryawan'])->name('karyawan.update');
Route::get('/delete/{id}', [Hrcontroller::class, 'Deletekaryawan'])->name('deletekaryawan');


Route::get('/Absendata', function () {
    return view('Pages.EmployeePages.ManageAbsen');
})->name('ManageAbsen');
Route::get('/absenstatus/{id}', [Absen::class, 'getstatusabsenbyid'])->name('absen.show');
Route::get('/absenrekap', [Absen::class, 'exportAllAbsen'])->name('exportAllAbsen');
Route::put('/absenupdate/{id}', [Absen::class, 'UpdateStatusAbsen'])->name('absen.update');
