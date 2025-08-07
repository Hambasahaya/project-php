@extends('layouts.perusahaan')

@section('content')


<div class="profilperusahaan ">
    <!-- Navbar -->
    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
        <a href="/editprofil-perusahaan"
            class=" {{ request()->is('editprofil-perusahaan') ? 'text-primary border-bottom border-primary fw-bold' : 'text-dark' }}">
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
        <div class="d-flex align-items-center mb-4">
            <img src="{{ asset('images/foto.png') }}" class="rounded-circle me-3" width="80" height="80" alt="Photo">
            <button class="btn btn-primary btn-sm">Change Photo</button>
        </div>
        
        <form>
            <div class="row g-4">
                <div class="col-md-6">
                    <label for="companyName" class="form-label text-white">Company Name</label>
                    <input type="text" class="form-control" id="companyName" placeholder="Enter your name">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label text-white">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your name">
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label text-white">Company Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter your location">
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label text-white">Phone Number</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter your name">
                </div>
                <div class="col-md-6">
                    <label for="location" class="form-label text-white">Location</label>
                    <input type="text" class="form-control" id="location" placeholder="Enter your location">
                </div>
                <div class="col-md-6">
                    <label for="website" class="form-label text-white">Website</label>
                    <input type="text" class="form-control" id="website" placeholder="Enter your name">
                </div>
            </div>
            <div class="btn-save">
                <button type="submit" class="btn btn-primary px-4">Save Profile</button>
            </div>
        </form>


      
    </div>
</div>

@endsection
