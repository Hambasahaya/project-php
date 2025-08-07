@extends('layouts.app')

@section('title', 'Detail Lowongan - ' . $lowongan->judul_lowongan)

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">{{ $lowongan->judul_lowongan }}</h4>
            @if(auth()->check() && auth()->user()->id == $lowongan->user_id)
            <span class="badge bg-success">Perusahaan</span>
            @endif
        </div>
        <div class="card-body">
            <p><strong>Perusahaan:</strong> {{ $lowongan->perusahaan->nama ?? 'Tidak tersedia' }}</p>
            <p><strong>Status:</strong>
                <span class="badge bg-{{ $lowongan->status_lowongan === 'aktif' ? 'success' : 'danger' }}">
                    {{ ucfirst($lowongan->status_lowongan) }}
                </span>
            </p>
            <p><strong>Deskripsi:</strong></p>
            <p>{!! nl2br(e($lowongan->deskripsi_lowongan)) !!}</p>
        </div>

        <div class="card-footer d-flex justify-content-between">
            @if ($lowongan->status_lowongan === 'aktif' && auth()->check() && auth()->user()->id != $lowongan->user_id)
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#applyModal">
                Lamar Pekerjaan Ini
            </button>
            @elseif(auth()->check() && auth()->user()->id == $lowongan->user_id)
            <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#pelamarList"
                aria-expanded="false" aria-controls="pelamarList">
                Lihat Pelamar
            </button>
            @else
            <button class="btn btn-secondary" disabled>Lowongan Tutup</button>
            @endif
        </div>

        @if(auth()->check() && auth()->user()->id == $lowongan->user_id)
        <div class="collapse p-3 border-top" id="pelamarList">
            @if(count($pelamar) > 0)
            <ul class="list-group list-group-flush">
                @foreach($pelamar as $lamaran)
                <li class="list-group-item">
                    <a href="#pelamar-{{ $lamaran->pelamar_id }}" class="text-decoration-none" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="pelamar-{{ $lamaran->pelamar_id }}">
                        <strong>{{ $lamaran->pelamar->nama }}</strong> - {{ $lamaran->pelamar->email }}
                        <span class="badge bg-primary float-end">{{ ucfirst($lamaran->status_lamaran) }}</span>
                    </a>
                    <div class="collapse mt-2" id="pelamar-{{ $lamaran->pelamar_id }}">
                        <div class="card card-body bg-light">
                            <p><strong>Pengalaman Kerja:</strong></p>
                            <ul>
                                @forelse($lamaran->pelamar->pengalamanKerja as $kerja)
                                <li>
                                    <strong>{{ $kerja->nama_perusahaan }} - {{ $kerja->jabatan }}</strong>
                                    <br>
                                    {{ \Carbon\Carbon::parse($kerja->tanggal_masuk)->format('M Y') }}
                                    hingga
                                    {{ $kerja->tanggal_keluar ? \Carbon\Carbon::parse($kerja->tanggal_keluar)->format('M Y') : 'Saat ini' }}
                                    <br>
                                    {{ $kerja->deskripsi_pekerjaan }}
                                </li>
                                @empty
                                <p>Tidak ada pengalaman kerja.</p>
                                @endforelse
                            </ul>

                            <p><strong>Deskripsi Lamaran:</strong></p>
                            <p>{{ $lamaran->pelamar_deskripsi ?? 'Tidak ada deskripsi.' }}</p>

                            <p><strong>CV:</strong></p>
                            <a href="{{ Storage::url($lamaran->file_cv) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-file-earmark-pdf"></i> Download CV
                            </a>

                            <form action="{{ route('perusahaan.lamaran.status', ['id' => $lamaran->id]) }}" method="POST" class="mt-3">
                                @csrf
                                <select name="status" class="form-select form-select-sm w-auto d-inline-block me-2">
                                    <option value="pending" {{ $lamaran->status_lamaran === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="diterima" {{ $lamaran->status_lamaran === 'diterima' ? 'selected' : '' }}>Diterima</option>
                                    <option value="ditolak" {{ $lamaran->status_lamaran === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
            <p class="text-muted">Belum ada pelamar.</p>
            @endif
        </div>
        @endif
    </div>
</div>

<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pelamar.apply.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">
                <input type="hidden" name="perusahaan_id" value="{{ $lowongan->user_id }}">
                <input type="hidden" name="pelamar_id" value="{{ auth()->user()->id ?? '' }}">

                <div class="modal-header">
                    <h5 class="modal-title" id="applyModalLabel">Lamar Pekerjaan: {{ $lowongan->judul_lowongan }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="cv_file" class="form-label">Upload CV (PDF, DOC, DOCX)</label>
                        <input type="file" class="form-control" id="cv_file" name="file_cv" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control" id="deskripsi" name="pelamar_deskripsi" rows="3"
                            placeholder="Tuliskan sedikit tentang diri Anda..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim Lamaran</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection