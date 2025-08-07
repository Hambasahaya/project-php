@extends('layouts.app')

@section('content')
    @php

        $nama = request('nama');
        $lokasi = request('lokasi');
    @endphp

    <div class="profile-container">
        <div class="header">
            <div class="logo-PD"></div>
            <div class="info">
                <h4>{{ $nama }}</h4>
                <div class="row-info">
                    <span style="margin-right: 100px">{{ $lokasi }}</span>
                    <span>Jenis pekerjaan</span>
                </div>
                <div class="row-info">
                    <span>Jumlah karyawan</span>
                </div>
            </div>
        </div>

        <h5 style="margin-top: 30px;">Tentang {{ $nama }}</h5>

        <div class="section-box">
            <h5>Deskripsi</h5>
            <p>
                lorem sojcpwmwpmcipkposjcojaibujbknjksjanoksaojci cjanc asicoscabs sansabcsacsa iscosauh08wq
                ishscabsajbcosaj
            </p>
        </div>

        <div class="section-box">
            <h5>Hubungi Kami</h5>
            <p><strong>Alamat</strong><br>
                jl.xxx snowmocm;lncs mnslkopeqw</p>
            <p><strong>Media Sosial</strong><br>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            </p>
        </div>
    </div>
@endsection
