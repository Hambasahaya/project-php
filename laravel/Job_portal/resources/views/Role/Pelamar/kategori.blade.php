@extends('layouts.pelamar')
@section('content')

{{-- Rekomendasi --}}
<div class="container-all">
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
                <a href="/jobDetail" class="rekomendasi-button">Lihat +</a>
            </div>
        @endfor
    </div>
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