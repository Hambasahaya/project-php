@extends('layouts.perusahaan')

@section('content')

<div class="profilperusahaan">
    <div class="profile-card mb-4 shadow">
        <img src="{{ asset('images/foto.png') }}" alt="Profile">
        <div class="profile-name">Frozen Company</div>
    </div>
    <!-- Navbar -->

     <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
        <a href="/about-perusahaan"
            class=" {{ request()->is('about-perusahaan') ? 'text-primary border-bottom border-primary fw-bold' : 'text-dark' }}">
                  About
       </a>
           
        <a href="/job-list"
           class="{{ request()->is('job-list') ? 'text-primary border-bottom border-primary fw-bold' : 'text-dark' }}">
           Daftar Lowongan
        </a>
           
        <a href="/kontak"
          class="{{ request()->is('kontak') ? 'text-primary border-bottom border-primary fw-bold' : 'text-dark' }}">
           kontak
         </a>
    </div>


    <a href="" class="post-button">Post New Job</a>

    {{-- Loop Job --}}
    
    <div class="job-card">
        <div class="job-info">
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo">
            <div class="job-text">
                <small>nama perusahaan</small>
                <strong>judul</strong>
                <small>descripso</small>
            </div>
        </div>
        <a href="/status-job" class="lihat-btn">
            Lihat →
        </a>
    </div>
  

   

</div>
@endsection
