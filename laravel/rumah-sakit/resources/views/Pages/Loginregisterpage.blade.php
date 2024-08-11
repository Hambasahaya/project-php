@extends("Layout.Auth_layout")
@section("auth")
<div class="authpages d-flex flex-column">
    <div class="container">
        <div class="loginbox d-flex flex-column justify-content-center align-items-center align-content-center">
            <img src="/asset/img/welcome.svg" class="img-form" alt="" srcset="" width="25%">
            <form action="{{route('login')}}" method="post" class=" d-flex p-4 flex-column">
                @csrf
                <label for="exampleFormControlInput1" class="form-label">Email: @error('email'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-heart-fill"></i></span>
                    <input type="email" class="form-control" placeholder="email" aria-describedby="basic-addon1" name="email">
                </div>
                <label for="exampleFormControlInput1" class="form-label">Password: @error('password'){{ $message }}@enderror</label>
                <div class="input-group mb-4 ">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="passwordfild">
                    <span class="input-group-text"><i class="bi bi-eye-slash-fill" id="password"></i></span>
                </div>
                <button class="mt-4">Masuk</button>
            </form>
            <div class="d-flex align-items-baseline gap-2">
                <h6>Lupa Kata Sandi?</h6>
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" id="forgetpasbtn">Klik Disini</button>
            </div>
        </div>
        <div class="registerbox d-none flex-column justify-content-center align-items-center align-content-center">
            <img src="/asset/img/misi2.svg" alt="" class="img-form" srcset="" width="25%">
            <form action="{{route('register')}}" method="post" class=" d-flex p-4 flex-column">
                @csrf
                <label for="exampleFormControlInput1" class="form-label">Nama Lengkap: @error('nama_lengkap'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                    <input type="text" class="form-control" placeholder="Nama Lengkap" aria-describedby="basic-addon1" name="nama_lengkap" required>
                </div>
                <label for="exampleFormControlInput1" class="form-label">No NIK: @error('NIK'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-vcard"></i></span>
                    <input type="text" class="form-control" placeholder="NIK" aria-describedby="basic-addon1" name="nik" required>
                </div>
                <label for="exampleFormControlInput1" class="form-label">Email: @error('email'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-heart-fill"></i></span>
                    <input type="email" class="form-control" placeholder="email" aria-describedby="basic-addon1" name="email">
                </div>
                <label for="exampleFormControlInput1" class="form-label">No.Hp @error('No_hp'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                    <input type="tel" class="form-control" placeholder="phone number" aria-describedby="basic-addon1" name="No_hp">
                </div>
                <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir:@error('tanggal_lahir'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-heart"></i></span>
                    <input type="date" class="form-control" placeholder="" aria-describedby="basic-addon1" name="tanggal_lahir">
                </div>
                <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin::@error('jenis_kelamin'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-gender-ambiguous"></i></span>
                    <select class="form-select form-select-sm" aria-label="Small select example" name="jenis_kelamin" required>
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
                <label for="exampleFormControlInput1" class="form-label">Password:@error('password'){{ $message }}@enderror</label>
                <div class="input-group mb-4 ">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="passwordfild" required>
                    <span class="input-group-text"><i class="bi bi-eye-slash-fill" id="password"></i></span>
                </div>
                <button class="mt-4">Daftar</button>
            </form>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="background-color: transparent;">
                <div class="modal-content" style="background-color: transparent;">
                    <div class="forgetpass d-flex flex-column justify-content-center align-items-center align-content-center">
                        <form action="{{route('cekmail')}}" method="post" class="d-flex  p-4 flex-column">
                            @csrf
                            <img src="/asset/img/klinik29.svg" class="align-self-center img-form" alt="" srcset="" width="35%">
                            <h6 class="text-center">Kami hanya membutuhkan alamat email yang Anda daftarkan
                                untuk mengirimkan instruksi pengaturan ulang kata sandi Anda.</h6>
                            <label for="exampleFormControlInput1" class="form-label">Email:</label>
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-heart-fill"></i></span>
                                <input type="email" class="form-control" placeholder="email" aria-describedby="basic-addon1" name="email">
                            </div>
                            <button class="mt-4" type="submit">Ubah Kata sandi</button>
                            <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(session("status"))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById('verif'));
                myModal.show();
            });
        </script>
        <div class="modal fade" id="verif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="background-color: transparent;">
                <div class="modal-content" style="background-color: transparent;">
                    <div class="verivikasi d-flex flex-column justify-content-center align-items-center align-content-center">
                        <form action="{{ route('cekotp') }}" method="post" class="d-flex p-4 flex-column">
                            @csrf
                            <img src="/asset/img/klinik90.svg" class="align-self-center img-form" alt="" width="35%">
                            <h6 class="text-center">Masukkan 6 digit nomor kode OTP yang telah dikirimkan ke email</h6>
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-lock"></i></span>
                                <input type="text" class="form-control" placeholder="Kode OTP" aria-describedby="basic-addon1" name="otp">
                            </div>
                            @error('otp')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn btn-primary mt-4">Verifikasi</button>
                            <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">Batal</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(session("trueotp"))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById('newpas'));
                myModal.show();
            });
        </script>
        <div class="modal fade" id="newpas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="background-color: transparent;">
                <div class="modal-content" style="background-color: transparent;">
                    <div class="newpass d-flex flex-column justify-content-center align-items-center align-content-center">
                        <form action="{{route('newpas')}}" method="post" class="d-flex  p-4 flex-column">
                            @csrf
                            <img src="/asset/img/klinik900.svg" class="align-self-center img-form" alt="" srcset="" width="35%">
                            <h6 class="text-center">Pastikan Anda mengingat kata sandi Anda</h6>
                            <label for="exampleFormControlInput1" class="form-label">New Password:</label>
                            <div class="input-group mb-4 ">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="password" id="passwordfild">
                                <span class="input-group-text"><i class="bi bi-eye-slash-fill" id="password"></i></span>
                            </div>
                            <button class="mt-4">Ubah Kata Sandi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(session("berhasil_ubah"))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById('updatepasswordsukses'));
                myModal.show();
                setTimeout(() => {
                    window.location.href = '/login';
                }, 4000);
            });
        </script>
        <div class="modal fade" id="updatepasswordsukses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="background-color: transparent;">
                <div class="modal-content" style="background-color: transparent;">
                    <div class="finishnewpas d-flex flex-column justify-content-center align-items-center align-content-center">
                        <form action="" method="post" class="d-flex  p-4 flex-column">
                            <h6 class="text-center">KATA SANDI TELAH DIUBAH</h6>
                            <p class="text-center" style="color: white;">Anda akan di arahkan ke halaman login kembali!</p>
                            <img src="/asset/img/klinik9000.svg " class="align-self-center img-form" alt="" srcset="" width="35%">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(session("gagal_ubah"))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById('updatepasswordgagal'));
                myModal.show();
                setTimeout(() => {
                    window.location.href = '/login';
                }, 4000);
            });
        </script>
        <div class="modal fade" id="updatepasswordgagal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="background-color: transparent;">
                <div class="modal-content" style="background-color: transparent;">
                    <div class="finishnewpas d-flex flex-column justify-content-center align-items-center align-content-center">
                        <form action="" method="post" class="d-flex  p-4 flex-column">
                            <h6 class="text-center">KATA SANDI TELAH gagal DIUBAH</h6>
                            <p class="text-center" style="color: white;">Anda akan di arahkan ke halaman login kembali!</p>
                            <img src="/asset/img/klinik9000.svg" class="align-self-center img-form" alt="" srcset="" width="35%">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="d-flex w-100 p-2 mt-4 align-items-baseline justify-content-center" style="background-color:#40A2E3;">
        <h6 class="text-center" id="question" onclick="ClickLogin()">Belum Punya Akun?</h6>
        <button type="button" style="color: white;" class="btn btnlogin">Sign up</button>
    </div>
</div>
@endsection