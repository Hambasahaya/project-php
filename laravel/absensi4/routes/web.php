<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;
use App\Exports\RekapAbsenExport;
use App\Exports\RekapAbsenPivotExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/login', function () {
    return view('Pages.AuthPages');
})->name('login');
Route::post('/authLogin', [AuthController::class, 'login'])->name('login.auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/forgot-password', fn() => view('Pages.AuthPages'))->name('forgot.password');
Route::post('/forgot-password/send', [AuthController::class, 'sendResetToken'])->name('forgot.password.send');

Route::get('/verify-token', fn() => view('Pages.AuthPages'))->name('verify.token');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset.update');




Route::middleware(['auth', 'checkRole:mahasiswa'])->group(function () {
    Route::post('/absen/scan', [AbsenController::class, 'scan'])->name('absen.scan');

    Route::post('/profile/update', [AuthController::class, 'update'])->name('profile.update')->middleware('auth');
    Route::get('/scanner', function () {
        return view('Pages.Mahasiswa.scanner');
    })->name('scanner');

    Route::get('/', function () {
        return view('Pages.Mahasiswa.Home');
    })->name('home');
    Route::get('/editprofile', function () {
        return view('Pages.Mahasiswa.editProfile');
    })->name('profile');
    Route::get('/grades', function () {
        return view('Pages.Mahasiswa.Grades');
    })->name('grade');

    Route::get('/absen', function () {
        return view('Pages.Mahasiswa.Absen');
    })->name('absen');

    Route::get('/scanner', function () {
        return view('Pages.Mahasiswa.scanner');
    })->name('scanner');
});



Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('Pages.Admin.adminHome');
    })->name('adminhome');
    Route::get('/adminmatakuliah', function () {
        return view('Pages.Admin.Matakuliah');
    })->name('adminmatakuliah');
    Route::get('/adminkelas', function () {
        return view('Pages.Admin.kelas');
    })->name('adminkelas');

    Route::post('/addMatkul', [MatakuliahController::class, 'addMatakuliah'])->name('addMatakuliah');
    Route::get('/hapusMatkul/{id}', [MatakuliahController::class, 'delete'])->name('deleteMatakuliah');
    Route::put('/updateMatkul/{id}', [MatakuliahController::class, 'updateMatakuliah'])->name('updateMatakuliah');
    Route::post('/admin/kelas/store', [KelasController::class, 'store'])->name('addKelas');
    Route::get('/kelas/{kelas}/ploting', [KelasController::class, 'plotingview'])->name('plotingMahasiswa');
    Route::post('/kelas/{kelas}/ploting', [KelasController::class, 'ploting'])->name('plotingMahasiswa.store');
    Route::get('/admin/kelas/{id}/mahasiswa', [KelasController::class, 'showmhskelas'])->name('showmhskelas');
    Route::put('/updatekelas/{id}', [KelasController::class, 'update'])->name('updatekelas');
    Route::get('/hapuskelas/{id}', [KelasController::class, 'destroy'])->name('hapuskelas');
    Route::get('/adminMhs', function () {
        return view('Pages.Admin.DataMahasiswa');
    })->name('adminMhs');
    Route::post('/admin/datamhs', [AdminController::class, "addmhs"])->name('addmhs');
    Route::put('/updatemhs/{id}', [AdminController::class, 'updateMahasiswa'])->name('updateMahasiswa');
    Route::get('/deletemhs/{id}', [AdminController::class, 'deleteMahasiswa'])->name('deleteMahasiswa');
    Route::get('/adminDosen', function () {
        return view('Pages.Admin.DataDosen');
    })->name('adminDosen');
    Route::post('/admin/datadosen', [AdminController::class, "adddosen"])->name('adddosen');
    Route::put('/updatedosen/{id}', [AdminController::class, 'updatedosen'])->name('updatedosen');
    Route::get('/deletedosen/{id}', [AdminController::class, 'deletedosen'])->name('deletedosen');
});

Route::middleware(['auth', 'checkRole:dosen'])->group(function () {
    Route::get('/dosen', function () {
        return view('Pages.Admin.adminHome');
    })->name('adminhome');
    Route::get('/rekap/absen/kelas/{kelas_id}', function ($kelas_id) {
        $kelas = \App\Models\Kelas::with(['mahasiswa', 'kehadiran'])->findOrFail($kelas_id);

        $format = request('format', 'list');

        if ($format === 'pivot') {
            $filename = 'RekapPivot_' . $kelas->kode_kelas . '.xlsx';
            return Excel::download(new RekapAbsenPivotExport($kelas), $filename);
        } else {
            $filename = 'RekapList_' . $kelas->kode_kelas . '.xlsx';
            return Excel::download(new RekapAbsenExport($kelas), $filename);
        }
    })->name('rekap.absen.kelas');
    Route::get('/dosenkelas', function () {
        return view('Pages.Dosen.jadwalkelas');
    })->name('dosen.jadwal');
    Route::get('/kelas/{id}/generate-qrcode', [KelasController::class, 'regenerateQrCode'])->name('kelas.regenerateQrCode');
    Route::get('/dosenmhskelas', function () {
        return view('Pages.Dosen.mhskelas');
    })->name('dosen.mhs.kelas');
    Route::get('/dosenmhskelasabsen', function () {
        return view('Pages.Dosen.Absenkelas');
    })->name('dosen.mhs.kelas.absen');
});
