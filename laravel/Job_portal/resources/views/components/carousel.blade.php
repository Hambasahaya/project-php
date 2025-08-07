<div class="company-carousel">
    {{-- header atau kepala bagian Carousel --}}
    <div class="carousel-header text-center">
        <h2>Temukan perusahaan Anda berikutnya</h2>
        <p>
            Jelajahi profil perusahaan untuk menemukan tempat kerja yang tepat bagi
            Anda. Pelajari tentang pekerjaan, ulasan, budaya perusahaan, keuntungan,
            dan tunjangan.
        </p>
    </div>

    <!-- Carousel Start-->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="d-flex justify-content-center gap-3 px-3">
                    <!-- Kotak 1 -->
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">PT. Surya Lestari</h5>
                            <p class="card-text">Jakarta, Indonesia</p>
                            <a href="{{ url('/perusahaandetail?nama=' . urlencode('PT. Surya Lestari') . '&lokasi=' . urlencode('Jakarta, Indonesia')) }}"
                                class="btn btn-primary">Lihat Profil</a>
                        </div>
                    </div>
                    <!-- Kotak 2 -->
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">CV. Maju Jaya</h5>
                            <p class="card-text">Bandung, Indonesia</p>
                            <a href="{{ url('/perusahaandetail?nama=' . urlencode('CV. Maju Jaya') . '&lokasi=' . urlencode('Bandung, Indonesia')) }}"
                                class="btn btn-primary">Lihat Profil</a>
                        </div>
                    </div>
                    <!-- Kotak 3 -->
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">PT. Teknologi Hebat</h5>
                            <p class="card-text">Surabaya, Indonesia</p>
                            <a href="{{ url('/perusahaandetail?nama=' . urlencode('PT. Teknologi Hebat') . '&lokasi=' . urlencode('Surabaya, Indonesia')) }}"
                                class="btn btn-primary">Lihat Profil</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="d-flex justify-content-center gap-3 px-3">
                    <!-- Kotak 4 -->
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">PT. Andalan Sejahtera</h5>
                            <p class="card-text">Yogyakarta, Indonesia</p>
                            <a href="{{ url('/perusahaandetail?nama=' . urlencode('PT. Andalan Sejahtera') . '&lokasi=' . urlencode('Yogyakarta, Indonesia')) }}"
                                class="btn btn-primary">Lihat Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigasi Panah -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

        <!-- Indicators -->
        <div class="carousel-indicators custom-indicators mt-3">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        </div>
    </div>
</div>
