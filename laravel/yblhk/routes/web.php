<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\Rolecheck;

Route::get('/', function () {
    return view('Layout.AuthLayout');
})->name('auth');

Route::post('/register', [AuthController::class, 'Register'])->name('register');
Route::post('/login', [AuthController::class, 'Login'])->name('Login');
Route::post('/verifEmail', [AuthController::class, "VerifEmail"])->name("verifEmail");
Route::post('/forgetpassword', [AuthController::class, "ForgetPassword"])->name("ForgetPassword");

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('Logout');
    Route::get('/dasboard', function () {
        return view('layout.DasboardLayout');
    })->name('dasboard');
    Route::get('/userpages', function () {
        return view('Pages.Userpages');
    })->name('userpages');
    Route::get('/userpagesUpdate', function () {
        return view('Pages.UserUpdate');
    })->name('userupdate');
    Route::post('/userUpdate', [AuthController::class, "updateUserData"])->name('userupd');

    Route::middleware('Rolecheck:admin')->group(function () {
        Route::get('/daftarpengaduan', function () {
            return view('pages.Admin.DaftarLaporan');
        })->name("DaftarPengaduan");

        Route::get('/kategoripelaporan', function () {
            return view('pages.Admin.kategoriLaporan');
        })->name("KategoriLaporan");
        Route::post('/AddNewKategori', [AdminController::class, "AddNewKategory"])->name('AddNewKategori');
        Route::get('/Updkategori/{id}', [AdminController::class, 'showUpdate'])->name("Updkategori");
        Route::get('/hapuskategori/{id}', [AdminController::class, 'hapusKategori'])->name("hapusKategori");
        Route::post('/Updktgori', [AdminController::class, 'updateKategori'])->name("Updkate");
        Route::post('/updStatus/{id}', [AdminController::class, 'updStatus']);
    });
    Route::middleware('Rolecheck:user')->group(function () {
        Route::get('/hapusData', [UserController::class, 'DeleteLaporan'])->name("hapusLaporan");
        Route::get('/updatedata', [UserController::class, 'showUpdate'])->name("Updatedatalaporan");
        Route::post('/AddNewLaporan', [UserController::class, "addNewLaporan"])->name('addNewLaporan');
        Route::post('/updatelaporan', [UserController::class, "UpdateLaporan"])->name('updateLaporan');
        Route::get('/AddLaporan', [UserController::class, 'FormLaporan'])->name("AddLaporan");
        Route::get('/statuspengaduan', [UserController::class, "StatusPengaduan"])->name("statuspengaduan");
        Route::get('/hapusData', [UserController::class, 'DeleteLaporan'])->name("hapusLaporan");
        Route::get('/updatedata', [UserController::class, 'showUpdate'])->name("Updatedatalaporan");
        Route::post('/AddNewLaporan', [UserController::class, "addNewLaporan"])->name('addNewLaporan');
        Route::post('/updatelaporan', [UserController::class, "UpdateLaporan"])->name('updateLaporan');
    });
});
