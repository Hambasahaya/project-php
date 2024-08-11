@extends("Layout.Userpages_layout")
@section("usercontent")
<style>
    .queue-number-card {
        max-width: 400px;
        margin: 50px auto;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .queue-number {
        font-size: 48px;
        font-weight: bold;
        color: #007bff;
    }

    .btn-home {
        width: 100%;
        margin-top: 20px;
    }
</style>
<div class="container">
    <div class="queue-number-card text-center">
        <h4 class="mb-4">Selamat Pengobtan Kamu Telah Selesai</h4>
        @foreach($rumahsakit as $rs)
        <h5 class="mb-2">{{$rs->user->nama_lengkap}}</h5>
        <p class="mb-1">{{$rs->alamat_fasyankes}}</p>
        <h6 class="mb-3">{{Auth::user()->nama_lengkap}}</h6>
        @endforeach
        <h6 class="noted">Silahkan Buka Menu Resep Obat Ya!!!</h6>
    </div>
</div>
@endsection