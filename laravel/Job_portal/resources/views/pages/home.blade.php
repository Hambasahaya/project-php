@extends('layouts.app')

@section('content')
{{-- Pencarian --}}
<x-pencarian :withLocation="true" />



@if(!Auth::check())
<h1 class="text-center m-0 py-5 px-3">Cari lowongan yang anda inginkan</h1>
<div class="container-box-pendaftaran">
    <div class="box-pendaftaran">
        <div class="tombol-pendaftaran">
            <a href="/login" class="login">Masuk</a>
            <a href="/register" class="register">Daftar</a>
        </div>
        <div class="description">
            <p>Masuk untuk mengelola profil JobStreet, menyimpan pencarian kerja, dan melihat lowongan yang
                disarankan untuk Anda.</p>
        </div>
    </div>
</div>

@endif
{{-- Kategori --}}
<x-kategori />

@if(request()->routeIs('lowongan'))
<h4 class="text-center">Daftar Pekerjaan Terbaru</h4>
<x-listPekerjaan></x-listPekerjaan>
@endif

@if(request()->routeIs('home'))
{{-- Carousel (Daftar Perusahaan) --}}
<x-carousel />
{{-- Tutorial pembuatan cv ats --}}
<x-cv-tutor />
@endif
@endsection