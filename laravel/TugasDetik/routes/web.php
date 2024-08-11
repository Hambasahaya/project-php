<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUsers;

Route::get('/', function () {
    return view('pages.homePages');
});
Route::get('/allcourse', function () {
    return view('pages.Allcourse');
});
Route::get('/login', function () {
    return view('Auth.login');
});
Route::post("/login", [AuthUsers::class, "login"])->name("login");
Route::post("/cekmail", [AuthUsers::class, "cekmail"])->name("cekmail");
Route::post("/newpas", [AuthUsers::class, "newpass"])->name("newpas");
Route::post("/register", [AuthUsers::class, "Register"])->name("register");
Route::get("/logout", [AuthUsers::class, "logout"])->name("logout");
