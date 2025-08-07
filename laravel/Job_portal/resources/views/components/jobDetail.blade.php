@extends('layouts.app')

@section('content')
    <div class="JobDetailContainer">
        <div class="job-detail-card">
            <header class="job-header-banner">
                {{-- Menampilkan Posisi Pekerjaan --}}
                <h1>posisi</h1>

                {{-- Menampilkan Nama Perusahaan (dari profil perusahaan) --}}
                <div class="company-name-short">Nama Perusahaan</div>

                <div class="job-meta-info">


                    {{-- Menampilkan Kategori Pekerjaan --}}

                    <span><i class="fas fa-tags"></i>kategori </span>

                    <span><i class="fas fa-tag"></i>kategori </span>

                </div>
            </header>

            <div class="job-content-wrapper">
                <main class="job-main-content">
                    <section class="job-section">
                        {{-- Menampilkan Info Tentang Perusahaan (dari profil perusahaan) --}}
                        <h2>Tentang Perusahaan: Nama Perusahaan</h2>
                        <p></p>
                    </section>

                    <section class="job-section">
                        <h2>Detail Pekerjaan</h2>
                        <div class="job-description-content">

                        </div>
                        <small class="form-text text-muted mt-3 d-block">
                            <em>Untuk tampilan terbaik, informasi mengenai Tanggung Jawab, Kualifikasi, dan Benefit
                                diharapkan telah dimasukkan dalam deskripsi di atas dengan format yang jelas (misalnya
                                menggunakan bullet points atau sub-judul).</em>
                        </small>
                    </section>

                    {{-- Tombol Lamar di bawah konten utama --}}
                    <a href="#apply" class="btn apply-now-btn-bottom mt-4">Lamar Sekarang</a>
                </main>

                <aside class="job-sidebar">
                    <div class="company-info-box">
                        {{-- Menampilkan Logo Perusahaan (dari profil perusahaan) --}}
                        <img src="" alt="" class="company-logo-sidebar">

                        <h3>Nama Perusahaan</h3>

                        {{-- Menampilkan Tagline Perusahaan (dari profil perusahaan, jika ada) --}}
                        <p class="company-tagline">deskripsi singkat</p>

                        {{-- Tombol Kunjungi Website (dari profil perusahaan) --}}

                        <a href="" target="_blank" class="btn visit-company-btn">Kunjungi Website Perusahaan</a>

                    </div>

                    {{-- Anda bisa menambahkan gambar ilustrasi pekerjaan di sini jika relevan --}}
                    <div class="job-image-container">
                        <img src="{{ asset('images/ui-ux-job-illustration.jpg') }}" alt="Ilustrasi Pekerjaan"
                            class="job-illustration-sidebar">
                    </div>

                    {{-- Tombol Lamar di Sidebar --}}
                    <a href="#apply" class="btn apply-now-btn-sidebar">Lamar Sekarang</a>
                </aside>
            </div>
        </div>
    </div>
@endsection
