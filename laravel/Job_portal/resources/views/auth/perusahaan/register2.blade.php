@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
<div class="auth-container">
    <div class="form">
        <div class="header">
            <h2>Daftar</h2>
            <a href="/register">Untuk Pelamar →</a>
        </div>
        <div>
            <label for="nama">Nama Lengkap</label>
            <input type="nama" id="nama">
        </div>
        <div class="pw">
            <label for="email">Alamat Email</label>
            <input type="email" id="email">
        </div>
        <div class="pw">
            <label for="password">Password</label>
            <input type="password" id="password">
        </div>
        <div class="pw">
            <label for="cmpassword">Comfirm Password</label>
            <input type="cmpassword" id="cmpassword">
        </div>
        <a href="#" class="forgot-password">Lupa password?</a>
        <button>Masuk</button>
        <p class="register">Mau bikin akun? <a href="/login2">Klik untuk Login.</a></p>
    </div>
</div>
@endsection