@extends('layouts.app')

@section('content')
<div class="profilperusahaan ">
    @if(session("success_lowongan"))
    <x-showalert
        type="success"
        title="Well done!"
        footer="{{session('success_lowongan')}}">
    </x-showalert>
    @endif
    <div class="profile-card shadow mb-5">
        <img src="{{ asset('storage/foto_user/'.Auth::user()->foto) }}" alt="Profile">
        <div class="profile-name">{{Auth::user()->nama}}</div>
    </div>
    {{-- navigasi --}}
    <div class="d-flex justify-content-between align-items-center gap-5 border-bottom pb-3 mb-4">
        <button onclick="showSection('aboutSection')" id="btn-about"
            class="tab-link text-primary border-bottom border-primary fw-bold bg-transparent border-0">About</button>
        <button onclick="showSection('joblistSection')" id="btn-listjob"
            class="tab-link text-dark bg-transparent border-0">Job List</button>
        <button onclick="showSection('contactSection')" id="btn-contact"
            class="tab-link text-dark bg-transparent border-0">Contact</button>
    </div>

    {{-- <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4 mt-4">
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
</div> --}}

{{-- Sectiom About --}}
<div id="aboutSection">
    <div class="box-about">
        <div class="box-descripsi">
            <h3>Descripsi</h3>
            <hr>
            {{Auth::user()->detailUser->deskripsi_pribadi?? "belum dibuat"}}
        </div>
        <hr class="my-4 border border-light border-3">

        <div class="visi-misi-about">
            <div class="box-visi-misi">
                <h3>Visi</h3>
                <hr>
                {{Auth::user()->detailUser->visi?? "belum dibuat"}}
            </div>
            <div class="box-visi-misi">
                <h3>Misi</h3>
                <hr>
                {{Auth::user()->detailUser->misi?? "belum dibuat"}}
            </div>
        </div>
    </div>

    <div class="edit-button">
        <a href="/editprofil-perusahaan" class="btn btn-primary shadow px-4">Edit Profile</a>
    </div>
</div>

{{-- Section Job List --}}
<x-joblist></x-joblist>

{{-- Section Contact --}}
<div id="contactSection" style="display: none;">
    <div class="container" style="padding: 40px 20px;">
        <div class="kontak-card">
            <div class="info-left">
                <h2>{{Auth::user()->nama}}</h2>
                <a href="{{Auth::user()->detailUser->website??'#'}}" target="_blank" class="visit-button">Visit Website</a>

                <div class="contact-item">
                    <span>📧</span>
                    <p>{{Auth::user()->email}}</p>
                </div>

                <div class="contact-item">
                    <span>📞</span>
                    <p>{{Auth::user()->detailUser->noTlp??'belum dilengkapi'}}</p>
                </div>

                <div class="contact-item">
                    <span>📍</span>
                    <p>{{Auth::user()->detailUser->alamat??'belum dilengkapi'}}</p>
                </div>
            </div>

            <div class="map-right">
                {!! Auth::user()->detailUser->link_maps ?? 'belum dilengkapi' !!}

            </div>
        </div>
        @if(Auth::user()->role==="perusahaan")
        <div class="edit-btn-container">
            <a href="/editprofil-perusahaan" class="edit-btn">Edit Profile</a>
        </div>
        @endif
    </div>

</div>
</div>

<script>
    function showSection(sectionId) {
        // Sembunyikan semua section
        document.getElementById('aboutSection').style.display = 'none';
        document.getElementById('joblistSection').style.display = 'none'; // ← diperbaiki di sini
        document.getElementById('contactSection').style.display = 'none';

        // Reset semua tab
        document.getElementById('btn-about')?.classList.remove('text-primary', 'border-primary', 'fw-bold');
        document.getElementById('btn-about')?.classList.add('text-dark');
        document.getElementById('btn-listjob')?.classList.remove('text-primary', 'border-primary', 'fw-bold');
        document.getElementById('btn-listjob')?.classList.add('text-dark');
        document.getElementById('btn-contact')?.classList.remove('text-primary', 'border-primary', 'fw-bold');
        document.getElementById('btn-contact')?.classList.add('text-dark');

        // Tampilkan section sesuai tombol
        document.getElementById(sectionId).style.display = 'block';

        if (sectionId === 'aboutSection') {
            document.getElementById('btn-about')?.classList.add('text-primary', 'border-bottom', 'border-primary',
                'fw-bold');
            document.getElementById('btn-about')?.classList.remove('text-dark');
        } else if (sectionId === 'joblistSection') {
            document.getElementById('btn-listjob')?.classList.add('text-primary', 'border-bottom', 'border-primary',
                'fw-bold');
            document.getElementById('btn-listjob')?.classList.remove('text-dark');
        } else if (sectionId === 'contactSection') {
            document.getElementById('btn-contact')?.classList.add('text-primary', 'border-bottom', 'border-primary',
                'fw-bold');
            document.getElementById('btn-contact')?.classList.remove('text-dark');
        }
    }
</script>
@endsection