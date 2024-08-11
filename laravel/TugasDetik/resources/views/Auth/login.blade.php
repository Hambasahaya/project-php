@extends('layout.UsersLayout')
@section('content')
<div class="container ">
    <div class="row box-login ">
        <div class="col-6 text-center box-1">
            <h4 id="form-title">MASUK/DAFTAR</h4>
            <img src="{{asset('img/loginasset.png')}}" alt="" style="width:70%">
            <img src="{{asset('img/detik.png')}}" alt="" style="width:30%">
        </div>
        <div class="col-4">
            <div class="screen">
                <div class="screen__content">
                    <form id="auth-form" class="login" action="{{route('login')}}" method="POST">
                        @csrf
                        <div id="nama-field" class="login__field" style="display:none;">
                            <i class="login__icon fas bi bi bi-person"></i>
                            <input type="text" name="nama_lengkap" class="login__input" placeholder="nama lengkap" required>
                            @error('nama_lengkap')
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="login__field">
                            <i class="login__icon bi bi-person"></i>
                            <input type="text" name="username" class="login__input" placeholder="Username" required>
                            @error('username')
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div id="email-field" class="login__field" style="display:none;">
                            <i class="login__icon fas bi bi-envelope-fill"></i>
                            <input type="email" name="email" class="login__input" placeholder="Email" required>
                            @error('email')
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="login__field">
                            <i class="login__icon fas bi bi-key-fill"></i>
                            <input type="password" name="password" class="login__input" placeholder="Password" required>
                            @error('password')
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button id="auth-button" class="button login__submit">
                            <span class="button__text">Log In Now</span>
                            <i class="button__icon bi-chevron-right"></i>
                        </button>
                    </form>
                    <div class="option">
                        <div class="option-btn d-flex flex-column">
                            <button id="toggle-auth-button" class="button login__submit">
                                <span class="button__text">Register Now</span>
                                <i class="button__icon bi-chevron-right"></i>
                            </button>
                            <button id="forget-password-button" class="button login__submit">
                                <span class="button__text">Forget Password?</span>
                                <i class="button__icon bi-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="screen__background">
                    <span class="screen__background__shape screen__background__shape4"></span>
                    <span class="screen__background__shape screen__background__shape3"></span>
                    <span class="screen__background__shape screen__background__shape2"></span>
                    <span class="screen__background__shape screen__background__shape1"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('toggle-auth-button').addEventListener('click', function() {
        const authForm = document.getElementById('auth-form');
        const authButton = document.getElementById('auth-button');
        const toggleButton = document.getElementById('toggle-auth-button');
        const emailField = document.getElementById('email-field');
        const namaField = document.getElementById('nama-field');
        const forgetPasswordButton = document.getElementById('forget-password-button');
        const formTitle = document.getElementById('form-title');

        if (authForm.action.endsWith('{{route("login")}}')) {
            authForm.action = '{{route("register")}}';
            authButton.querySelector('.button__text').textContent = 'Register Now';
            toggleButton.querySelector('.button__text').textContent = 'Back to Login';
            toggleButton.style.marginTop = "-750px";
            emailField.style.display = 'block';
            namaField.style.display = 'block';
            forgetPasswordButton.style.display = 'none';
            formTitle.textContent = 'DAFTAR';
        } else {
            authForm.action = '{{route("login")}}';
            authButton.querySelector('.button__text').textContent = 'Log In Now';
            toggleButton.querySelector('.button__text').textContent = 'Register Now';
            toggleButton.style.marginTop = "30px";
            emailField.style.display = 'none';
            namaField.style.display = 'none';
            forgetPasswordButton.style.display = 'flex';
            formTitle.textContent = 'MASUK';
        }
    });
</script>

@endSection