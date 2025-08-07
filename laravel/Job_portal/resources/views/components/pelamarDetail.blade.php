@extends('layouts.app')

@section('content')
    <div class="JobDetailContainer">
        <div class="job-detail-card">
            <header class="job-header-banner">
                {{-- Menampilkan Posisi Pekerjaan --}}
                <h1>Nama</h1>

                {{-- Menampilkan Nama Perusahaan (dari profil perusahaan) --}}
                <div class="company-name-short">Posisi</div>

                <div class="job-meta-info">


                    {{-- Menampilkan Kategori Pekerjaan --}}

                    <span><i class="fas fa-tags"></i>skill</span>

                    <span><i class="fas fa-tag"></i>skill</span>

                </div>
            </header>

            <div class="job-content-wrapper">
                <main class="job-main-content">
                    <section class="job-section">
                        <h2>Detail Profil</h2>
                        <div class="job-description-content">
                            Detail Bio
                        </div>
                        <small class="form-text text-muted mt-3 d-block">
                            <em>Untuk tampilan terbaik, informasi mengenai Tanggung Jawab, Kualifikasi, dan Benefit
                                diharapkan telah dimasukkan dalam deskripsi di atas dengan format yang jelas (misalnya
                                menggunakan bullet points atau sub-judul).</em>
                        </small>
                    </section>

                    {{-- Tombol Lamar di bawah konten utama --}}

                </main>

                <aside class="job-sidebar">
                    <div class="company-info-box">
                        {{-- Menampilkan Logo Perusahaan (dari profil perusahaan) --}}
                        <img src="" alt="" class="company-logo-sidebar">

                        <h3>Nama Pelamar</h3>

                        {{-- Menampilkan Tagline Perusahaan (dari profil perusahaan, jika ada) --}}
                        <p class="company-tagline">deskripsi singkat</p>
                        <p class="company-tagline">Hubungi</p>

                        {{-- Tombol Kunjungi Website (dari profil perusahaan) --}}

                        <!-- Tombol Hubungi via Email -->
                        <a href="mailto:{{-- $pelamar->email --}}" target="_blank" class="btn btn-primary">
                            Hubungi via Email
                        </a>

                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
