@extends('Template.Layout2')
@section("signup")

<div class="container sign">
    <div class="row">
        <div class="col p-0 img-form">
            <img src="{{asset('img/bg5.jpg')}}" alt="" srcset="">
        </div>
        <div class="col d-flex flex-column gap-4 sign-in">
            <div class="container">
                <h4 class="text-center text-white">Welcome Back!!</h4>
                <p class="text-center text-white">Selamat Datang Kembali,Silahkan Log In dengan Akun anda!</p>
            </div>
            <form class="mt-4" action="{{route('login')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    @error('email')
                    <div id="emailHelp" class="form-text">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    @error('password')
                    <div id="emailHelp" class="form-text">{{$message}}</div>
                    @enderror
                </div>
                <div class="btn-form">
                    <button type="submit" class="btn btn-primary rounded-3">Log In!</button>
                    <button type="button" class="btn btn-primary rounded-3" id="signup">Sign Up!</button>
                </div>
            </form>
        </div>
        <div class="col d-none flex-column gap-4 signup">
            <div class="container">
                <h4 class="text-center text-white">Welcome</h4>
                <p class="text-center text-white">Selamat Datang! Silahkan Register Untuk Bergabung Dengan Kegiatan UKM UMB</p>
            </div>
            <form class="mt-4" method="post" action="{{route('register')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="nama">
                    @error('nama')
                    <div id="emailHelp" class="form-text">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Fakultas</label>
                    <input type="fakultas" class="form-control" id="exampleInputPassword1" name="fakultas">
                    @error('fakultas')
                    <div id="emailHelp" class="form-text text-red">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Jurusan</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="jurusan">
                    @error('jurusan')
                    <div id="emailHelp" class="form-text">{{$message}}</div>

                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nim</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="nim">
                    @error('nim')
                    <div id="emailHelp" class="form-text">{{$message}}</div>

                    @enderror
                </div>
                <div class="mb-3 d-flex">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pilih Minat UKM
                        </button>
                        <ul class="dropdown-menu p-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pilihan_ukm[]" value=" 1" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    UKM Pencak Silat
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="2" name="pilihan_ukm[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    UKM Tari
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="3" name="pilihan_ukm[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    UKM Futsal
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="4" name="pilihan_ukm[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    UKM Sepak Bola
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="5" name="pilihan_ukm[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    UKM Tekwondo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="6" name="pilihan_ukm[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    UKM Teater
                                </label>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email_sign">
                    @error('email')
                    <div id="emailHelp" class="form-text">{{$message}}</div>

                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password_sign">
                    @error('password')
                    <div id="emailHelp" class="form-text">{{$message}}</div>
                    @enderror
                </div>
                <div class="btn-form">
                    <button type="submit" class="btn btn-primary rounded-3">Sign Up!</button>
                    <button type="button" class="btn btn-primary rounded-3" id="sign">Log In!</button>
                </div>
            </form>
        </div>

    </div>
</div>
@if ($errors->has('email_sign') || $errors->has('password_sign') || $errors->has('nama')||$errors->has('jurusan')||$errors->has('fakultas'))
<script src="{{ asset('js/SignupError.js') }}"></script>
@endif


@endsection