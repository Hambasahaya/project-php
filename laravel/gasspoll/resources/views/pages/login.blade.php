@extends('layout.layout')
@section("content")
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="loginregister">
    <div class="loginbox d-flex">
        <div class="img-box">
            <img src="/img/bg1.png" alt="">
        </div>
        <div class="form-login">
            @if(session("error"))
            <div class="alert alert-danger" role="alert">
                {{ session("error") }}
            </div>
            @endif
            <h4 class="text-center" id="hform">LOGIN</h4>
            <form id="loginf" action="/login" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                </div>
                <div class="mb-3">
                    {!! NoCaptcha::display() !!}
                    @if ($errors->has('captcha'))
                    <span class="text-danger">{{ $errors->first('captcha') }}</span>
                    @endif
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-center">
                    <button class="btn btn-primary" type="submit">Login</button>
                    <button class="btn btn-primary" type="button" id="registers">Register?</button>
                    <button class="btn btn-primary" type="button" id="forgets">Forget Password?</button>
                </div>
            </form>
            <form id="register" action="/register" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Nama_lengkap" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control @error ('email') is-invalid @enderror'" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                    @error("email")
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label @error('phone') is-invalid @enderror" maxlength="13" id="phone">No.WhatsApp</label>
                    <input type="number" class="form-control" name="phone" required>
                    @error("phone")
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label @error('password') is-invalid @enderror">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                    @error("password")
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    {!! NoCaptcha::display() !!}
                    @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-center">
                    <button class="btn btn-primary" type="submit">Register</button>
                    <button class="btn btn-primary" type="button" id="login">Login?</button>
                </div>
            </form>
        </div>
    </div>
</div>
{!! NoCaptcha::renderJs() !!}
@endsection