@extends('layouts.pelamar')



@section('content')




<div class="Profil-pelamar">
    <div class="user-header">
        <img class="avatar" src="{{ $user->photo_url ?? 'https://i.pravatar.cc/150?img=3' }}" alt="Profile Picture">
        <span class="user-name">Muhammad Alfa Fauzan</span>
      </div>
   <div class="d-flex justify-content-center align-items-center gap-5 border-bottom pb-3 mb-4">
    <a href="/profilPelamar"
       class="{{ request()->is('profilPelamar') ? 'text-primary border-bottom border-primary fw-bold' : 'text-dark' }}">
        Profil
    </a>

    <a href="/statuslamaran"
       class="{{ request()->is('statuslamaran') ? 'text-primary border-bottom border-primary fw-bold' : 'text-dark' }}">
        Status Lamaran
    </a>
</div>

      
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
  
@endsection
