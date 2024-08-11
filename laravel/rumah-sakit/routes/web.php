<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Getdatadistrict;
use App\Http\Controllers\PasientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthUsers;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\Layanan;
use App\Http\Controllers\ResepController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('Pages.Home');
});

Route::middleware(['auth', 'checkRole:pasien'])->group(function () {
    Route::get('/user', function () {
        return view('Pages.Userpages');
    })->name("user");
    Route::get('/scanner', function () {
        return view('Pages.Scanner');
    })->name("scanner_pages");

    Route::post('/scan', [PasientController::class, 'scan'])->name("scanner");
    Route::post('/save-scanned-data', [PasientController::class, 'saveScannedData']);
    Route::get('/pessiendaftar', [PasientController::class, 'showSpesialis']);
});
Route::get('/rekammedis', function () {
    return view('Pages.U_RekamMedis');
})->name("rekammedis");
Route::middleware(['auth', 'checkRole:doctor'])->group(function () {
    Route::get('/dokterpages', function () {
        return view('Pages.Adminpages');
    })->name("dokterpages");
    Route::get("/dokterpaseint", [DokterController::class, "dokterpasient"])->name("dokterpaseint");
    Route::get("/dokteresepobat", [DokterController::class, "dokteresep"])->name("dokteresep");
    Route::get("/dokterekam", [DokterController::class, "dokterekam"])->name("dokterekam");
    Route::post('/addresep', [DokterController::class, "Addresepobat"])->name("addresep");
    Route::post('/updresep', [DokterController::class, "updresepobat"])->name("updresep");
    Route::post('/addrme', [DokterController::class, "Addrekamedis"])->name("addrme");
});



Route::middleware(['auth', 'checkRole:admin_rumah_sakit'])->group(function () {
    Route::get('/admin', function () {
        return view('Pages.Adminpages');
    })->name("adminpages");

    Route::get("/admindokter", [AdminController::class, "admindokter"])->name("admindokter");
    Route::get("/adminapoteker", [AdminController::class, "adminapoteker"])->name("adminapoteker");
    Route::get("/adminpasient", [AdminController::class, "adminpasient"])->name("adminpasient");
    Route::get("/adminspesialis", [AdminController::class, "Spesialis"])->name("Spesialis");
    Route::post("/createdokter", [AdminController::class, "Createdokter"])->name("createdokter");
    Route::post("/offlinePasient", [AdminController::class, "offlinePasient"])->name("offlinePasient");
    Route::post("/createapoteker", [AuthUsers::class, "AddApoteker"])->name("tambahapoteker");
    Route::post("/addspesialis", [AdminController::class, "Addspesialis"])->name("Addspesialis");
    Route::post("/updatedokter", [AdminController::class, "updatedokter"])->name("updatedokter");
    Route::post("/updateapoteker", [AuthUsers::class, "updateApoteker"])->name("updateApoteker");
    Route::post("/updQRR", [AdminController::class, "updateqr"])->name("updqr");
    Route::get('/hapusdokter/{id}', [AdminController::class, 'deletedokter']);
    Route::get('/hapusapoteker/{id}', [AdminController::class, 'deleteapoteker']);
    Route::get('/hapusspesialis/{id}', [AdminController::class, 'hapuslayanan']);
    Route::post('/pasientupdte', [AdminController::class, 'updatePasient'])->name('adminupdpasient');
    Route::get('/pasienthapus/{id}', [AdminController::class, 'deletepasient']);
});
Route::get('/pasient/{id}', [AdminController::class, 'getPasientById']);
Route::get('/pasientget/{id}', [PasientController::class, 'getPasientById']);
Route::get('/getobat/{id}', [ResepController::class, 'getresep']);

Route::get('/antrian', [PasientController::class, "Antrianpage"])->name("antrianpasient");

Route::get('/about', function () {
    return view('Pages.About');
});
Route::get('/layanan', function () {
    return view('Pages.Layanan');
})->name("layanan");

Route::get('/laya/{id}', [Layanan::class, "index"]);

Route::get('/mitra', function () {
    return view('Pages.Mitrapages');
})->name("mitra_pages");
Route::get('/mitra_sign', function () {
    return view('Pages.Adminfasyankes');
})->name("mitra_sign");

route::get("/provinces", [Getdatadistrict::class, "getProvinces"]);

route::get("/cities", [Getdatadistrict::class, "getCities"]);

Route::get('/login', function () {
    return view('Pages.Loginregisterpage');
})->middleware("throttle:10,1");


Route::post("/login", [AuthUsers::class, "login"])->name("login");
Route::post("/cekmail", [AuthUsers::class, "cekmail"])->name("cekmail");
Route::post("/cekotp", [AuthUsers::class, "cekotp"])->name("cekotp");
Route::post("/newpas", [AuthUsers::class, "newpass"])->name("newpas");
Route::post("/register", [PasientController::class, "updateCreate"])->name("register");
Route::post("/registeradmin", [AuthUsers::class, "AdminRegister"])->name("registeradmin");
Route::get("/logout", [AuthUsers::class, "logout"])->name("logout");


// api
Route::get('/dokter/{id}', [AdminController::class, 'GetDokter']);
Route::get('/apoteker/{id}', [AdminController::class, 'GetApoteker']);
Route::get('/layanan/{id}', [AdminController::class, 'Gelayanan']);
Route::get('/check-status/{id}', [PasientController::class, 'checkStatus'])->name('check-status');
Route::post('/api/callDokter/{id}', [PasientController::class, 'callDokter']);
Route::post('/api/endberobat/{id}', [PasientController::class, 'endberobat']);
Route::get('/finispasient', [PasientController::class, "FinishPasient"]);
