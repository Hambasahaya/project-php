@extends('layouts.guest')

@section('content')
<div class="field">
    <div class="container">
        <div class="search-container">
            <div class="search-input">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="What are you looking for?"/>
            </div>
            <div class="input-lokasi">
                <input type="text" placeholder="Lokasi" />
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
        <h2>Kategori pekerjaan populer</h2>
        <div class="category-buttons">
            <button>UI/UX</button>
            <button>Frontend</button>
            <button>Programing</button>
            <button>IT Support</button>
            <button>Management</button>
            <button>Golang</button>
        </div>
    </div>


{{-- Rekomendasi --}}
<h2>Rekomendasi untuk kamu</h2>
<div class="rekomendasi">
    <div class="rekomendasi-list">
        @for ($i = 0; $i < 4; $i++)
            <div class="rekomendasi-item">
                <div class="rekomendasi-image">
                    {{-- Ganti dengan path gambar Anda --}}
                    <img src="{{ asset('images/placeholder.png') }}" alt="Gambar Rekomendasi">
                </div>
                <div class="rekomendasi-content">
                    <h3>Sewanam</h3>
                    <p>Open Position for UI/UX Designer</p>
                    <p>Established since 2000, PT. Sewanam Teknologi Solusindo is engaged in Software Development, especially Microfinance Institutions that focuses on Customer Centric towards Customer Satisfaction.</p>
                </div>
                <a href="#" class="rekomendasi-button">Lihat +</a>
            </div>
        @endfor
    </div>
</div>
</div>

<style>
    .rekomendasi {
        padding: 20px;
        font-family: sans-serif;
    }
    
    .rekomendasi h2 {
        margin-bottom: 20px;
    }
    
    .rekomendasi-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .rekomendasi-item {
        display: flex;
        background-color: #FF65C3; /* Warna latar belakang */
        padding: 15px;
        border-radius: 10px;
        align-items: center;
    }
    
    .rekomendasi-image {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: white; /* Warna lingkaran gambar */
        margin-right: 15px;
    }
    
    .rekomendasi-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
    
    .rekomendasi-content {
        flex: 1;
    }
    
    .rekomendasi-button {
        background-color: #5272FE; /* Warna tombol */
        color: white;
        padding: 10px 15px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
    }
    </style>
@endsection