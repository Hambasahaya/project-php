@extends('layouts.pelamar')

@section('content')
<div class="field">
    <div class="container">
        <div class="search-container">
            <div class="search-perusahaan">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="What are you looking for?"/>
            </div>
                 <button class="search-button">Cari</button>
                <img
                  src="{{ asset('images/f1.png') }}"
                  alt="Logo"
                  class="logo"
                 />
         </div>
     </div>
</div>

{{-- Kategori --}}
<div class="container-all">
    <div class="popular-categories">
        <h2>Daftar Perusahaan</h2>
        <div class="Perusahaan-buttons">
            <button  onclick="location.href='/perusahaandetail'" class="btn btn-primary">
                <div class="card-body">
                    <img src="" alt="perusahaan">
                    <h5 class="card-title">PT. Surya Lestari</h5>
                    <p class="card-text">Jakarta, Indonesia</p> 
                </div>
            </button>
            <button  onclick="location.href='#'" class="btn btn-primary">
                <div class="card-body">
                    <img src="" alt="perusahaan">
                    <h5 class="card-title">PT. Surya Lestari</h5>
                    <p class="card-text">Jakarta, Indonesia</p> 
                </div>
            </button>
            <button  onclick="location.href='#'" class="btn btn-primary">
                <div class="card-body">
                    <img src="" alt="perusahaan">
                    <h5 class="card-title">PT. Surya Lestari</h5>
                    <p class="card-text">Jakarta, Indonesia</p> 
                </div>
            </button>
            <button  onclick="location.href='#'" class="btn btn-primary">
                <div class="card-body">
                    <img src="" alt="perusahaan">
                    <h5 class="card-title">PT. Surya Lestari</h5>
                    <p class="card-text">Jakarta, Indonesia</p> 
                </div>
            </button>
            <button  onclick="location.href='#'" class="btn btn-primary">
                <div class="card-body">
                    <img src="" alt="perusahaan">
                    <h5 class="nama-perusahaan">PT. Surya Lestari</h5>
                    <p class="lokasi-perusahaan">Jakarta, Indonesia</p> 
                </div>
            </button>
           
        </div>
    </div>

@endsection