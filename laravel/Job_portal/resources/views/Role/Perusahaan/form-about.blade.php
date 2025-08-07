@extends('layouts.perusahaan')

@section('content')


<div class="profilperusahaan ">
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
      <h2>About Company</h2>
      <hr>

        <form>
           
                <div class="kolom">
                    <label for="Descripsi-perusahaan" class="form-label text-white">Company Name</label>
                    <input type="text" class="form-control" id="Descripsi-perusahaan" placeholder="Enter descripsi perusahaan">
                </div>
                <div class="kolom">
                    <label for="visi-perusahaan" class="form-label text-white">Email</label>
                    <input type="visi-perusahaan" class="form-control" id="visi-perusahaan" placeholder="Enter your visi">
                </div>
                <div class="kolom">
                    <label for="misi-perusahaan" class="form-label text-white">Company Address</label>
                    <input type="text" class="form-control" id="misi-perusahaan" placeholder="Enter your misi">
                </div>
               
         
            <div class="btn-save-form-about">
                <button type="submit" class="btn btn-primary px-4">Save Profile</button>
            </div>
        </form>

      

      
    </div>
</div>










@endsection
