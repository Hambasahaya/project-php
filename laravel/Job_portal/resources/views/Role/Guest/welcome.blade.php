@extends('layouts.guest')

@section('content')
{{-- Pencarian --}}
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



 <h1 class="text-center m-0 py-5 px-3">Cari lowongan yang anda inginkan</h1>


{{-- Login & Register untuk tamu --}}
<div class="container-box-pendaftaran">
<div class="box-pendaftaran">
    <div class="tombol-pendaftaran">
        <a href="/login" class="login">Masuk</a>
        <a href="/register" class="register">Daftar</a>
    </div>
    <div class="description">
        <p>Masuk untuk mengelola profil JobStreet, menyimpan pencarian kerja, dan melihat lowongan yang disarankan untuk Anda.</p>
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

    <div class="company-carousel">
      <div class="carousel-header text-center ">
        <h2>Temukan perusahaan Anda berikutnya</h2>
        <p>
          Jelajahi profil perusahaan untuk menemukan tempat kerja yang tepat bagi
          Anda. Pelajari tentang pekerjaan, ulasan, budaya perusahaan, keuntungan,
          dan tunjangan.
        </p>
      </div>
    
<!-- Carousel -->
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="d-flex justify-content-center gap-3 px-3">
              <!-- Kotak 1 -->
              <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">PT. Surya Lestari</h5>
                  <p class="card-text">Jakarta, Indonesia</p>
                  <a href="#" class="btn btn-primary">Lihat Profil</a>
                </div>
              </div>
              <!-- Kotak 2 -->
              <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">CV. Maju Jaya</h5>
                  <p class="card-text">Bandung, Indonesia</p>
                  <a href="#" class="btn btn-primary">Lihat Profil</a>
                </div>
              </div>
              <!-- Kotak 3 -->
              <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">PT. Teknologi Hebat</h5>
                  <p class="card-text">Surabaya, Indonesia</p>
                  <a href="#" class="btn btn-primary">Lihat Profil</a>
                </div>
              </div>
            </div>
          </div>
    
          <!-- Slide 2 -->
          <div class="carousel-item">
            <div class="d-flex justify-content-center gap-3 px-3">
              <!-- Kotak 4 -->
              <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">PT. Andalan Sejahtera</h5>
                  <p class="card-text">Yogyakarta, Indonesia</p>
                  <a href="#" class="btn btn-primary">Lihat Profil</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Navigasi Panah -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
           <!-- Indicators di bawah carousel -->
       <div class="carousel-indicators custom-indicators mt-3">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
       </div>
    </div>
      </div>
    

    <div class="cv-tutorial">
        <h2>Tutorial Membuat CV/Resume</h2>
        <div class="container-c" style="display: flex;">
          <div class="container-box">
          <div style="flex: 1;">
            <video controls style="width: 100%;">
                <source src="path/to/your/video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
         </div>
            <div class="video-description">
                <p>Video tutorial ini memberikan panduan lengkap dan praktis tentang cara membuat CV/Resume yang menarik dan efektif, mulai dari menyusun informasi pribadi, riwayat pendidikan, pengalaman kerja, hingga menonjolkan keahlian dan pencapaian Anda, serta memberikan tips tentang memilih desain yang tepat agar
                   CV/Resume Anda terlihat profesional dan menarik perhatian perekrut.</p>
               
            </div>
          </div>
        </div>
    
</div>

@endsection






