<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<table id="datatablesSimple" class="table w-100">
    @if(Auth::user()->level==="user")
    <thead>
        <tr>
            <th>Nomor Laporan </th>
            <th>Tanggal Laporan</th>
            <th>Tanggal Kejadian</th>
            <th>Saksi Kejadian</th>
            <th>Lokasi Kejadian</th>
            <th>Kategori Laporan</th>
            <th>Deskripsi Laporan</th>
            <th>Bukti Pendukung</th>
            <th>status Laporan</th>
            <th>Action</th>
        </tr>
    </thead>
    @endif
    @if(Auth::user()->level==="admin" && request()->routeIs('DaftarPengaduan'))
    <thead>
        <tr>
            <th>Nomor Laporan </th>
            <th>Tanggal Laporan</th>
            <th>Alamat Pelapor</th>
            <th>Nama Pelapor</th>
            <th>Tanggal Kejadian</th>
            <th>Saksi Kejadian</th>
            <th>Lokasi Kejadian</th>
            <th>Kategori Laporan</th>
            <th>Deskripsi Laporan</th>
            <th>Bukti Pendukung</th>
            <th>status Laporan</th>
            <th>Action</th>
        </tr>
    </thead>
    @endif
    @if(request()->routeIs('KategoriLaporan'))
    <thead>
        <tr>
            <th>Nomor Kategori </th>
            <th>Kategori Laporan</th>
            <th>Action</th>
        </tr>
    </thead>
    @endif

    @if(request()->routeIs('statuspengaduan'))
    <tbody>
        @foreach($laporans as $dataLapor)
        <tr>
            <td>{{$dataLapor->nomor_Laporan}}</td>
            <td>{{$dataLapor->tanggal_laporan}}</td>
            <td>{{$dataLapor->tanggal_kejadian}}</td>
            <td>{{$dataLapor->saksi === 1 ? 'ada' : 'tidak ada' }}</td>
            <td>{{$dataLapor->lokasi_kejadian}}</td>
            <td>{{$dataLapor->kategori->kategori_laporan}}</td>
            <td>{{wordwrap($dataLapor->deskripsi_laporan, 100,) }}</td>
            <td>
                @php
                $bukti = $dataLapor->bukti_laporan;
                $isImage = preg_match('/\.(jpg|jpeg|png)$/i', $bukti);
                $isGDrive = Str::contains($bukti, 'drive.google.com');
                @endphp

                @if($isImage)
                <img src="{{ asset('storage/Bukti/'.$bukti) }}" alt="Bukti Laporan" width="100">
                @elseif($isGDrive)
                <a href="{{ $bukti }}" target="_blank">Lihat Bukti (Google Drive)</a>
                @else
                {{ $bukti }}
                @endif
            </td>
            <td>{{$dataLapor->statusLaporan}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="{{ route('Updatedatalaporan', ['id' => $dataLapor->id]) }}" class="btn btn-outline-primary">Ubah Laporan</button>
                        <a href="{{ route('hapusLaporan', ['id' => $dataLapor->id]) }}" class="btn btn-outline-primary">Batal Lapor</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    @endif

    @if(request()->routeIs('DaftarPengaduan'))
    <tbody>
        @foreach($laporans as $dataLapor)
        <tr>
            <td>{{$dataLapor->nomor_Laporan}}</td>
            <td>{{$dataLapor->tanggal_laporan}}</td>
            <td>{!! wordwrap($dataLapor->user->alamat, 40, "<br>") !!}</td>
            <td>{{$dataLapor->user->nama}}</td>
            <td>{{$dataLapor->tanggal_kejadian}}</td>
            <td>{{$dataLapor->saksi === 1 ? 'ada' : 'tidak ada' }}</td>
            <td>{{$dataLapor->lokasi_kejadian}}</td>
            <td>{{$dataLapor->kategori->kategori_laporan}}</td>
            <td>{{ wordwrap($dataLapor->deskripsi_laporan, 100,) }}</td>
            <td>
                @php
                $bukti = $dataLapor->bukti_laporan;
                $isImage = preg_match('/\.(jpg|jpeg|png)$/i', $bukti);
                $isGDrive = Str::contains($bukti, 'drive.google.com');
                @endphp

                @if($isImage)
                <img src="{{ asset('storage/Bukti/'.$bukti) }}" alt="Bukti Laporan" width="100">
                @elseif($isGDrive)
                <a href="{{ $bukti }}" target="_blank">Lihat Bukti (Google Drive)</a>
                @else
                {{ $bukti }}
                @endif
            </td>
            <td>
                <select name="statusLaporan" class="form-select" id="statusLaporan-{{$dataLapor->id}}" onchange="updateStatus({{$dataLapor->id}})">
                    <option value="diterima" {{ $dataLapor->statusLaporan == 'diterima' ? 'selected' : '' }}>diterima</option>
                    <option value="dalam review" {{ $dataLapor->statusLaporan == 'dalam review' ? 'selected' : '' }}>dalam review</option>
                    <option value="diproses" {{ $dataLapor->statusLaporan == 'diproses' ? 'selected' : '' }}>diproses</option>
                    <option value="laporan selesai" {{ $dataLapor->statusLaporan == 'laporan selesai' ? 'selected' : '' }}>laporan selesai</option>
                </select>
            </td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a href="https://wa.me/{{$dataLapor->user->noTlp}}?text=Assalamualaikum%20Wr%2CWb%0ATerimakasih%20telah%20melaporkan%20masalah%20anda%20kepada%20kami%2Ckami%20akan%20segera%20menindak%20lanjuti%20masalah%20anda%2CTim%20kami%20akan%20memverifikasi%20laporan%20anda%20untuk%20memprosesnya%20lebih%20lanjut.%0A%0Ajika%20ada%20pertanyaan%20yang%20anda%20ingin%20tanyakan%2CSilahkan%20Tanyakan%20Kepada%20kami.%0A%0ATerimakasih%0AAdmin%20YBLHK-DKI
" type="button" class="btn btn-outline-success"><i class="bi bi-whatsapp"></i> Hubungi Pelapor</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    @endif

    @if(request()->routeIs('KategoriLaporan'))
    <tbody>
        @foreach($kategori as $datakategori)
        <tr>
            <td>{{$datakategori->id-2}}</td>
            <td>{{$datakategori->kategori_laporan}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="#" onclick="editKategori({{ $datakategori->id }})" class="btn btn-outline-primary">Ubah Kategori</a>
                    <a href="/hapuskategori/{{ $datakategori->id }}" class="btn btn-outline-primary">Hapus Kategori</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    @endif
</table>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('Updkate')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" id="kategoriId" name="id">
                        <input type="text" id="myInput" class="form-control" placeholder="Nama Kategori" name="kategori_laporan">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
@if(session('success_hapus_laporan'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses Batal Lapor!',
        text: 'Laporan Berhasil Dibatalkan',
        confirmButtonColor: '#3085d6',
    });
</script>
@endif
@if(session('success_update_laporan'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses Update Data Laporan!',
        text: 'Laporan Berhasil di Update',
        confirmButtonColor: '#3085d6',
    });
</script>
@endif
@if(session('update_laporan_gagal'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: 'Laporan Gagal Untuk di Update!',
        confirmButtonColor: '#d33',
    });
</script>
@endif
<script>
    function editKategori(id) {
        fetch('/Updkategori/' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('kategoriId').value = id;
                    document.getElementById('myInput').value = data.kategori.kategori_laporan;
                    const modalUpddate = new bootstrap.Modal(document.getElementById('exampleModal2'));
                    modalUpddate.show();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function updateStatus(id) {
        const selectedStatus = document.getElementById('statusLaporan-' + id).value;
        fetch('/updStatus/' + id, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    statusLaporan: selectedStatus
                })
            })
            .then(response => {
                if (response.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses Update Data Laporan!',
                        text: 'Status Laporan Berhasil di Update',
                        confirmButtonColor: '#3085d6',
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memperbarui status.');
            });
    }
</script>