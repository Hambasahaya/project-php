<!-- Modal Kamera -->
<div class="modal fade" id="cameraModal" tabindex="-1" aria-labelledby="cameraModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg">
            <div class="modal-header bg-dark text-white rounded-top-4">
                <h5 class="modal-title"><i class="bi bi-camera-video me-2"></i> Ambil Foto & Lokasi</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center bg-light rounded-bottom-4 px-4 py-3">
                <div id="locationInfo" class="mb-2 small text-muted">📍 Lokasi belum dideteksi</div>
                <canvas id="canvas" class="d-none"></canvas>
                <img id="photoPreview" class="img-fluid mt-3 rounded-3 shadow-sm" style="max-height: 350px;" />
                <video id="video" autoplay class="img-fluid rounded-3 shadow-sm mt-3" style="max-height: 300px;"></video>
                <div class="d-grid gap-2 mt-4">
                    <button class="btn btn-danger px-4 py-2 fw-semibold shadow" onclick="takePhoto()">
                        <i class="bi bi-check-circle me-2"></i>Absen Sekarang!
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Izin / Tambah Pegawai -->
<div class="modal fade" id="izinModal" tabindex="-1" aria-labelledby="izinmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title">
                    <i class="bi bi-person-badge me-2"></i>
                    {{ Auth::user()->level === 'HR' ? 'Tambah Data Pegawai' : 'Form Pengajuan' }}
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ Auth::user()->level === 'HR' ? route('register') : route('addPengajuan') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body bg-light rounded-bottom-4">
                    @if(Auth::user()->level==="Staff")
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Izin</label>
                        <select class="form-select" name="jenis">
                            <option selected disabled>Pilih Jenis</option>
                            <option value="cuti">Cuti</option>
                            <option value="izin">Izin</option>
                            <option value="sakit">Sakit</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_mulai">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tanggal_selesai">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alasan Pengajuan</label>
                        <textarea class="form-control" rows="3" name="alasan" placeholder="Tuliskan alasan..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Bukti Pendukung</label>
                        <input type="file" class="form-control" name="bukti">
                    </div>
                    @endif

                    @if(Auth::user()->level==="HR")
                    <div class="mb-3">
                        <label class="form-label">Nama Staff</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukan nama lengkap...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Staff</label>
                        <input type="email" class="form-control" name="email" placeholder="contoh@email.com">
                        <small class="form-text text-muted">Pastikan email aktif dan valid.</small>
                    </div>
                    @endif
                </div>
                <div class="modal-footer bg-light rounded-bottom-4">
                    <button type="submit" class="btn btn-primary fw-semibold">
                        <i class="bi bi-send-check me-1"></i>{{ Auth::user()->level==="HR" ? 'Tambah Pegawai' : 'Ajukan!' }}
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Status Pengajuan -->
<div class="modal fade" id="statusmodal" tabindex="-1" aria-labelledby="statusmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header bg-info text-white rounded-top-4">
                <h5 class="modal-title"><i class="bi bi-clipboard2-data me-2"></i>Daftar Pengajuan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body bg-light">
                <x-tables-pengajuans />
            </div>
            <div class="modal-footer bg-light rounded-bottom-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>