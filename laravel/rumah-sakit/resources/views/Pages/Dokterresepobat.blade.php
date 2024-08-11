]@extends("Layout.Admin_layout")
@section("admin")
<style>
    td,
    th {
        text-align: center;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="width: max-content;">
                <div class="card-body">
                    <h5 class="card-title">Data Pasient Yang Telah Selesai Pemeriksaan</h5>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Nama Pasient</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Status Pasient</th>
                                    <th>Nomor Antiran</th>
                                    <th>Tujuan Spesialis</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @if($pasient != null)
                                @foreach($pasient as $apoteker)
                                @if($apoteker->status==="selesai")
                                <tr data-id="{{ $apoteker->user->id }}">
                                    <td>{{ $apoteker->user->nama_lengkap }}</td>
                                    <td>{{ $apoteker->user->email }}</td>
                                    <td>{{ $apoteker->user->No_hp }}</td>
                                    <td>{{ $apoteker->alamat}}</td>
                                    <td>{{ $apoteker->user->tanggal_lahir }}</td>
                                    <td class="status">{{ $apoteker->status }}</td>
                                    <td>{{ $apoteker->nomor_antrian }}</td>
                                    <td>{{ $apoteker->spesialis->nama }}</td>
                                    <td>{{ $apoteker->tanggal_berobat }}</td>
                                    <td>
                                        <div class="btn-group d-flex align-items-baseline" role="group" aria-label="Basic outlined example">
                                            @if($apoteker->resep==="belum_dibuat")
                                            <button type="button" class="btn btn-outline-primary resep" data-id="{{ $apoteker->user->id}}">Buat Resep Obat</button>
                                            @endif
                                            @if($apoteker->resep==="sudah dibuat")
                                            <button type="button" class="btn btn-outline-primary updateresep" data-id="{{ $apoteker->user->id}}">update Resep Obat</button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form id="apotekerForm" action="/offlinePasient" method="post" class="d-flex p-4 flex-column formobat" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id_pasient" name="id_pasient">
                            <input type="hidden" id="id_daftar" name="id_daftar">
                            <input type="hidden" id="id_rumah_sakit" name="id_rumah_Sakit">
                            <label for="alamat_lengkap" class="form-label">Diagnosa Penyakit:</label>
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-geo"></i></span>
                                <textarea class="form-control" placeholder="diagnosa" name="diagnosa" id="dignosa"></textarea>
                            </div>
                            <label for="alamat_lengkap" class="form-label">Catatan untuk Pasien::</label>
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-geo"></i></span>
                                <textarea class="form-control" placeholder="notes" name="notes" id="notes"></textarea>
                            </div>
                            <label for="obat" class="form-label">Pilih Obat Untuk Pasient:</label>
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pilih Obat
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach($obat as $dataobat)
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input obat-checkbox" type="checkbox" value="{{$dataobat->id}}" name="data_obat[]" id="obat1">
                                                <label class="form-check-label" for="obat1">
                                                    {{$dataobat->Nama_obat}}
                                                </label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <button class="mt-4 btn btn-primary" type="submit">Buat Obat Untuk Pasient</button>
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
@if(session('sukes_obat'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: "{{ session('sukes_obat') }}",
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif

@if(session('gagal_obat'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: "{{ session('sukes_obat') }}",
    });
</script>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const resep = document.querySelectorAll('.resep');
        const resepupd = document.querySelectorAll('.updateresep');
        const form = document.getElementById('apotekerForm');
        const submitButton = form.querySelector("button[type=submit]");
        const originalAction = form.action;

        resep.forEach(button => {
            button.addEventListener('click', function() {
                const apotekerId = this.getAttribute('data-id');
                fetch(`/pasientget/${apotekerId}`)
                    .then(response => response.json())
                    .then(data => {
                        form.action = "{{ route('addresep') }}";
                        document.getElementById('id_pasient').value = data.id_user;
                        document.getElementById('id_daftar').value = data.id_daftar;
                        document.getElementById('id_rumah_sakit').value = data.id_rumah_sakit;
                        const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                        modal.show();
                    })
                    .catch(error => console.error('Error fetching apoteker data:', error));
            });
        });
        document.getElementById('exampleModal').addEventListener('hidden.bs.modal', function() {
            form.action = originalAction;
            form.reset();
        });
        resepupd.forEach(button => {
            button.addEventListener('click', function() {
                const apotekerId = this.getAttribute('data-id');
                fetch(`/pasientget/${apotekerId}`)
                    .then(response => response.json())
                    .then(data => {
                        form.action = "{{ route('updresep') }}";
                        document.getElementById('id_pasient').value = data.id_user;
                        document.getElementById('id_daftar').value = data.id_daftar;
                        document.getElementById('id_rumah_sakit').value = data.id_rumah_sakit;
                        const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                        modal.show();
                    })
                    .catch(error => console.error('Error fetching apoteker data:', error));
            });
        });
        document.getElementById('exampleModal').addEventListener('hidden.bs.modal', function() {
            form.action = originalAction;
            form.reset();
        });


    });
</script>
@endsection