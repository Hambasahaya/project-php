<?php

use App\Http\Controllers\Admin\ArtikelsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\AuthUsers;
use App\Http\Controllers\pages;
use Faker\Provider\Lorem;
use Illuminate\Support\Facades\Route;

Route::get('/', [pages::class, "home"]);
Route::get('/Newarticel', [pages::class, "New"]);
Route::get('/category/{id}', [pages::class, "Category"]);
Route::get('/trending', [pages::class, "Trending"]);
Route::get("/artikelpage/{id}", [pages::class, "artikelpage"]);


Route::get('/login', function () {
    return view('Authpages.Login');
})->name("login");

Route::get('/register', function () {
    return view('Authpages.Register');
})->name("register");

Route::post('/auth/login', [AuthUsers::class, "login"])->name("auth.login");
Route::post('/auth/register', [AuthUsers::class, "register"])->name("auth.register");
Route::get('/auth/logout', [AuthUsers::class, "logout"])->name("auth.logout");
Route::get('/profile', function () {
    return view('components.profile');
})->name("userprofile");

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/darticle', [ArtikelsController::class, "artikeldownload"])->name("downloadartikel");
    Route::get('/dartcte', [CategoryController::class, "artikeldownload"])->name("downloadcate");
    Route::get('/admin', function () {
        return view('AdminPages.Home');
    })->name("adminpages");

    Route::get('/adminpages/article', [ArtikelsController::class, "view"])->name("adminpages.article");
    Route::post('/article', [ArtikelsController::class, "save"])->name("admin.newarticle");

    Route::get('/articleUpd/{id}', [ArtikelsController::class, "viewUpd"])->name("article.upd");
    Route::post('/articleUpdate', [ArtikelsController::class, "update"])->name("article.updte");
    Route::get('/articleDel/{id}', [ArtikelsController::class, "delete"])->name("article.del");
    Route::get('/adminpages/category', [CategoryController::class, "view"])->name("adminpages.category");
    Route::post('/category', [CategoryController::class, "save"])->name("category.newcategory");
    Route::get('/category/{id}', [CategoryController::class, "viewUpd"])->name("category.upd");
    Route::post('/categoryUpd', [CategoryController::class, "update"])->name("category.upd");
    Route::get('/categoryDel/{id}', [CategoryController::class, "delete"])->name("article.del");

    Route::get('/adminpages/profile', function () {
        return view('components.profile');
    })->name("adminpages.profile");
});
