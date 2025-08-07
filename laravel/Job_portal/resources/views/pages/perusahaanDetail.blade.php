@extends('layouts.app')

@section('content')
<div class="profile-container">
    <div class="header">
        <div class="logo-PD">
            <img src="{{asset('storage/foto_user/'.$datapur->foto)}}" alt="perusahaan" class="w-100">
        </div>
        <div class=" info">
            <h4>{{ $datapur->nama }}</h4>
        </div>
    </div>

    <h5 style="margin-top: 30px;">Tentang {{ $datapur->nama }}</h5>

    <div class="section-box">
        <h5>Deskripsi</h5>
        <p>{{ $datapur->detailUser->deskripsi_pribadi??'belum dibuat' }}</p>
    </div>

    <div class="section-box">
        <h5>Hubungi Kami</h5>
        <p><strong>Alamat</strong><br>
            {{ $datapur->detailUser->alamat??'belum dibuat' }}
        </p>
        <p><strong>Nomor Telphone</strong><br>
            {{ $datapur->detailUser->noTlp??'belum dibuat' }}
        </p>
        <p><strong>email</strong><br>
            {{ $datapur->email??'belum dibuat' }}
        </p>
    </div>
</div>
@endsection