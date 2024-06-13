<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
});

Route::middleware(AuthMiddleware::class)->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::put('/update', 'update')->name('update');
        Route::post('/logout', 'logout')->name('logout');
    });
    Route::controller(PagesController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/sltm', 'sltm')->name('sltm');
        Route::get('/regresi', 'regresi')->name('regresi');
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/setting', 'setting')->name('setting');
        Route::get('/support', 'support')->name('support');
        Route::get('/test', 'test')->name('test');
    });
});
