@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <div class="logo-reset">
        <img src="{{ asset('images/wnn3.png') }}" alt="Winn Jobs Logo" height="50" width="180">    
    </div>
    <div class="Reset-container">
        <div class="form-reset">
            <div class="header-reset">
                <h2>Cek email anda !</h2>
            </div>
            <div style="margin-bottom: 20px">Kami mengirimkan link reset ke email Anda, masukkan 4 digit kode 
                yang disebutkan dalam email.</div>
            <div>
                <label for="email">Kode</label>
                <input type="email" id="email">
            </div>
            <button style="margin-top: 10px" onclick="location.href='/reset'" class="btn btn-primary">Verify Kode</button>
        </div>
    </div>
@endsection