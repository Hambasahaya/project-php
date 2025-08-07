<style>
    .bg-light-success {
        background-color: #e6f9f0 !important;
    }

    .bg-light-warning {
        background-color: #fff8e1 !important;
    }

    .bg-light-danger {
        background-color: #fdecea !important;
    }
</style>
<div class="mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-semibold mb-0">
            <i class="bi bi-calendar-week me-2 text-primary"></i>Data Absensi: 1 Minggu Terakhir
        </h5>
    </div>

    @forelse($dataabsen_week as $data)
    @php
    $statusBadge = match($data->status) {
    'hadir' => 'success',
    'izin' => 'warning',
    'sakit' => 'danger',
    default => 'secondary'
    };
    $bgCard = match($data->status) {
    'hadir' => 'bg-light-success',
    'izin' => 'bg-light-warning',
    'sakit' => 'bg-light-danger',
    default => 'bg-light'
    };
    @endphp

    <div class="card border-0 shadow-sm mb-3 rounded-4 {{ $bgCard }}">
        <div class="card-body py-3 px-4">
            <div class="row align-items-center text-center text-md-start gy-2">
                <div class="col-md-2">
                    <div class="text-muted small">Tanggal</div>
                    <div class="fw-semibold">{{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('d M Y') }}</div>
                </div>

                <div class="col-md-2">
                    <div class="text-muted small">Jam Masuk</div>
                    <div><i class="bi bi-box-arrow-in-right me-1 text-success"></i>{{ $data->jam_masuk ?? '—' }}</div>
                </div>

                <div class="col-md-2">
                    <div class="text-muted small">Jam Pulang</div>
                    <div><i class="bi bi-box-arrow-left me-1 text-danger"></i>{{ $data->jam_pulang ?? '—' }}</div>
                </div>

                <div class="col-md-2">
                    <div class="text-muted small">Status</div>
                    <span class="badge bg-{{ $statusBadge }} rounded-pill text-capitalize px-3">
                        {{ $data->status }}
                    </span>
                </div>

                <div class="col-md-2">
                    <div class="text-muted small">Terlambat</div>
                    <span class="badge rounded-pill px-3 bg-{{ $data->terlambat ? 'danger' : 'secondary' }}">
                        {{ $data->terlambat ? 'Terlambat' : 'Tepat Waktu' }}
                    </span>
                </div>

                <div class="col-md-2 text-center">
                    <div class="text-muted small">Foto</div>
                    <img src="{{ asset($data->foto_pulang ?: $data->foto_masuk) }}"
                        alt="Foto Absensi"
                        class="rounded shadow-sm"
                        style="width: 60px; height: 60px; object-fit: cover;"
                        title="Klik untuk memperbesar"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top">
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-info rounded-4 shadow-sm">
        <i class="bi bi-info-circle me-2"></i> Tidak ada data absensi dalam 1 minggu terakhir.
    </div>
    @endforelse
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    })
</script>