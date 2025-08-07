<style>
    .hover-shadow:hover {
        transform: translateY(-3px);
        transition: 0.3s ease-in-out;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15) !important;
    }
</style>

<div class="col-12 px-3 py-4">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg rounded-4 p-4 text-white bg-gradient"
                style="background: linear-gradient(135deg, #00c853, #43a047);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold mb-1"><i class="bi bi-box-arrow-in-right me-2"></i>Absen Masuk</h5>
                        <p class="mb-0">
                            @if(isset($masuk) && $masuk != null)
                            {{ \Carbon\Carbon::parse($masuk->tanggal)->setTimeFromTimeString($masuk->jam_masuk)->diffForHumans() }}
                            @else
                            --.--
                            @endif
                        </p>
                    </div>
                    @if($masuk == null)
                    <button class="btn btn-light btn-sm rounded-circle" data-bs-toggle="modal" data-btn="masuk" data-bs-target="#cameraModal">
                        <i class="bi bi-camera-fill text-success fs-4"></i>
                    </button>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-lg rounded-4 p-4 text-white bg-gradient"
                style="background: linear-gradient(135deg, #d32f2f, #ef5350);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold mb-1"><i class="bi bi-box-arrow-right me-2"></i>Absen Pulang</h5>
                        <p class="mb-0">
                            @if(isset($pulang) && $pulang != null)
                            {{ \Carbon\Carbon::parse($pulang->tanggal)->setTimeFromTimeString($masuk->jam_pulang)->diffForHumans() }}
                            @else
                            --.--
                            @endif
                        </p>
                    </div>
                    @if($pulang == null)
                    <button class="btn btn-light btn-sm rounded-circle" data-bs-toggle="modal" data-btn="pulang" data-bs-target="#cameraModal">
                        <i class="bi bi-camera-fill text-danger fs-4"></i>
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Rekap Bulan -->
    <div class="mt-5">
        <h5 class="fw-bold mb-3">Rekap Bulan <span class="text-primary">{{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</span></h5>
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm p-4 rounded-4 h-100 hover-shadow bg-light">
                    <i class="bi bi-person-check-fill text-success fs-2 mb-2"></i>
                    <div class="fw-semibold">Hadir</div>
                    <div class="badge rounded-pill bg-success text-white fs-6 mt-2">{{ $hadir }} hari</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm p-4 rounded-4 h-100 hover-shadow bg-light">
                    <i class="bi bi-person-dash-fill text-warning fs-2 mb-2"></i>
                    <div class="fw-semibold">Izin</div>
                    <div class="badge rounded-pill bg-warning text-dark fs-6 mt-2">{{ $izin }} hari</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm p-4 rounded-4 h-100 hover-shadow bg-light">
                    <i class="bi bi-emoji-frown-fill text-danger fs-2 mb-2"></i>
                    <div class="fw-semibold">Sakit</div>
                    <div class="badge rounded-pill bg-danger text-white fs-6 mt-2">{{ $sakit }} hari</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-sm p-4 rounded-4 h-100 hover-shadow bg-light">
                    <i class="bi bi-clock-fill text-secondary fs-2 mb-2"></i>
                    <div class="fw-semibold">Terlambat</div>
                    <div class="badge rounded-pill bg-secondary text-white fs-6 mt-2">{{ $terlambat }} hari</div>
                </div>
            </div>
        </div>

        <form action="{{ route('rekap.export') }}" method="GET" class="mt-4 d-flex flex-wrap gap-2 align-items-center">
            <select name="range" class="form-select w-auto" required>
                <option value="minggu">1 Minggu Terakhir</option>
                <option value="bulan">1 Bulan Terakhir</option>
                <option value="tahun">1 Tahun Terakhir</option>
            </select>

            @if(Auth::user()->level === "HR")
            <select name="user_id" class="form-select w-auto">
                <option value="">Semua Pegawai</option>
                <option value="{{ Auth::user()->id }}">Anda Sendiri</option>
            </select>
            @endif

            @if(Auth::user()->level === "Staff")
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            @endif

            <button class="btn btn-outline-success" type="submit">
                <i class="bi bi-download me-1"></i> Rekap Absen
            </button>
        </form>
    </div>
</div>