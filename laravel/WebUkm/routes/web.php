<?php

use App\Http\Controllers\Admin\AdminContoller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthUser;

Route::get('/', function () {
    return view('Page.LandingPage');
});
Route::get('/finis', function () {
    return view('Page.Finish');
});
Route::get('/login', function () {
    return view('Page.Sign');
});
Route::post('/register', [AuthUser::class, 'Register'])->name('register');
Route::post('/login', [AuthUser::class, 'LogIn'])->name('login');

// Route::middleware(['auth', 'checkRole:admin'])->group(function () {
Route::get('/admin/users', [AdminContoller::class, 'index'])->name('admin.users.index');
Route::put('/admin/users/update/{id}', [AdminContoller::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/delete/{id}', [AdminContoller::class, 'delete'])->name('admin.users.delete');
// });
