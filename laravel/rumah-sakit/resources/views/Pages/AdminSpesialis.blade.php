@extends("Layout.Admin_layout")
@section("admin")
<style>
    td,
    th {
        text-align: center;
    }
</style>
<section class="section">
    <div class="row">
        <div class="col-lg-18 w-100">

            <div class="card" style="width: max-content;">
                <div class="card-body">
                    <h5 class="card-title">Data layanan Spesialis di{{Auth::user()->nama_lengkap}} </h5>
                    <button type="button" class="btn btn-primary mt-4 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah layanan spesialis
                    </button>
                    <div class="table-responsive table-responsive-sm">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Nama Layanan Spesialis</th>
                                    <th>Harga Layanan Spesialis</th>
                                    <th>Kode QR</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @if($spesialis != null)
                                @foreach($spesialis as $dokter)
                                <tr>
                                    <td>{{$dokter->nama}}</td>
                                    <td>Rp.{{number_format($dokter->price_layanan)}}</td>
                                    <td><img src="{{ asset('asset/img/qrcode/' . $dokter->qr_code) }}" alt="Foto Apoteker" style="width: 50px; height: 50px;"></td>
                                    <td>
                                        <button class="btn btn-warning edit-btn" data-id="{{ $dokter->id }}">Edit</button>
                                        <button class="btn btn-danger delete" data-id="{{ $dokter->id }}">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: transparent;border:none; width:100vw">
            <div class=" modal-dialog" style="background-color: transparent;border:none;">
                <div class="modal-content" style="background-color: transparent;border:none;opacity:100">
                    <div class=" modal-body">
                        <div class="authpages">
                            <form id="dokterForm" action="{{ route('Addspesialis') }}" method="post" class="d-flex p-4 flex-column w-100" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_rumah_sakit" value="{{$rumahsakit}}">
                                <input type="hidden" name="id" id="dokter_id">
                                <label for="nama_lengkap" class="form-label">Nama Layanan Spesialis: @error('nama_lengkap'){{ $message }}@enderror</label>
                                <div class="input-group mb-4">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                                    <input type="text" class="form-control" placeholder="Nama Layanan Spesialis" aria-describedby="basic-addon1" name="nama" id="nama_lengkap" required>
                                </div>
                                <label for="nama_lengkap" class="form-label">Harga Layanan Spesialis: @error('nama_lengkap'){{ $message }}@enderror</label>
                                <div class="input-group mb-4">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-cash"></i></span>
                                    <input type="number" class="form-control" placeholder="Harga Layanan " aria-describedby="basic-addon1" name="price_layanan" id="price_layanan" required>
                                </div>
                                <button class="mt-4 btndokter" type="submit">Tambahkan Layanan Rumah Sakit</button>
                        </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@if(session('successqr'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: "{{ session('successqr') }}",
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif

@if(session('gagal_qr'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: "{{ session('gagal_qr') }}",
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
            btnnform.innerHTML = "Update Layanan Spesialis"
            const dokterId = this.getAttribute('data-id');
            fetch(`/layanan/${dokterId}`)
                .then(response => response.json())
                .then(data => {
                    form.action = "{{ route('Addspesialis') }}";
                    document.getElementById('nama_lengkap').value = data.nama;
                    document.getElementById('dokter_id').value = data.id;
                    document.getElementById('price_layanan').value = data.price_layanan;

                    const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                    modal.show();
                })
                .catch(error => console.error('Error fetching dokter data:', error));
        });
    });
    document.getElementById('exampleModal').addEventListener('hidden.bs.modal', function() {
        form.action = originalAction;
        btnnform.innerHTML = "Tambah layanan Spesialis!"
        form.reset();
        editOnlyElements.forEach(element => {
            element.style.display = 'none';
        });
    });
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const dokterId = this.getAttribute('data-id');
            fetch(`/hapusspesialis/${dokterId}`, {
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
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    location.reload();

                });
        });
    });
</script>
@endsection