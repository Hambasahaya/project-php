@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<div class="auth-container">
    <div class="form">
        <div class="header">
            <h2>Masuk</h2>
            <a href="/login">Untuk Pelamar →</a>
        </div>
        <div>
            <label for="email">Alamat Email</label>
            <input type="email" id="email">
        </div>
        <div class="pw">
            <label for="password">Password</label>
            <input type="password" id="password">
        </div>
        <a href="#" class="forgot-password">Lupa password?</a>
        <button>Masuk</button>
        <p class="register">Mau bikin akun? <a href="register2">Klik untuk mendaftar.</a></p>
    </div>
</div>
@endsection