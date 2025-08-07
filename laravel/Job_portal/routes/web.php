<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PerusahaanController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('Components.Auth');
})->name('login');
Route::get('/register', function () {
    return view('Components.Auth');
})->name('Register');

Route::get('/forgetpassword', function () {
    return view('Components.Auth');
})->name('forgetpassword');

Route::post('/registerproses', [AuthController::class, "Register"])->name('register.proses');
Route::post('/loginproses', [AuthController::class, "Login"])->name('login.proses');
Route::post('/addlowongan', [PerusahaanController::class, "addNewLowongan"])->name('addNewLowongan');
Route::post('/profileupdate', [AuthController::class, 'Updateprofile'])->name("profile.update");
Route::post('/send-reset', [AuthController::class, 'sendResetEmail'])->name('password.send');
Route::get('/tokenadd', function () {
    $email = session('reset_email');
    return view('Components.Auth', compact('email'));
})->name('reset.password');
Route::post('/verif', [AuthController::class, 'verifyKode'])->name('password.verify');
Route::get('/newpassword', function () {
    $email = session('reset_email');
    return view('Components.Auth', compact('email'));
})->name('newpassword');

Route::post('/resetnewpassword', [AuthController::class, 'updatepassword'])->name('addnewpassword');

Route::post('/lamaran/update-status/{id}', [PerusahaanController::class, 'updateStatus']);




Route::get('/profilPelamar', [PelamarController::class, 'profilePelamar']);


Route::get('/editprofil-perusahaan', function () {
    return view('Profil.Perusahaan.editprofil-perusahaan', ['navbarType' => 'perusahaan']);
});

Route::get('/about-perusahaan', function () {
    return view('Profil.Perusahaan.aboutperusahaan', ['navbarType' => 'perusahaan']);
})->name("perusahaan.About");

Route::get('/viewjobs/{id}', function ($id) {
    return view('pages.viewjobs', ['id' => $id]);
})->name('statusjobs');


Route::post('/applylowongan', [PelamarController::class, 'applyLowongan'])->name('lamar.lowongan');

Route::get('/homefix', function () {
    return view('pages.home');
})->name('home');
Route::get('/lowongan', function () {
    return view('pages.home');
})->name('lowongan');






//untuk navbar dan halaman home
Route::get('/home', function () {
    return view('pages.home', ['navbarType' => 'guest']);
})->name('guest.home');
Route::get('/home2', function () {
    return view('pages.home', ['navbarType' => 'guest']);
})->name('perusahaan.home');
Route::get('/pelamar/home', function () {
    return view('pages.home', ['navbarType' => 'pelamar']);
})->name('pelamar.home');
Route::get('/perusahaan/home', function () {
    return view('pages.home', ['navbarType' => 'perusahaan']);
})->name('guest.listPelamar');

// halaman cari lowongan
Route::get('/guest/lowongankerja', function () {
    return view('pages.cariLowongan', ['navbarType' => 'guest']);
})->name('guest.cariLowongan');
Route::get('/pelamar/lowongankerja', function () {
    return view('pages.cariLowongan', ['navbarType' => 'pelamar']);
})->name('pelamar.cariLowongan');
Route::get('/perusahaan/listpelamar', function () {
    return view('pages.listPelamar', ['navbarType' => 'perusahaan']);
})->name('perusahaan.listPelamar');

// klo ini halaman list perusahaan dan tentang kami
Route::get('/guest-listperusahaan', function () {
    return view('pages.listPerusahaan', ['navbarType' => 'guest']);
})->name('guest.listPerusahaan');
Route::get('/pelamar-listperusahaan', function () {
    return view('pages.listPerusahaan', ['navbarType' => 'pelamar']);
})->name('pelamar.listPerusahaan');
Route::get('/perusahaan-listperusahaan', function () {
    return view('pages.listPerusahaan', ['navbarType' => 'perusahaan']);
})->name('perusahaan.listPerusahaan');

// TENTANG KAMI PAGE
Route::get('/guest-tentangkami', function () {
    return view('pages.tentangkami', ['navbarType' => 'guest']);
})->name('guest.tentangkami');

Route::get('/pelamar-tentangkami', function () {
    return view('pages.tentangkami', ['navbarType' => 'pelamar']);
})->name('pelamar.tentangkami');

Route::get('/perusahaan-tentangkami', function () {
    return view('pages.tentangkami', ['navbarType' => 'perusahaan']);
})->name('perusahaan.tentangkami');

Route::get('/jobkategori/{kategori}', [PagesController::class, 'kategori'])->where('kategori', '.*');


Route::get('/perusahaandetail/{id}', [PerusahaanController::class, 'showPerusahanByid'])->name('show.perusahaan');

Route::get('/jobDetail', function () {
    return view('pages.jobDetail');
});
Route::get('/pelamarDetail', function () {
    return view('pages.pelamarDetail');
});


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/pengalaman', [PelamarController::class, 'AddPengalaman'])->name('pengalaman.add');
Route::put('/pengalamanedit/{id}', [PelamarController::class, 'EditPengalaman'])->name('pengalaman.edit');
Route::delete('/pengalamandelete/{id}', [PelamarController::class, 'DeletePengalaman'])->name('pengalaman.delete');
Route::get('/cari-lowongan', [PelamarController::class, 'cari'])->name('lowongan.cari');
