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
            <p class="company-name">{{$data->perusahaan->nama}}</p>
            <ul class="d-flex flex-column gap-2">
                <li><i class="bi bi-briefcase me-2"></i>{{$data->tipe_pekerjaan}}</li>
                <li><i class="bi bi-geo-alt me-2"></i>{{$data->lokasi}}</li>
                <li> @foreach($data->kategori_lowongan as $lowongan)
                    <span class="badge-category badge bg-light text-dark border rounded-pill">{{$lowongan}}</span>
                    @endforeach
                </li>
                <li><i class="bi bi-currency-dollar me-2">Rp.{{number_format ($data->gaji_minimum)}}- Rp.{{number_format ($data->gaji_maximum)}}</i></li>
            </ul>
            <div class="job-section">
                <h2 class="section-title">Deskripsi Lowongan</h2>
                <p>
                    {{$data->deskripsi_lowongan}}
                </p>
            </div>

            <div class="job-section">
                <h2 class="section-title">Requirements</h2>
                {{$data->kualifikasi}}
            </div>
        </div>
        <div class="job-detail-aside">
            <div class="company-logo-wrapper">
                <img src="{{asset('storage/foto_user/'.$data->perusahaan->foto)}}" alt="Logo compny" class="company-logo">
            </div>
            @if(!Auth::check())
            <div class="text-center mt-4">
                <a href="/login" class="btn btn-primary px-4">
                    login/register untuk melamar
                </a>
            </div>
            @endif
            @if(Auth::check())
            @if(Auth::user()->role === 'pelamar' && $chek===null)
            <div class="text-center mt-4">
                <button class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#lamarModal">
                    Lamar Pekerjaan Ini
                </button>
            </div>
            @endif
            @endif
            @if(Auth::check())
            @if(Auth::user()->role === 'pelamar' && $chek!=null)
            <div class="text-center mt-4">
                <h4>Anda Sudah Melamar Pekerjaan ini</h4>
            </div>
            @endif
            @endif
        </div>
    </div>


    @if(Auth::check())
    @if(Auth::user()->role==="perusahaan")
    <div class="applicant-list-section">
        <h2 class="list-title">Applicant List</h2>
        @foreach ($data_pelamar as $pelamar)
        <div class="applicant-card">
            <div class="applicant-profile">
                <img src="{{ asset('storage/foto_user/' . $pelamar->pelamar->foto) }}" alt="Foto Pelamar" class="applicant-avatar">

                <div class="applicant-info">
                    <h3 class="applicant-name">{{$pelamar->pelamar->nama}}</h3>
                    <p class="applicant-bio">
                        {{$pelamar->pelamar_deskripsi}}
                    </p>
                </div>
            </div>
            <div class="applicant-actions">
                <a href="{{ asset('storage/file_cv/' . $pelamar->file_cv) }}" download class="btn btn-outline">
                    <i class="fas fa-file-alt"></i> Download CV
                </a>

                @if($pelamar->status_lamaran==="pending")
                <button class="btn btn-success btn-status" data-id="{{ $pelamar->id }}" data-status="diterima">
                    <i class="fas fa-check"></i> Terima
                </button>
                <button class="btn btn-danger btn-status" data-id="{{ $pelamar->id }}" data-status="ditolak">
                    <i class="fas fa-times"></i> Tolak
                </button>
                @endif
                @if($pelamar->status_lamaran==="diterima")
                <button class="btn btn-success">
                    <i class="fas fa-check"></i> Diterima
                </button>
                @endif
                @if($pelamar->status_lamaran==="ditolak")
                <button class="btn btn-danger">
                    <i class="fas fa-check"></i>Ditolak
                </button>
                @endif

            </div>
        </div>
        @endforeach
        @endif
        @endif

    </div>
    <div class="modal fade" id="lamarModal" tabindex="-1" aria-labelledby="lamarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('lamar.lowongan')}}" method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                <input type="hidden" value="{{$data->perusahaan->id}}" name="perusahaan_id">
                <input type="hidden" value="{{$data->id}}" name="lowongan_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="lamarModalLabel">Lamar Pekerjaan: {{ $data->judul_lowongan }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Pilih CV</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cv_option" id="use_existing_cv" value="existing" checked>
                            <label class="form-check-label" for="use_existing_cv">
                                Gunakan CV yang sudah ada
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cv_option" id="upload_new_cv" value="upload">
                            <label class="form-check-label" for="upload_new_cv">
                                Upload CV Baru
                            </label>
                        </div>
                    </div>

                    <div class="mb-3" id="upload_cv_field" style="display: none;">
                        <label for="new_cv" class="form-label">Upload CV Baru (PDF)</label>
                        <input type="file" class="form-control" name="file_cv" id="file_cv">
                    </div>
                    <div class="mb-3">
                        <label for="resume" class="form-label">Resume</label>
                        <textarea class="form-control" name="pelamar_deskripsi" id="resume" rows="4" placeholder="Tulis resume sigkat lamaran Anda..."></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Kirim Lamaran</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
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

        li {
            list-style: none;
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadRadio = document.getElementById('upload_new_cv');
            const existingRadio = document.getElementById('use_existing_cv');
            const uploadField = document.getElementById('upload_cv_field');

            function toggleCVUpload() {
                uploadField.style.display = uploadRadio.checked ? 'block' : 'none';
            }

            uploadRadio.addEventListener('change', toggleCVUpload);
            existingRadio.addEventListener('change', toggleCVUpload);
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.btn-status').click(function() {
            let lamaranId = $(this).data('id');
            let status = $(this).data('status');

            $.ajax({
                url: '/lamaran/update-status/' + lamaranId,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                success: function(response) {
                    alert('Status berhasil diperbarui ke: ' + status);
                    location.reload();
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan.');
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
    @endsection