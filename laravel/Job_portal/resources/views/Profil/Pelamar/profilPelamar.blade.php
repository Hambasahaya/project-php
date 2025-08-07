@extends('layouts.app')

@section('content')
@if(session("success_profile")|| session("success_pengalaman"))
<x-showalert
    type="success"
    title="Well done!"
    footer="{{session('success_profile')?? session('success_pengalaman')}}">
</x-showalert>
@endif

<div class="Profil-pelamar">
    <div class="user-header">
        <img class="avatar" src="{{ asset('storage/foto_user/' . Auth::user()->foto) }}" alt="Profile Picture">
        <span class="user-name">{{ Auth::user()->nama }}</span>
    </div>

    {{-- Navigasi Tab --}}
    <div class="d-flex justify-content-center align-items-center gap-5 border-bottom pb-3 mb-4">
        <button onclick="showSection('profilSection')" id="btn-profil"
            class="tab-link text-primary border-bottom border-primary fw-bold bg-transparent border-0">Profil</button>
        @if(Auth::user()->role === 'pelamar')
        <button onclick="showSection('statusSection')" id="btn-status"
            class="tab-link text-dark bg-transparent border-0">Status Lamaran</button>
        @endif
    </div>

    {{-- Section: Profil --}}
    <div id="profilSection">
        <div class="card-profil">
            <label>Bio</label>
            <p>{{ Auth::user()->detailUser->deskripsi_pribadi ?? 'belum dibuat' }}</p>
            <label>Alamat</label>
            <p>{{ Auth::user()->detailUser->alamat ?? 'belum dibuat' }}</p>
            <label>No Telephone</label>
            <p>{{ Auth::user()->detailUser->noTlp ?? 'belum dibuat' }}</p>
            <label>Tempat,Tanggal Lahir</label>
            <p>{{ Auth::user()->detailUser->tempat_lahir ?? 'belum dibuat' }},{{ Auth::user()->detailUser->tanggal_lahir ?? 'belum dibuat' }}</p>
            <label>Jenis Kelamin</label>
            <p>{{ Auth::user()->detailUser->jenis_kelamin ?? 'belum dibuat' }}</p>
            <label>Tingkat Pendidikan</label>
            <p>{{ Auth::user()->detailUser->tingkat_pendidikan ?? 'belum dibuat' }}</p>
            <label>Nama Instansi</label>
            <p>{{ Auth::user()->detailUser->nama_instansi ?? 'belum dibuat' }}</p>
            <label>Tahun Lulus</label>
            <p>{{ Auth::user()->detailUser->tahun_lulus ?? 'belum dibuat' }}</p>
            <label>Nilai Akhir</label>
            <p>{{ Auth::user()->detailUser->nilai_akhir ?? 'belum dibuat' }}</p>
            <label>CV</label>
            <div class="cv-input">
                <p>{{ Auth::user()->detailUser->file_cv ?? 'CV belum diunggah' }}</p>
                @if(Auth::user()->detailUser && Auth::user()->detailUser->file_cv)
                <a href="{{ asset('storage/cv/' .  Auth::user()->detailUser->file_cv) }}" target="_blank">Lihat CV</a>
                @endif

            </div>
        </div>

        <div class="card-profil">
            <div class="container mt-5">
                <h2 class="mb-4">Pengalaman Kerja</h2>

                @if(!isset($pengalamans) || $pengalamans->isEmpty())
                <div class="alert alert-info">Belum ada pengalaman kerja ditambahkan.</div>
                @else
                <div class="row">
                    @foreach($pengalamans as $exp)
                    <div class="col-md-12 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $exp->jabatan }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $exp->nama_perusahaan }}</h6>
                                <p class="card-text mt-3"><strong>Deskripsi:</strong> {{ $exp->deskripsi_pekerjaan }}</p>
                                <p class="card-text"><strong>Skill:</strong> <span class="badge bg-success">{{ $exp->skil }}</span></p>
                                <p class="card-text"><strong>Jenis Pekerjaan:</strong> <span class="badge bg-secondary">{{ $exp->tipe_pekerjaan }}</span></p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <small class="text-muted">Ditambahkan: {{ $exp->created_at->diffForHumans() }}</small>
                                    <div>
                                        <form action="{{route('pengalaman.delete',$exp->id)}}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus pengalaman ini?')">✕</button>
                                        </form>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editExpModal{{ $exp->id }}">
                                            ✎
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editExpModal{{ $exp->id }}" tabindex="-1" aria-labelledby="editExpModalLabel{{ $exp->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{route('pengalaman.edit', $exp->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editExpModalLabel{{ $exp->id }}">Edit Pengalaman Kerja</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label class="form-label text-black">Nama Perusahaan</label>
                                            <input type="text" name="nama_perusahaan" class="form-control" value="{{ $exp->nama_perusahaan }}" required>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label text-black">Jabatan</label>
                                            <input type="text" name="jabatan" class="form-control" value="{{ $exp->jabatan }}" required>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label text-black">Deskripsi Pekerjaan</label>
                                            <textarea name="deskripsi_pekerjaan" class="form-control" rows="4">{{ $exp->deskripsi_pekerjaan }}</textarea>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label text-black">Skill</label>
                                            <textarea name="skil" class="form-control" rows="2">{{ $exp->skil }}</textarea>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label text-black">Jenis Pekerjaan</label>
                                            <select name="tipe_pekerjaan" class="form-select">
                                                <option value="Freelance" {{ $exp->tipe_pekerjaan == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                                                <option value="Full-Time" {{ $exp->tipe_pekerjaan == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                                                <option value="Intern" {{ $exp->tipe_pekerjaan == 'Intern' ? 'selected' : '' }}>Intern</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>


        @if(Auth::user()->role === 'pelamar')
        <div class="edit-button">
            <button onclick="showSection('editProfilSection')">Edit Profile</button>
        </div>
        @endif
    </div>

    {{-- Section: Status Lamaran --}}
    <div id="statusSection" style="display: none;">
        <h5 class="mb-3">Status Lamaran</h5>
        @foreach($lamaran as $datalamaran)
        <div class="job-card">
            <div class="job-info">
                <img src="{{ asset('storage/foto_user/'.$datalamaran->perusahaan->foto) }}" alt="Company Logo">
                <div class="job-text">
                    <small>{{$datalamaran->perusahaan->nama}}</small>
                    <strong>{{$datalamaran->lowongan->judul_lowongan}}</strong>
                    <small>{{$datalamaran->lowongan->deskripsi_lowongan}}</small>
                </div>
            </div>
            <a href="{{route('statusjobs',$datalamaran->lowongan_id)}}" class="lihat-btn">{{$datalamaran->status_lamaran}}</a>
        </div>
        @endforeach
    </div>

    {{-- Section: Edit Profil --}}
    <div id="editProfilSection" style="display: none;">
        <div class="Edit-Profil">
            <div class="card-edit-profil">
                <div class="profile-edit-name">
                    <div class="left">
                        <img id="preview-foto" src="{{ asset('storage/foto_user/' . Auth::user()->foto) }}" alt="User">
                        <span>{{ Auth::user()->nama }}</span>
                    </div>
                    <button type="button" id="triggerUpload" class="change-photo-btn">Change Photo</button>
                </div>
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="foto" name="foto" accept="image/*" style="display: none;">
                    <label for="nama">Name</label>
                    <input type="text" name="nama" value="{{ Auth::user()->nama }}" required>

                    <label for="alamat">Alamat Lengkap</label>
                    <input type="text" name="alamat" value="{{ Auth::user()->detailUser->alamat ?? '' }}">
                    <label for="alamat">No Tlp</label>
                    <input type="text" name="noTlp" value="{{ Auth::user()->detailUser->noTlp ?? '' }}">
                    <label for="alamat">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ Auth::user()->detailUser->tanggal_lahir ?? '' }}">
                    <label for="alamat">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ Auth::user()->detailUser->tempat_lahir ?? '' }}">
                    <div class="mb-3 d-flex w-100 gap-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioDefault1" value="Laki-laki">
                            <label class="form-check-label" for="radioDefault1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioDefault2" checked value="Perempuan">
                            <label class="form-check-label" for="radioDefault2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <select class="form-select form-select-sm" aria-label="Small select example" name="tingkat_pendidikan">
                            <option selected>Pilih Tingat Pendidikan Terakhir</option>
                            <option value="SMP">SMP</option>
                            <option value="SMK/SMA">SMK/SMA</option>
                            <option value="SARJANA(S1)">SARJANA(S1)</option>
                        </select>
                    </div>
                    <label for="alamat">Nama Instansi</label>
                    <input type="text" name="nama_instansi" value="{{ Auth::user()->detailUser->nama_instansi ?? '' }}">
                    <label for="alamat">Tahun Lulus</label>
                    <input type="date" name="tahun_lulus" value="{{ Auth::user()->detailUser->tahun_lulus ?? '' }}">

                    <label for="alamat">Nilai Akhir</label>
                    <input type="number" name="nilai_akhir" value="{{ Auth::user()->detailUser->nilai_akhir ?? '' }}">

                    <label for="deskripsi_pribadi">Bio</label>
                    <textarea name="deskripsi_pribadi" rows="3">{{ Auth::user()->detailUser->deskripsi_pribadi ?? '' }}</textarea>

                    <label for="file_cv">Upload CV</label>
                    <input type="file" name="file_cv">

                    <div class="edit-button">
                        <button type="submit" class="btn-blue mt-2 text-center">Save Profile</button>
                    </div>
                </form>
            </div>

            <div class="card-skil">
                <div class="card">
                    <div class="card-header">Tambah Pengalaman Kerja</div>
                    <div class="card-body">
                        <form action="{{ route('pengalaman.add') }}" method="POST">
                            @csrf
                            <div id="job-list">
                                <div class="job-item mb-4 p-3 border rounded position-relative">
                                    <button type="button" class="btn btn-danger btn-sm remove-job float-end" style="display: none;">&times;</button>

                                    <div class="mb-3">
                                        <label class="form-label">Nama Perusahaan</label>
                                        <input type="text" name="jobs[0][nama_perusahaan]" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <input type="text" name="jobs[0][jabatan]" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi Pekerjaan</label>
                                        <input type="text" name="jobs[0][deskripsi_pekerjaan]" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Masuk</label>
                                        <input type="date" name="jobs[0][tahun_masuk]" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Keluar</label>
                                        <input type="date" name="jobs[0][tahun_keluar]" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Skill</label>
                                        <textarea name="jobs[0][skil]" rows="2" class="form-control" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tipe Pekerjaan</label><br>
                                        @foreach(['Freelance', 'Full-Time', 'Intern'] as $type)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jobs[0][tipe_pekerjaan]" value="{{ $type }}" {{ $type === 'Freelance' ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $type }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <button type="button" id="add-job" class="btn btn-secondary mb-3">+ Tambah Pekerjaan</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script --}}
<script>
    function showSection(sectionId) {
        document.getElementById('triggerUpload').addEventListener('click', function() {
            document.getElementById('foto').click();
        });

        document.getElementById('foto').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById('preview-foto').src = URL.createObjectURL(file);
            }
        });
        ['profilSection', 'statusSection', 'editProfilSection'].forEach(id => {
            document.getElementById(id).style.display = 'none';
        });

        ['btn-profil', 'btn-status'].forEach(id => {
            let el = document.getElementById(id);
            if (el) el.classList.remove('text-primary', 'border-primary', 'fw-bold');
            if (el) el.classList.add('text-dark');
        });

        document.getElementById(sectionId).style.display = 'block';
        if (sectionId === 'profilSection') {
            let btn = document.getElementById('btn-profil');
            if (btn) btn.classList.add('text-primary', 'border-bottom', 'border-primary', 'fw-bold');
        } else if (sectionId === 'statusSection') {
            let btn = document.getElementById('btn-status');
            if (btn) btn.classList.add('text-primary', 'border-bottom', 'border-primary', 'fw-bold');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        let jobCount = 1;
        document.getElementById('add-job')?.addEventListener('click', function() {
            const jobList = document.getElementById('job-list');
            const template = document.querySelector('.job-item');
            const clone = template.cloneNode(true);
            clone.querySelectorAll('input, textarea').forEach(input => {
                const name = input.getAttribute('name');
                const newName = name.replace(/\[\d+\]/, `[${jobCount}]`);
                input.setAttribute('name', newName);
                input.value = '';
            });
            jobList.appendChild(clone);
            jobCount++;

            clone.querySelector('.remove-job').style.display = 'inline-block';
            clone.querySelector('.remove-job').addEventListener('click', function() {
                clone.remove();
            });
        });
    });
</script>
@endsection