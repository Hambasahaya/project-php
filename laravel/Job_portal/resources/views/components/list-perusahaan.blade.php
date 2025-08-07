@extends('layouts.app')

@section('content')
{{-- Pencaharian --}}
<x-pencarian variant="perusahaan" />
{{-- List Perusahaan --}}
<div class="container-all">
    <div class="popular-categories">
        <h2>Daftar Perusahaan</h2>
        <div class="Perusahaan-buttons">
            @foreach($datapr as $perusahaan)
            <button onclick="goToPerusahaan('{{$perusahaan->id}}')" class="btn btn-primary">
                <div class="card-body p-4">
                    <img src="{{asset('storage/foto_user/'.$perusahaan->foto)}}" alt="perusahaan" class="w-50
                    h-50">
                    <h5 class="card-title">{{$perusahaan->nama}}</h5>
                    <p class="card-text">Jakarta, Indonesia</p>
                </div>
            </button>
            @endforeach
        </div>
    </div>
</div>

<script>
    function goToPerusahaan(id) {
        window.location.href = `/perusahaandetail/${id}`;
    }
</script>
@endsection