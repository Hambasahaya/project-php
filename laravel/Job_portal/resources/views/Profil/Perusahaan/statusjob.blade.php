@extends('layouts.app')

@section('styles')
{{-- Sebaiknya letakkan CSS di file terpisah untuk kerapian kode --}}
<link rel="stylesheet" href="{{ asset('css/job-status.css') }}">
{{-- Link untuk ikon (jika diperlukan, misalnya untuk Font Awesome) --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
<div class="job-status-page">

    <div class="job-detail-card">
        <div class="job-detail-content">
            <h1 class="job-title">{{$data->judul_lowongan}}</h1>
            <p class="company-name">{{Auth::user()->nama}}</p>

            <div class="job-section">
                <h2 class="section-title">About Company</h2>
                <p>

                </p>
            </div>

            <div class="job-section">
                <h2 class="section-title">Requirements</h2>
                <ul>
                    <li>Technical understanding of how to perform software testing.</li>
                    <li>Ability to perform concrete problem solving in software.</li>
                    <li>Ability to identify bugs, errors/defects, and provide input on specific improvements needed.
                    </li>
                    <li>Ability to document software testing results based on findings during the testing process.</li>
                </ul>
            </div>
        </div>
        <div class="job-detail-aside">
            <div class="company-logo-wrapper">
                <img src="https://via.placeholder.com/100" alt="Logo Sevanam Teknologi Solusindo" class="company-logo">
            </div>
            <img src="https://via.placeholder.com/300x200/E9F5FF/3498DB?text=Job+Illustration"
                alt="Ilustrasi Pekerjaan UI/UX Designer" class="job-image">
        </div>
    </div>

    <div class="applicant-list-section">
        <h2 class="list-title">Applicant List</h2>

        {{-- Contoh Looping Data Pelamar (sesuaikan dengan logic Anda) --}}
        {{-- @foreach ($pelamars as $pelamar) --}}
        <div class="applicant-card">
            <div class="applicant-profile">
                <img src="{{ $foto ?? 'https://via.placeholder.com/80' }}" alt="Foto Pelamar" class="applicant-avatar">
                <div class="applicant-info">
                    <h3 class="applicant-name">Nama Pelamar - UI/UX Designer</h3>
                    <p class="applicant-bio">
                        Ini adalah bio singkat dari pelamar yang menjelaskan pengalaman atau keahlian utamanya.
                    </p>
                </div>
            </div>
            <div class="applicant-actions">
                <a href="{{ $cv_link ?? '#' }}" class="btn btn-outline" target="_blank">
                    <i class="fas fa-file-alt"></i> Lihat CV
                </a>
                <button class="btn btn-success">
                    <i class="fas fa-check"></i> Terima
                </button>
                <button class="btn btn-danger">
                    <i class="fas fa-times"></i> Tolak
                </button>
            </div>
        </div>
        {{-- @endforeach --}}

        {{-- Card contoh ke-2 untuk perbandingan --}}
        <div class="applicant-card">
            <div class="applicant-profile">
                <img src="https://via.placeholder.com/80" alt="Foto Pelamar" class="applicant-avatar">
                <div class="applicant-info">
                    <h3 class="applicant-name">Jane Doe - Frontend Developer</h3>
                    <p class="applicant-bio">
                        Passionate frontend developer with 3 years of experience in React and Vue.js.
                    </p>
                </div>
            </div>
            <div class="applicant-actions">
                <a href="#" class="btn btn-outline" target="_blank">
                    <i class="fas fa-file-alt"></i> Lihat CV
                </a>
                <button class="btn btn-success">
                    <i class="fas fa-check"></i> Terima
                </button>
                <button class="btn btn-danger">
                    <i class="fas fa-times"></i> Tolak
                </button>
            </div>
        </div>
    </div>

</div>

<style>
    /* Import Font */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    /* Variabel Global */
    :root {
        --primary-color: #007bff;
        --secondary-color: #6c757d;
        --success-color: #28a745;
        --danger-color: #dc3545;
        --light-color: #f8f9fa;
        --dark-color: #343a40;
        --white-color: #fff;
        --border-color: #dee2e6;
        --card-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
        --font-family: 'Inter', sans-serif;
    }

    body {
        background-color: var(--light-color);
        font-family: var(--font-family);
    }

    .job-status-page {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    /* Kartu Detail Pekerjaan */
    .job-detail-card {
        display: flex;
        gap: 40px;
        background: var(--white-color);
        padding: 40px;
        border-radius: 16px;
        box-shadow: var(--card-shadow);
        margin-bottom: 50px;
    }

    .job-detail-content {
        flex: 3;
    }

    .job-title {
        font-size: 2.25rem;
        /* 36px */
        font-weight: 700;
        color: var(--dark-color);
        margin: 0;
    }

    .company-name {
        font-size: 1.1rem;
        color: var(--secondary-color);
        margin: 5px 0 30px 0;
    }

    .job-section {
        margin-bottom: 30px;
    }

    .section-title {
        font-size: 1.25rem;
        /* 20px */
        font-weight: 600;
        color: var(--dark-color);
        border-bottom: 2px solid var(--border-color);
        padding-bottom: 8px;
        margin-bottom: 15px;
    }

    .job-section p,
    .job-section ul {
        font-size: 1rem;
        line-height: 1.7;
        color: #555;
    }

    .job-section ul {
        padding-left: 20px;
        margin: 0;
    }

    .job-section li {
        margin-bottom: 10px;
    }

    .job-detail-aside {
        flex: 1.5;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .company-logo-wrapper {
        margin-bottom: 20px;
    }

    .company-logo {
        width: 80px;
        height: 80px;
        object-fit: contain;
    }

    .job-image {
        width: 100%;
        max-width: 300px;
        border-radius: 12px;
        object-fit: cover;
    }

    /* Daftar Pelamar */
    .applicant-list-section .list-title {
        font-size: 1.75rem;
        /* 28px */
        font-weight: 600;
        margin-bottom: 25px;
        color: var(--dark-color);
    }

    .applicant-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: var(--white-color);
        padding: 20px 25px;
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        margin-bottom: 20px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .applicant-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .applicant-profile {
        display: flex;
        align-items: center;
        gap: 20px;
        flex: 1;
    }

    .applicant-avatar {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--border-color);
    }

    .applicant-info {
        flex: 1;
    }

    .applicant-name {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--dark-color);
        margin: 0 0 8px 0;
    }

    .applicant-bio {
        font-size: 0.9rem;
        color: var(--secondary-color);
        margin: 0;
        line-height: 1.5;
    }

    /* Tombol Aksi */
    .applicant-actions {
        display: flex;
        gap: 12px;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-outline {
        background: transparent;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
    }

    .btn-outline:hover {
        background: var(--primary-color);
        color: var(--white-color);
    }

    .btn-success {
        background-color: #e9f7ec;
        color: var(--success-color);
    }

    .btn-success:hover {
        background-color: var(--success-color);
        color: var(--white-color);
    }

    .btn-danger {
        background-color: #fceeed;
        color: var(--danger-color);
    }

    .btn-danger:hover {
        background-color: var(--danger-color);
        color: var(--white-color);
    }


    /* Responsive Design */
    @media (max-width: 992px) {
        .job-detail-card {
            flex-direction: column-reverse;
            padding: 30px;
        }

        .job-detail-aside {
            align-items: flex-start;
            flex-direction: row;
            gap: 20px;
        }
    }

    @media (max-width: 768px) {
        .applicant-card {
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
        }

        .applicant-actions {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }

        .btn {
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .job-title {
            font-size: 1.8rem;
        }

        .job-detail-aside {
            flex-direction: column;
            align-items: center;
        }

        .applicant-profile {
            flex-direction: column;
            text-align: center;
        }

        .applicant-actions {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection