@extends('Layout.DasboardLayout')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('laporan_sukses'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: '{{ session('
        laporan_sukses ') }}',
        confirmButtonColor: '#3085d6',
    });
</script>
@endif

@if(session('laporan_gagal'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{ session('
        laporan_gagal ') }}',
        confirmButtonColor: '#d33',
    });
</script>
@endif

<div class="container mt-4 laporanform">
    @if(request()->routeIs('Updatedatalaporan'))
    <h4 class="text-center mb-4">Form update data Laporan Pengaduan</h4>
    <form method="post" action="{{route('updateLaporan')}}" enctype="multipart/form-data">
        @csrf
        @if($laporans !=null)
        @foreach($laporans as $datalapor)
        <input type="hidden" name="id_laporan" value="{{$datalapor->id}}">
        <div class="mb-3">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Kategori Pengaduan</label>
                <select class="form-select" id="inputGroupSelect01" name="kategori_laporan">
                    <option selected value="{{$datalapor->kategori->id}}">{{$datalapor->kategori->kategori_laporan}}</option>
                    @foreach($kategori as $datakategori)
                    @if($datakategori->kategori_laporan===$datalapor->kategori->kategori_laporan)
                    @php
                    continue;
                    @endphp
                    @endif
                    <option value="{{$datakategori->id}}">{{$datakategori->kategori_laporan}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-earmark-text-fill"></i></span>
                <textarea class="form-control" aria-label="With textarea" name="deskripsi_laporan" placeholder="Deskripsi Laporan">{{$datalapor->deskripsi_laporan}}</textarea>
            </div>
        </div>
        <div class="mb-3 d-flex gap-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="saksi" value="1" id="radioDefault1">
                <label class="form-check-label" for="radioDefault1">
                    Ada Saksi
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="saksi" value="2" id="radioDefault2" checked>
                <label class="form-check-label" for="radioDefault2">
                    Tidak ada saksi
                </label>
            </div>
        </div>
        <div class="mb-3">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                <input type="text" class="form-control" placeholder="Lokasi Kejadian" aria-label="Username" name="lokasi_kejadian" value="{{$datalapor->lokai_kejadian}}">
                <span class="input-group-text"><i class="bi bi-calendar-x"></i></span>
                <input type="date" class="form-control" placeholder="Tanggal Kejadian" aria-label="Server" name="tanggal_kejadian" value="{{$datalapor->tanggal_kejadian}}">
            </div>
        </div>
        <div class="mb-3 d-flex gap-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="buktiTipe" id="tipeBukti" value="foto">
                <label class="form-check-label" for="radioDefault1">
                    Bukti Foto
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="buktiTipe" value="link">
                <label class="form-check-label" for="radioDefault2">
                    Bukti File
                </label>
            </div>
        </div>
        <div class="mb-3 d-none" id="inputBuktiFoto">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Upload Bukti Pendukung</label>
                <input type="file" class="form-control" id="inputGroupFile02" name="bukti_pendukung" required>
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
        </div>
        <div class="mb-3 d-none" id="inputLink">
            <label for="exampleInputEmail1" class="form-label">Link Drive Bukti Pendukung</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="link_bukti_pendukung">
            <div id="emailHelp" class="form-text">Pastikan kami mendapatkan akses untuk membuka drive</div>
        </div>
        <div class="mb-3">
            <img src="tes.jpg" alt="" srcset="">
        </div>
        <div class="mb-3">
            <button type="submit" class=" btn btn-outline-success">Update Data Laporan</button>
        </div>
    </form>
    @endforeach
    @endif
    @endif
    @if(request()->routeIs('AddLaporan'))
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h4 class="text-center mb-4">Form Data Laporan Pengaduan</h4>
    <form method="post" action="{{route('addNewLaporan')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Kategori Pengaduan</label>
                <select class="form-select" id="inputGroupSelect01" name="kategori_laporan">
                    <option selected>Pilih...</option>
                    @foreach($kategori as $datakategori)
                    <option value="{{$datakategori->id}}">{{$datakategori->kategori_laporan}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-earmark-text-fill"></i></span>
                <textarea class="form-control" aria-label="With textarea" name="deskripsi_laporan" placeholder="Deskripsi Laporan"></textarea>
            </div>
        </div>
        <div class="mb-3 d-flex gap-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="saksi" value="1" id="radioDefault1">
                <label class="form-check-label" for="radioDefault1">
                    Ada Saksi
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="saksi" value="2" id="radioDefault2" checked>
                <label class="form-check-label" for="radioDefault2">
                    Tidak ada saksi
                </label>
            </div>
        </div>
        <div class="mb-3">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                <input type="text" class="form-control" placeholder="Lokasi Kejadian" aria-label="Username" name="lokasi_kejadian">
                <span class="input-group-text"><i class="bi bi-calendar-x"></i></span>
                <input type="date" class="form-control" placeholder="Tanggal Kejadian" aria-label="Server" name="tanggal_kejadian">
            </div>
        </div>
        <div class="mb-3 d-flex gap-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="buktiTipe" id="tipeBukti" value="foto">
                <label class="form-check-label" for="radioDefault1">
                    Bukti Foto
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="buktiTipe" value="link">
                <label class="form-check-label" for="radioDefault2">
                    Bukti File
                </label>
            </div>
        </div>
        <div class="mb-3 d-none" id="inputBuktiFoto">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Upload Bukti Pendukung</label>
                <input type="file" class="form-control" id="inputGroupFile02" name="bukti_pendukung" required>
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
        </div>
        <div class="mb-3 d-none" id="inputLink">
            <label for="exampleInputEmail1" class="form-label">Link Drive Bukti Pendukung</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="link_bukti_pendukung">
            <div id="emailHelp" class="form-text">Pastikan kami mendapatkan akses untuk membuka drive</div>
        </div>
        <div class="mb-3">
            <button type="submit" class=" btn btn-outline-success">Kirim Laporan</button>
        </div>
    </form>
    @endif
</div>
<script>
    const radios = document.querySelectorAll('input[name="buktiTipe"]');
    const inputBuktiFoto = document.querySelector("#inputBuktiFoto");
    const inputBuktiLink = document.querySelector("#inputLink");

    radios.forEach((radio) => {
        radio.addEventListener("change", () => {
            if (radio.checked && radio.value === "foto") {
                inputBuktiFoto.classList.remove('d-none');
                inputBuktiLink.classList.add('d-none');
            } else if (radio.checked && radio.value === "link") {
                inputBuktiLink.classList.remove('d-none');
                inputBuktiFoto.classList.add('d-none');
            }
        });
    });
</script>

@endSection