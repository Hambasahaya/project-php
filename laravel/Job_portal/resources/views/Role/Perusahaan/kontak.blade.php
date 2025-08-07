@extends('layouts.perusahaan')

@section('content')
<style>
    .editperusahaan{
        max-width: 900px;
        margin: 50px auto;
    }
    .kontak-card {
        background-color: #ff69b4;
        color: white;
        border-radius: 20px;
        padding: 30px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    .profile-card {
        background-color: #ff66b2;
        border-radius: 20px;
        padding: 10px 20px;
        display: flex;
        align-items: center;
        width: fit-content;
        margin: 0 auto;
    }
    .profile-card img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 15px;
    }
    .profile-name {
        color: white;
        font-weight: bold;
        font-size: 1.25rem;
    }

    .info-left {
        flex: 1;
        min-width: 250px;
        margin-bottom: 20px;
    }

    .info-left h2 {
        font-size: 28px;
        margin-bottom: 15px;
    }

    .visit-button {
        background: white;
        color: #ff69b4;
        padding: 10px 20px;
        border-radius: 30px;
        font-weight: bold;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        text-decoration: none;
        display: inline-block;
        margin-bottom: 20px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .contact-item span {
        font-size: 20px;
        margin-right: 10px;
        margin-bottom: 15px;
    }

    .map-right {
        flex: 1;
        min-width: 300px;
        padding-left: 20px;
    }

    .map-right iframe {
        width: 100%;
        height: 250px;
        border: 0;
        border-radius: 10px;
    }

    .edit-btn-container {
        text-align: center;
        margin-top: 30px;
    }

    .edit-btn {
        background: #3b82f6;
        color: white;
        padding: 10px 25px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: bold;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    @media (max-width: 768px) {
        .profile-card {
            flex-direction: column;
        }

        .map-right {
            padding-left: 0;
        }
    }
</style>

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
           List Job
        </a>
           
        <a href="/kontak"
          class="{{ request()->is('kontak') ? 'text-primary border-bottom border-primary fw-bold' : 'text-dark' }}">
           kontak
         </a>
    </div>

<div class="container" style="padding: 40px 20px;">
    <div class="kontak-card">
        <div class="info-left">
            <h2>Frozen Company</h2>
            <a href="" target="_blank" class="visit-button">Visit Website</a>

            <div class="contact-item">
                <span>📧</span>
                <p>Frozen@company.co.id</p>
            </div>

            <div class="contact-item">
                <span>📞</span>
                <p>(+62) 881026707888</p>
            </div>

            <div class="contact-item">
                <span>📍</span>
                <p>Ketintang, Indonesia</p>
            </div>
        </div>

        <div class="map-right">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.8076417690766!2d112.71529321409316!3d-7.815542494378814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb76e0c7915d%3A0xf10715b63e2845fa!2sUniversitas%20Negeri%20Surabaya%20-%20Kampus%201!5e0!3m2!1sen!2sid!4v1610000000000!5m2!1sen!2sid" allowfullscreen loading="lazy"></iframe>
        </div>
    </div>

    <div class="edit-btn-container">
        <a href="" class="edit-btn">Edit Profile</a>
    </div>
</div>
</div>
@endsection
