@extends('Layouts.Auth')

@section('auth')
<section class="vh-100" style="background: linear-gradient(to right, #141e30, #243b55);">
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="card border-0 shadow-lg w-100" style="max-width: 500px; border-radius: 1.5rem; background-color: #ffffff;">
            <div class="card-body p-5">
                @if(session("login_gagal"))
                <x-showalert type="danger" title="Login Gagal" footer="{{ session('login_gagal') }}" />
                @endif
                @if(session("login_berhasil"))
                <x-showalert type="success" title="Login Berhasil" footer="{{ session('login_berhasil') }}" />
                @endif
                @if(request()->routeIs('auth'))
                <h3 class="text-center mb-4 fw-bold text-dark">Masuk Akun</h3>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" id="email" name="email" class="form-control shadow-sm" placeholder="Masukan Email..." required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" id="password" name="password" class="form-control shadow-sm" placeholder="Masukan Password..." required>
                    </div>
                    <button type="submit" class="btn w-100 text-white shadow" style="background-color: #ff9500ff; transition: 0.3s ease;">
                        Login
                    </button>
                    <div class="mt-3 d-flex justify-content-between">
                        <a href="{{ route('forgetPassword') }}" class="text-decoration-none">Lupa Password?</a>

                    </div>
                </form>
                @endif
                @if(request()->routeIs('forgetPassword'))
                <h3 class="text-center mb-4 fw-bold text-dark">Lupa Password</h3>
                <form action="{{ route('verifemail') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" id="email" name="email" class="form-control shadow-sm" placeholder="Masukan Email..." required>
                    </div>
                    <button type="submit" class="btn w-100 text-white shadow" style="background-color: #ff9500ff;">
                        Kirim Kode
                    </button>
                    <div class="mt-3 text-center">
                        <a href="{{ route('auth') }}" class="text-decoration-none text-dark">Kembali ke Login</a>
                    </div>
                </form>
                @endif
                @if(request()->routeIs('verif'))
                <h3 class="text-center mb-4 fw-bold text-dark">Verifikasi Token</h3>
                <form action="{{ route('verif_token') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="token" class="form-label">Token</label>
                        <input type="text" id="token" name="token" class="form-control shadow-sm" placeholder="Masukan Token" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="password" id="password" name="password" class="form-control shadow-sm" placeholder="Masukan Password Baru" required>
                    </div>
                    <button type="submit" class="btn w-100 text-white shadow" style="background-color: #ff9500ff;">
                        Reset Password
                    </button>
                </form>
                @endif
                @if(request()->routeIs('reset.view'))
                <h3 class="text-center mb-4 fw-bold text-dark">Reset Password</h3>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="number" id="kode" name="email" class="form-control shadow-sm" placeholder="Masukan Kode Reset" required>
                    </div>
                    <button type="submit" class="btn w-100 text-white shadow" style="background-color: #ff9500ff;">
                        Verifikasi Kode
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection