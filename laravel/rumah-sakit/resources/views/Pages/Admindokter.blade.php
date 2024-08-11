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
    <h5 class="card-title">Data Dokter di {{Auth::user()->nama_lengkap}}</h5>
    @endif
    <button type="button" class="btn btn-primary mt-4 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah dokter
    </button>
    <div class="d-flex mt-4 dokterlist justify-content-center p-4 flex-column align-items-center">
        <div class="row row-cols-2">
            <?php for ($i = 0; $i < 20; $i++) : ?>
                @if($tenaga_dokter != null)
                @foreach($tenaga_dokter as $dokter)
                <div class="col">
                    <div class="card mb-3" style="width: 37vw;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center p-2 rounded-start">
                                <img src="{{ asset('asset/img/userfoto/' . $dokter->user->foto) }}" class="img-fluid" alt="..." style="border-radius: 100%;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title">Dr.{{$dokter->user->nama_lengkap}}<br>{{$dokter->spesialis->nama}}
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
                                            <button type="button" class="btn btn-danger delete" data-id="{{ $dokter->user->id }}">Delete</button>
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
<!-- Modal -->
<div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 90vw;-ms-overflow-style: none;scrollbar-width: none; ">
    <div class=" modal-dialog">
        <div class="modal-content" style="background-color:white;width:55vw;height:min-content;padding:20px">
            <h4 class="text-center mt-4">Tambah Data Dokter</h4>
            <form id="dokterForm" action="{{ route('createdokter') }}" method="post" class="d-flex p-4 flex-column" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="dokter_id">
                <input type="hidden" name="id_rumah_sakit" value="{{ $rumahsakit }}">
                <label for="nama_lengkap" class="form-label">Nama Lengkap dokter: @error('nama_lengkap'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                    <input type="text" class="form-control" placeholder="Nama Lengkap dokter" aria-describedby="basic-addon1" name="nama_lengkap" id="nama_lengkap" required>
                </div>

                <label for="nik" class="form-label">No NIK dokter: @error('nik'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-vcard"></i></span>
                    <input type="text" class="form-control" placeholder="NIK dokter" aria-describedby="basic-addon1" name="nik" id="nik" required>
                </div>

                <label for="email" class="form-label">Email untuk akun Dokter: @error('email'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-heart-fill"></i></span>
                    <input type="email" class="form-control" placeholder="email dokter" aria-describedby="basic-addon1" name="email" id="email">
                </div>

                <label for="No_hp" class="form-label">No.Hp Dokter: @error('No_hp'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                    <input type="tel" class="form-control" placeholder="No.hp Dokter" aria-describedby="basic-addon1" name="No_hp" id="No_hp">
                </div>
                <label for="exampleFormControlInput1" class="form-label">alamat Lengkap dokter:@error('alamat_lengkap'){{ $message }}@enderror</label>
                <div class="input-group mb-4 ">
                    <span class="input-group-text "><i class="bi bi-geo"></i></span>
                    <textarea class="form-control" placeholder="alamat Lengkap dokter" id="alamat_lengkap" name="alamat_lengkap" style="height: 20vh;"></textarea>
                </div>
                <label for="No_SIP_dokter" class="form-label">Nomor Kedokteran: @error('No_SIP_dokter'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i><img src="/asset/img/sip.svg" width="20px" alt=""></i></span>
                    <input type="text" class="form-control" placeholder="No kedokteran" aria-describedby="basic-addon1" name="no_SIP" id="no_SIP">
                </div>

                <label for="tanggal_lahir" class="form-label">Tanggal Lahir Dokter: @error('tanggal_lahir'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-heart"></i></span>
                    <input type="date" class="form-control" placeholder="" aria-describedby="basic-addon1" name="tanggal_lahir" id="tanggal_lahir">
                </div>

                <label for="jenis_kelamin" class="form-label">Jenis Kelamin Dokter: @error('jenis_kelamin'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-gender-ambiguous"></i></span>
                    <select class="form-select form-select-sm" aria-label="Small select example" name="jenis_kelamin" id="jenis_kelamin" required>
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
                <label for="id_spesialis" class="form-label">Spesialis Dokter: @error('id_spesialis'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i><img src="/asset/img/spesialis.svg" width="20px" alt=""></i></span>
                    <select class="form-select form-select-sm" aria-label="Small select example" name="id_spesialis" id="id_spesialis" required>
                        <option selected>Pilih Spesialis Dokter</option>
                        @if($spesialis != null)
                        @foreach($spesialis as $layanan)
                        <option value="{{ $layanan->id }}">{{ $layanan->nama }}</option>
                        <input type="hidden" name="id_fasyankes" value="{{ $layanan->fasyankes->id }}">
                        @endforeach
                        @endif
                    </select>
                </div>
                <label for="password" class="form-label">Password Untuk akun dokter: @error('password'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                    <span class="input-group-text"><i class="bi bi-eye-slash-fill"></i></span>
                </div>
                <label for="Status_dokter" class="form-label">Status Dokter: @error('Status_dokter'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-toggle-on"></i></span>
                    <select class="form-select form-select-sm" aria-label="Small select example" name="Status_dokter" id="Status_dokter" required>
                        <option selected>Pilih Status Dokter</option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                </div>
                <label for="foto" class="form-label">Foto Dokter: @error('foto'){{ $message }}@enderror</label>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-image"></i></span>
                    <input type="file" class="form-control" aria-describedby="basic-addon1" name="foto" id="foto" accept="image/*">
                </div>
                <button class="mb-4 btndokter" type="submit">Daftarkan dokter</button>
                <button type="button mt-2 btndokter" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </form>
        </div>
    </div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@if(session('success_dokter'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: "{{ session('success_dokter') }}",
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif

@if(session('gagal_dokter'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: "{{ session('gagal_dokter') }}",
    });
</script>
@endif
<script>
    const editButtons = document.querySelectorAll('.edit-btn');
    const deleteButtons = document.querySelectorAll('.delete');
    const form = document.getElementById('dokterForm');
    const btnnform = document.querySelector(".btndokter")
    const originalAction = form.action;

    editButtons.forEach(button => {
        button.addEventListener('click', function() {

            btnnform.innerHTML = "Update data dokter"
            const dokterId = this.getAttribute('data-id');
            fetch(`/dokter/${dokterId}`)
                .then(response => response.json())
                .then(data => {
                    form.action = "{{ route('updatedokter') }}";
                    document.getElementById('dokter_id').value = data.id;
                    document.getElementById('nama_lengkap').value = data.nama_lengkap;
                    document.getElementById('nik').value = data.nik;
                    document.getElementById('email').value = data.email;
                    document.getElementById('No_hp').value = data.No_hp;
                    document.getElementById('alamat_lengkap').value = data.alamat_lengkap;
                    document.getElementById('no_SIP').value = data.no_SIP;
                    document.getElementById('tanggal_lahir').value = data.tanggal_lahir;
                    document.getElementById('jenis_kelamin').value = data.jenis_kelamin;
                    document.getElementById('id_spesialis').value = data.id_spesialis;
                    document.getElementById('Status_dokter').value = data.Status_dokter;
                    document.getElementById('password').value = "";

                    const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                    modal.show();
                })
                .catch(error => console.error('Error fetching dokter data:', error));
        });
    });
    document.getElementById('exampleModal').addEventListener('hidden.bs.modal', function() {
        form.action = originalAction;
        btnnform.innerHTML = "Daftarkan Dokter!"
        form.reset();
        editOnlyElements.forEach(element => {
            element.style.display = 'none';
        });
    });
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const dokterId = this.getAttribute('data-id');
            fetch(`/hapusdokter/${dokterId}`, {
                    method: 'GET'
                })
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Gagal menghapus dokter');
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
                        text: 'Gagal menghapus dokter!',
                    });
                });
        });
    });
</script>
@endsection