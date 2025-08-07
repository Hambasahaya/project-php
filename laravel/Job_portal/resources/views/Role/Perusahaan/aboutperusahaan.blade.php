@extends('layouts.perusahaan') 

@section('content')


<div class="profilperusahaan ">
    
    <div class="profile-card shadow">
        <img src="{{ asset('images/foto.png') }}" alt="Profile">
        <div class="profile-name">Frozen Company</div>
    </div>

    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4 mt-4">
        <a href="/about-perusahaan"
            class=" {{ request()->is('about-perusahaan') ? 'text-primary border-bottom border-primary fw-bold' : 'text-dark' }}">
            About
       </a>
           
        <a href="job-list"
           class="{{ request()->is('job-list') ? 'text-primary border-bottom border-primary fw-bold' : 'text-dark' }}">
           Daftar Lowongan
        </a>
           
        <a href="/kontak"
          class="{{ request()->is('kontak') ? 'text-primary border-bottom border-primary fw-bold' : 'text-dark' }}">
           Kontak
         </a>
    </div>

    <div class="box-about">
        <div class="box-descripsi">
            <h3>Descripsi</h3> 
          </div>
          <hr class="my-4 border border-light border-3">

          <div class="visi-misi-about">
            <div class="box-visi-misi">
                <h3>Visi</h3>
              </div>
              <div class="box-visi-misi">
                <h3>Misi</h3>
              </div>
          </div>
    </div>

    <div class="edit-button">
        <a href="" class="btn btn-primary shadow px-4">Edit Profile</a>
    </div>
</div>
@endsection
