<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\AuthUsers;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\Admin\Pesanan;
use Illuminate\Support\Facades\Route;

Route::get('/', [pagesController::class, 'Landingpages']);
Route::get('/thx', function () {
    return view('pages.thx');
});

Route::get('/logout', [AuthUsers::class, "logout"])->name('logout');
Route::middleware(['guest'])->group(function () {

    Route::get('/login', function () {
        return view('pages.LoginPage');
    })->name('login');
    Route::get('/register', function () {
        return view('pages.RegisterPage');
    })->name('register');
    Route::post('/login', [AuthUsers::class, "login"])->name('loginact');
    Route::post('/regsiter', [AuthUsers::class, "register"])->name('registeract');
});

Route::middleware(['auth', 'checkRole:pelanggan'])->group(function () {
    Route::get('/userpages', function () {
        return view('pages.UserPages');
    });
    Route::get('/carts', function () {
        return view('pages.Carts');
    });
    Route::post('/AddToCart', [CartController::class, "addToCart"]);
    Route::get('/carts', [CartController::class, "cartview"]);
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
});

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/pesanan', [Pesanan::class, "index"]);

    Route::get('/admin', function () {
        return view('pages.Adminpages');
    });

    Route::get('/admindetailprd', [ProductsController::class, "index"])->name('adminprd');
    Route::post('/Addprd', [ProductsController::class, "Addprd"])->name('addprd');
    Route::get("/showprd/{id}", [ProductsController::class, 'show'])->name('show');
    Route::post('/updateprd', [ProductsController::class, "update"])->name("updateprd");
    Route::get("/deleteprd/{id}", [ProductsController::class, "destroy"])->name('prddestroy');

    Route::get('/admindetailkategori', [CategoryController::class, "index"])->name('adminkategori');
    Route::post('/Addkategory', [CategoryController::class, "Addkategori"])->name('Addkategori');
    Route::get("/showkategori/{id}", [CategoryController::class, 'showkategori'])->name('showkategori');
    Route::post('/updatekategori', [CategoryController::class, "update"])->name("updatekategori");
    Route::get("/deleteketegori/{id}", [CategoryController::class, "destroy"])->name('kategoridestroy');
});
