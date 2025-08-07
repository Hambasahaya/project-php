@extends('layouts.app')

@section('content')
    <x-pencarian :withLocation="true" />

    {{-- Kategori --}}
    <div class="container-all">


        {{-- Rekomendasi --}}
        <h2>List Pelamar</h2>
        <div class="rekomendasi">
            <div class="rekomendasi-list">
                @for ($i = 0; $i < 2; $i++)
                    <div class="rekomendasi-item">
                        <div class="rekomendasi-image">
                            {{-- Ganti dengan path gambar Anda --}}
                            <img src="{{ asset('images/placeholder.png') }}" alt="Gambar Rekomendasi">
                        </div>
                        <div class="rekomendasi-content">
                            <h3>Nama Pelamar</h3>
                            <p>Keahlian nya</p>
                            <p>Bio datanya</p>
                        </div>
                        <a href="/pelamarDetail" class="rekomendasi-button">Lihat +</a>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
