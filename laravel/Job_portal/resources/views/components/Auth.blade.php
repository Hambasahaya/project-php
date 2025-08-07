@extends('layouts.auth')

@section('title', request()->routeIs('Login') ? 'Login' : 'Register')
@section('content')
<div class="auth-container w-50">
    @if(request()->routeIs('login')|| request()->routeIs('Register'))
    <form class="form needs" action="{{ request()->routeIs('login') ? '/loginproses' : route('register.proses') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="header">
            <h2>{{ request()->routeIs('login') ? 'Login' : 'Register' }}</h2>
        </div>
        <div>
            @if (request()->routeIs('Register'))
            <div class="mb-3">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" aria-describedby="validationServerNamaFeedback">
                @error('nama')
                <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            @endif
            <label for="email">Alamat Email</label>
            <input type="email" id="email" name="email">
            @error('email')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="pw">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            @error('password')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        @if (request()->routeIs('Register'))
        <div class="pw">
            <label for="cmpassword">Comfirm Password</label>
            <input type="password" id="cmpassword" name="confrmpassword">
            @error('confrmpassword')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="true" id="checkChecked" name="perusahaan">
            <label class="form-check-label" for="checkChecked">
                Daftar Sebagai Perusahan
            </label>
        </div>
        @endif
        <a href="/forgetpassword" class="forgot-password">Lupa password?</a>
        <button type="submit">{{ request()->routeIs('login') ? 'login' : 'Register' }}</button>
        <p class="register">{{ request()->routeIs('login') ? 'Belum Punya Akun?' : 'Sudah punya Akun?' }} <a
                href="{{ request()->routeIs('login') ? '/register' : '/login' }}">{{ request()->routeIs('login') ? 'klik untuk register' : 'klik untuk login' }}</a>
        </p>
    </form>
    @endif
    @if(request()->routeIs('forgetpassword'))
    <div class="d-flex w-100">
        <div class="logo-reset">
            <img src="{{ asset('images/wnn3.png') }}" alt="Winn Jobs Logo" height="50" width="180">
        </div>
        <form action="{{route('password.send')}}" method="post">
            @csrf
            <div class="Reset-container w-100">
                <div class="form-reset">
                    <div class="header-reset">
                        <h2>Lupa Password</h2>
                    </div>
                    <div style="margin-bottom: 20px">Masukkan email untuk reset password</div>
                    <div class="w-100">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" name="email">
                    </div>
                    <button style="margin-top: 10px" type="submit" class="btn btn-primary">Reset</button>
                </div>
            </div>
        </form>
    </div>
    @endif
    @if(request()->routeIs('reset.password'))
    <div class="logo-reset">
        <img src="{{ asset('images/wnn3.png') }}" alt="Winn Jobs Logo" height="50" width="180">
    </div>
    <div class="Reset-container">

        <div class="form-reset">
            <div class="header-reset">
                <h2>Cek email anda !</h2>
            </div>
            <div style="margin-bottom: 20px">Kami mengirimkan link reset ke email Anda, masukkan 4 digit kode
                yang disebutkan dalam email.
            </div>
            <div>
                <form action="{{route('password.verify')}}" method="post">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <label>Kode</label>
                    <input type="number" name="kode">
                    <button style="margin-top: 10px" type="submit" class="btn btn-primary">Verif Kode</button>
                </form>
            </div>
        </div>
    </div>
    @endif
    @if(request()->routeIs('newpassword'))
    <div class="logo-reset">
        <img src="{{ asset('images/wnn3.png') }}" alt="Winn Jobs Logo" height="50" width="180">
    </div>
    <div class="Reset-container">

        <div class="form-reset">
            <div class="header-reset">
                <h2>Masukkan Password Baru Anda</h2>
            </div>
            <div>
                <form action="{{route('addnewpassword')}}" method="post">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <label>New Password</label>
                    <input type="password" name="password">
                    <button style="margin-top: 10px" type="submit" class="btn btn-primary">New Password!</button>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection