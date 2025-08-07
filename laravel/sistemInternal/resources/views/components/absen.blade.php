<div class="container text-center p-3">
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center align-content-center">
            <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded p-2 mt-2" style="width: 22rem;">
                <div class="container p-3">
                    <img src="../img/absenIn.png" class="card-img-top w-50 rounded bg-white" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Absen Masuk </h5>
                    @if($statusAbsen['status_absen'] === false || $statusAbsen['status_absen'] === 'pulang')
                    <p class="card-text">Anda Belum Melakukan Absen Masuk hari ini, Silahkan Melakukan Absen Masuk</p>
                    <button type="button" class="btn btn-gradient-primary btn-fw" data-bs-toggle="modal" data-bs-target="#exampleModal">Absen Masuk Sekarang!</button>
                    @else
                    <p class="card-text text-success">Anda Sudah Melakukan Absen Masuk</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form id="absenForm" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Absen Masuk</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center">
                    <!-- Hidden file input -->
                    <input type="file" id="foto_absen" name="foto_absen" accept="image/*" capture="environment" class="d-none" required>

                    <!-- Klik untuk ambil foto -->
                    <label for="foto_absen" style="cursor: pointer;">
                        <div class="d-flex justify-content-center align-items-center border rounded-circle bg-light position-relative overflow-hidden" style="width: 150px; height: 150px; margin: auto;">
                            <i id="cameraIcon" class="bi bi-camera-fill position-absolute top-50 start-50 translate-middle" style="font-size: 3rem; color: #6c757d;"></i>
                            <img id="preview" class="position-absolute top-0 start-0 w-100 h-100 d-none" style="object-fit: cover; border-radius: 50%;" />
                        </div>
                        <p class="mt-2 text-muted">Klik untuk ambil foto</p>
                    </label>

                    <!-- Lokasi tersembunyi -->
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Kirim Absen</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(
                (pos) => {
                    document.getElementById("latitude").value = pos.coords.latitude;
                    document.getElementById("longitude").value = pos.coords.longitude;
                },
                (err) => console.error("Gagal ambil lokasi:", err.message)
            );
        }
        const input = document.getElementById("foto_absen");
        const preview = document.getElementById("preview");

        input.addEventListener("change", function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                    cameraIcon.classList.add('d-none');
                };
                reader.readAsDataURL(file);
            }
        });

        function validateForm() {
            const fileInput = document.getElementById("foto_absen");
            if (!fileInput.files || fileInput.files.length === 0) {
                alert("Silakan ambil foto terlebih dahulu sebelum mengirim absen.");
                return false;
            }

            return true;
        }
    });
</script>