@extends('layouts.perusahaan')

@section('content')


<div class="profilperusahaan">
     <!-- Navbar -->

      <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
         <a href="/editprofil-perusahaan"
             class=" {{ request()->is('editprofil-perusahaan') ? 'text-primary border-bottom border-primary' : 'text-dark' }}">
                   Edit Profile
        </a>
            
         <a href="/form-about"
            class="{{ request()->is('form-about') ? 'text-primary border-bottom border-primary fw-bold' : 'text-dark' }}">
            About
         </a>
            
         <a href="/post-job"
           class="{{ request()->is('post-job') ? 'text-primary border-bottom border-primary fw-bold' : 'text-dark' }}">
            Post a Job
          </a>
     </div>
            

    <!-- Profile Card -->
    <div class="edit-profile-container position-relative">
      <h2>Tambah Lowongan</h2>
      <hr>

      <form>
        <div class="kolom mb-3">
            <label for="posisi" class="form-label text-white">Posisi Pekerjaan</label>
            <input type="text" class="form-control" id="posisi" placeholder="Contoh: Frontend Developer">
        </div>
    
        <div class="kolom mb-3">
            <label class="form-label text-white">Kategori Pekerjaan</label>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Pilih Kategori
                </button>
                <ul class="dropdown-menu w-100 p-2 shadow">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="UI/UX" id="uiux">
                            <label class="form-check-label" for="uiux">UI/UX</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Frontend" id="frontend">
                            <label class="form-check-label" for="frontend">Frontend</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Backend" id="backend">
                            <label class="form-check-label" for="backend">Backend</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Fullstack" id="fullstack">
                            <label class="form-check-label" for="fullstack">Fullstack</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
    
        <div class="kolom mb-3">
            <label for="deskripsi" class="form-label text-white">Deskripsi Pekerjaan</label>
            <textarea class="form-control" id="deskripsi" rows="4" placeholder="Masukkan deskripsi pekerjaan..."></textarea>
        </div>
    
        <div class="btn-save">
            <button type="submit" class="btn btn-primary px-4">Tambah</button>
        </div>
    </form>
    
    
    
    
      

      
    </div>
</div>





@endsection
