@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <div class="logo-reset">
        <img src="{{ asset('images/wnn3.png') }}" alt="Winn Jobs Logo" height="50" width="180">    
    </div>
    <div class="Reset-container">
        <div class="form-reset">
            <div class="header-reset">
                <h2>Mengatur ulang kata sandi baru</h2>
            </div>
            <div style="margin-bottom: 20px">Tentukan password baru anda !!</div>
            <div >
                <label for="password">Password</label>
                <input type="password" id="password">
            </div>
            <div >
                <label for="cmpassword">Comfirm Password</label>
                <input type="cmpassword" id="cmpassword">
            </div>
            <button style="margin-top: 10px" >Melanjutkan</button>
        </div>
    </div>
@endsection