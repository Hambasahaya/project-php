<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\Checkout;
use App\Http\Controllers\LoginContoller;
use App\Http\Controllers\Pages;
use App\Http\Controllers\Shipping;
use App\Http\Controllers\Adminn\Admin;


Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view("pages.login");
    });
    Route::post('/login', [LoginContoller::class, 'login']);
    Route::post('/register', [LoginContoller::class, 'register']);
    Route::post('/chekemail', [LoginContoller::class, 'chekemail']);
    Route::post('/changepassword', [LoginContoller::class, 'changepassword']);
});
Route::get('/product', [Pages::class, 'Productpage'])->name("Productpage");
Route::get('/kategori/{id_kategori}', [Pages::class, 'KategoryProduct'])->name("KategoryProduct");
Route::get('/singgle/{id_produk}', [Pages::class, 'Singgleproduct'])->name("Singgleproduct");
Route::get('/', [Pages::class, 'index'])->name("index");


Route::middleware(['auth'])->group(function () {
    Route::post('/userupdate', [LoginContoller::class, 'Userupdate']);
    Route::get('/cart', [Pages::class, 'cart'])->name("cart");
    Route::get('/user', [Pages::class, 'user'])->name("user");
    Route::get('/pembelian', [Pages::class, 'pembelian'])->name("pembelian");
    Route::get('/delete', [Pages::class, 'delete'])->name('cart.delete');
    Route::post('/checkout', [Checkout::class, 'checkout']);
    Route::post('/chekout_proses', [Checkout::class, 'checkout_proses']);
    Route::get('/provinces', [Shipping::class, 'getProvinces']);
    Route::get('/cities', [Shipping::class, 'getCities']);
    Route::post('/shipping-cost', [Shipping::class, 'getShippingCost']);
    Route::post('/update-qty', [CartsController::class, 'updateQty']);
    Route::get('/checkout', [Checkout::class, 'chview'])->name("chview");
    Route::post('/add-to-cart', [CartsController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/logout', [LoginContoller::class, 'logout'])->name('logout');
    Route::get('/detailuser', [Pages::class, 'detail_user'])->name("detail_user");
    Route::get('/cetak_struk/{no_transaksi}', [Pages::class, 'Cetak'])->name("Cetak");
    Route::get('/admin', function () {
        return view("layout.Adminlayout");
    });
    Route::get('/adminproduk', [Admin::class, 'Product'])->name("Product");
    Route::get('/Kategori', [Admin::class, 'Kategori'])->name("Kategori");
    Route::get('/Daftar_pembelian', [Admin::class, 'pembelian'])->name("pembelian");
    Route::get('/Detail_transaksi', [Admin::class, 'Dtran'])->name("Dtran");

    // produkadd
    Route::post('/addproduk', [Admin::class, 'AddUpdteproduk'])->name("AddUpdteproduk");
    Route::get('/deleteprd', [Admin::class, "Deleteproduk"])->name("Deleteproduk");
    Route::get('/updprd', [Admin::class, "Updtprd"])->name("Updtprd");
    Route::get('/updkate', [Admin::class, "Updtkate"])->name("Updtkate");
    Route::post('/add_kategori', [Admin::class, 'AddupdateKategori'])->name("AddupdateKategori");
    Route::post('/kategori_update', [Admin::class, 'Updttk'])->name("Updttk");
    Route::get('/deletekate', [Admin::class, "Deletekategori"])->name("Deletekategori");
});
