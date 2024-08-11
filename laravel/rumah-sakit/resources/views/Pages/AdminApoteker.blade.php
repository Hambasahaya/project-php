@extends("Layout.Admin_layout")
@section("admin")
<style>
    td,
    th {
        text-align: center;
    }
</style>
<section class="section">
    @if(Auth::user()->role=="admin_rumah_sakit")
    <h5 class="card-title">Data Apoteker di {{Auth::user()->nama_lengkap}}</h5>
    @endif
    <button type="button" class="btn btn-primary mt-4 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Apoteker
    </button>
    <div class="d-flex mt-4 dokterlist justify-content-center p-4 flex-column align-items-center">
        <div class="row row-cols-2">
            <?php for ($i = 0; $i < 20; $i++) : ?>
                @if($tenaga_apoteker != null)
                @foreach($tenaga_apoteker as $dokter)
                <div class="col">
                    <div class="card mb-3" style="width: 37vw;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center p-2 rounded-start">
                                <img src="{{ asset('asset/img/userfoto/' . $dokter->user->foto) }}" class="img-fluid" alt="..." style="border-radius: 100%;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title">{{$dokter->user->nama_lengkap}}
                                    </h2>
                                    <p class="card-text"><i class="bi bi-geo-fill" style="font-size: 1rem; color: cornflowerblue"></i> {{$dokter->alamat_lengkap}}</p>
                                    <div class="d-flex gap-3">
                                        <p><i class="bi bi-telephone-outbound-fill" style="font-size: 1rem; color: green"></i> {{$dokter->user->No_hp}}</p>
                                        <p><i class="bi bi-envelope-heart-fill" style="font-size: 1rem; color: pink"></i> {{$dokter->user->email}}</p>
                                    </div>
                                    <div class="d-flex gap-3 align-items-baseline">
                                        <p><i class="bi bi bi-toggle-on" style="font-size: 1rem; color: green"></i> {{$dokter->Status_dokter}}</p>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <button type="button" class="btn btn-warning edit-btn" data-id="{{ $dokter->user->id }}">Update</button>
                                            <button type="button" class="btn btn-danger delete-btn" data-id="{{ $dokter->user->id }}">Delete</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            <?php endfor; ?>
        </div>
    </div>
</section>
<div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 90vw;-ms-overflow-style: none;scrollbar-width: none; ">
    <div class=" modal-dialog">
        <div class="modal-content" style="background-color:white;width:55vw;height:min-content;padding:20px">
            <form id="apotekerForm" action="/createapoteker" method="post" class="d-flex p-4 flex-column" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="apoteker_id">
                <input type="hidden" name="id_rumah_sakit" value="{{ $rumahsakit }}">

                <label for="nama_lengkap" class="form-label">Nama Lengkap Apoteker:</label>
                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                    <input type="text" class="form-control" placeholder="Nama Lengkap Apoteker" name="nama_lengkap" id="nama_lengkap" required>
                </div>

                <label for="nik" class="form-label">No NIK Apoteker:</label>
                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                    <input type="text" class="form-control" placeholder="NIK Apoteker" name="nik" id="nik" required>
                </div>

                <label for="email" class="form-label">Email untuk akun Apoteker:</label>
                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="bi bi-envelope-heart-fill"></i></span>
                    <input type="email" class="form-control" placeholder="Email Apoteker" name="email" id="email">
                </div>

                <label for="No_hp" class="form-label">No.Hp Apoteker:</label>
                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                    <input type="tel" class="form-control" placeholder="No.hp Apoteker" name="No_hp" id="No_hp">
                </div>

                <label for="alamat_lengkap" class="form-label">Alamat Lengkap Apoteker:</label>
                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="bi bi-geo"></i></span>
                    <textarea class="form-control" placeholder="Alamat Lengkap Apoteker" name="alamat_lengkap" id="alamat_lengkap"></textarea>
                </div>

                <label for="no_SIPA" class="form-label">Nomor SIPA Apoteker:</label>
                <div class="input-group mb-4">
                    <span class="input-group-text"><img src="/asset/img/sip.svg" width="20px" alt=""></span>
                    <input type="text" class="form-control" placeholder="No SIPA" name="no_SIPA" id="no_SIPA">
                </div>

                <label for="tanggal_lahir" class="form-label">Tanggal Lahir Apoteker:</label>
                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="bi bi-calendar-heart"></i></span>
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                </div>

                <label for="jenis_kelamin" class="form-label">Jenis Kelamin Apoteker:</label>
                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>

                <label for="password" class="form-label">Password Untuk akun Apoteker:</label>
                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                    <span class="input-group-text"><i class="bi bi-eye-slash-fill"></i></span>
                </div>

                <label for="Status_apoteker" class="form-label">Status Apoteker:</label>
                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="bi bi-toggle-on"></i></span>
                    <select class="form-select" name="Status_apoteker" id="Status_apoteker" required>
                        <option selected>Pilih Status Apoteker</option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                </div>

                <label for="foto" class="form-label">Foto Apoteker:</label>
                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="bi bi-image"></i></span>
                    <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
                </div>

                <button class="mt-4 btn btn-primary" type="submit">Daftarkan Apoteker</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@if(session('sukses_addapoteker'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: "{{ session('sukses_addapoteker') }}",
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif

@if(session('gagal_addapoteker'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: "{{ session('gagal_addapoteker') }}",
    });
</script>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editButtons = document.querySelectorAll('.edit-btn');
        const deleteButtons = document.querySelectorAll('.delete-btn');
        const form = document.getElementById('apotekerForm');
        const submitButton = form.querySelector("button[type=submit]");
        const originalAction = form.action;

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                submitButton.innerHTML = "Update data Apoteker";
                const apotekerId = this.getAttribute('data-id');
                fetch(`/apoteker/${apotekerId}`)
                    .then(response => response.json())
                    .then(data => {
                        form.action = "{{ route('updateApoteker') }}";
                        document.getElementById('apoteker_id').value = data.id;
                        document.getElementById('nama_lengkap').value = data.nama_lengkap;
                        document.getElementById('nik').value = data.nik;
                        document.getElementById('email').value = data.email;
                        document.getElementById('No_hp').value = data.No_hp;
                        document.getElementById('alamat_lengkap').value = data.alamat_lengkap;
                        document.getElementById('no_SIPA').value = data.no_SIPA;
                        document.getElementById('tanggal_lahir').value = data.tanggal_lahir;
                        document.getElementById('jenis_kelamin').value = data.jenis_kelamin;
                        document.getElementById('Status_apoteker').value = data.Status_apoteker;
                        document.getElementById('password').value = "";

                        const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                        modal.show();
                    })
                    .catch(error => console.error('Error fetching apoteker data:', error));
            });
        });

        document.getElementById('exampleModal').addEventListener('hidden.bs.modal', function() {
            form.action = originalAction;
            submitButton.innerHTML = "Daftarkan Apoteker";
            form.reset();
        });

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const apotekerId = this.getAttribute('data-id');
                fetch(`/hapusapoteker/${apotekerId}`, {
                        method: 'GET'
                    })
                    .then(response => {
                        if (response.ok) {
                            return response.json();
                        } else {
                            throw new Error('Gagal menghapus apoteker');
                        }
                    })
                    .then(data => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Gagal menghapus apoteker!',
                        });
                    });
            });
        });
    });
</script>
@endsection