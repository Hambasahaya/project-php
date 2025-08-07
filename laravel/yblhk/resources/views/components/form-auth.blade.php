<div class="row auth">
    <div class="col d-flex flex-column" id="col1">
        <img src="/assets/img/logo.png" alt="" srcset="">
        <form class="login {{ $errors->any() ? 'error-active' : '' }}" action="{{route('Login')}}" method="post">
            @csrf
            <h4 class="text-center">Login</h4>
            <p class="text-center">Pusat Pelayanan Pengaduan Online YBLHK-DKI Jakarta</p>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Email...">
                @error('email')
                <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <label for="regEmail" class="form-label">password</label>
            @error('password')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
            <div class="input-group mb-3 password-container">
                <input required type="password" class="form-control" id="passwordInput" name="password" placeholder="Password">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword"><i class="bi bi-eye-slash-fill" id="icon"></i></button>
            </div>
            <button type="submit" class="btn btn-primary mb-3" id="btnlogin">Login!</button>
            <button type="button" id="btnregister" class="btn mb-3">Belum Punya Akun?</button>
            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Lupa Password ?</button>
        </form>
    </div>
    <div class="col d-flex flex-column" id="col2">
        <h4>Keadilan bagi Seluruh Lapisan Masyarakat, Memberikan Perlindungan Hukum yang Menyeluruh dan Tanpa Batas bagi Mereka yang Membutuhkan Demi Terwujudnya Kesetaraan di Hadapan Hukum</h4>
        <img src="/assets/img/bg.png" alt="">
    </div>
    <div class="col d-none flex-column" id="col3">
        <form class="register {{ $errors->any() ? 'error-active' : '' }}" action="{{route('register')}}" method="post">
            @csrf
            <h4 class="text-center">Register</h4>
            <p class="text-center">Pusat Pelayanan Pengaduan Online YBLHK-DKI Jakarta</p>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input required type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                @error('nama')
                <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="notlp" class="form-label">Nomor Telepon/WhatsApp Aktif</label>
                <input required type="text" class="form-control" id="notlp" name="noTlp" placeholder="Nomor Whatsapp">
                @error('noTlp')
                <div id="emailHelp" class="form-text text-danger ">{{$message}}</div>
                @enderror
            </div>
            <div class="form-check form-check-inline">
                <input required class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="laki-laki">
                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline mb-3">
                <input required class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="perempuan">
                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
            </div>
            <div class="mb-3">
                <label for="regtanggal" class="form-label">Tanggal Lahir</label>
                <input required type="date" class="form-control" id="regtanggal" name="tanggalLahir">
                @error('tanggalLahir')
                <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="regalamat" class="form-label">Alamat Lengkap</label>
                <input required type="text" class="form-control" id="regalamat" name="alamat" placeholder="Nama jalan/RT/RW/KEC/KEL/KOTA/PROVINSI">
                @error('alamat')
                <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="regEmail" class="form-label">Email </label>
                <input required type="email" class="form-control" id="regEmail" name="email" placeholder="Email">
                @error('email')
                <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>

            <label for="regEmail" class="form-label">password</label>
            @error('password')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
            <div class="input-group mb-3 password-container">
                <input required type="password" class="form-control" id="passwordInput" name="password" placeholder="Password">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword"><i class="bi bi-eye-slash-fill" id="icon"></i></button>
            </div>
            <button type="submit" class="btn btn-primary mb-3" id="btnRegisterSubmit">Register!</button>
            <button type="button" id="btnloginback" class="btn mb-3">Sudah Punya Akun?</button>
        </form>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Lupa Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="forgetpassword">
                    <div class="mb-3">
                        <label for="Emailverif" class="form-label" id="emailveriflebel">Email</label>
                        <input type="email" class="form-control" id="emailverif" aria-describedby="emailHelp" name="email" placeholder="email terdaftar....">
                    </div>

                    <div class="input-group mb-3 d-none password-container" id="passwordfild">
                        <input required type="password" class="form-control" id="passwordInput" name="password" placeholder=" Masukan Password baru!">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword"><i class="bi bi-eye-slash-fill" id="icon"></i></button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="mb-3 mt-1 d-flex align-item-center gap-2">
                    <button type="button" onclick="forgetpassword()" class="btn btn-primary" id="forgetProses">Proses</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
@push('scripts')
<script>
    const email = document.getElementById('emailverif');
    const fildPassword = document.querySelector("#passwordfild")
    const newPassword = fildPassword.querySelector('#passwordInput')
    const btnforget = document.querySelector('#forgetProses')

    function getCSRFToken() {
        return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    }

    function showPasswordfild() {
        fildPassword.classList.toggle("d-none")
        btnforget.removeAttribute('onclick')
        btnforget.setAttribute('onclick', 'forgetPassproses()');
        const modal = new bootstrap.Modal(document.getElementById('exampleModal1'));
        modal.show();
    }

    function forgetpassword() {
        const csrfToken = getCSRFToken();
        if (!email.value) {
            alert('Masukkan email terlebih dahulu!');
            return;
        }
        fetch('/verifEmail', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    email: email.value
                })
            })
            .then(response => {
                if (response.status === 200) {
                    Swal.fire({
                        title: "Email Anda Terdaftar!",
                        text: "Silahkan Lanjut Dengan Memasukan Password Baru Untuk Akun Anda!",
                        icon: "success"
                    });
                    showPasswordfild()
                } else if (response.status === 404) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Alamat Email Yang Anda Masukan Tidak Ditemukan!",
                    });
                }
            })
    }

    function forgetPassproses() {
        const csrfToken = getCSRFToken();
        if (!newPassword.value) {
            alert('Masukkan password baru terlebih dahulu!');
            return;
        }
        fetch('/forgetpassword', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    email: email.value,
                    password: newPassword.value
                })
            })
            .then(response => {
                if (response.status === 200) {
                    Swal.fire({
                        title: "Password Anda Berhasil Di ubah!",
                        text: "Silahkan Login Dengan Password Baru Anda!",
                        icon: "success"
                    });
                } else if (response.status == 500 || response.status === 404) {
                    Swal.fire({
                        icon: "error",
                        title: "Terjadi Kesalahan!!!",
                        text: "Gaggal Mengubah Password!",
                    });
                }
            })

            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan, coba lagi.');
            });
    }
</script>
@endpush