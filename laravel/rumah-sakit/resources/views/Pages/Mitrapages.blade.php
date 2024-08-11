@extends("Layout.Normal_layout")
@section("content")
<div class="mitra d-flex flex-column">
    <div class="container">
        <div class="row">
            <div class="col col-md-8">
                <h4>Fasilitas Layanan Kesehatan</h4>
                <p>Temukan keuntungan Rekam Medis Elektronik terintegrasi dengan HEALTH Bridge!
                    Kami mengundang puskesmas, rumah sakit, dan klinik untuk bergabung dengan HEALTH Bridge,
                    solusi inovatif yang mempermudah pendaftaran pasien. Dengan HEALTH Bridge, Anda dapat:
                </p>
                <ul>
                    <li>Mempercepat Proses Pendaftaran: Kurangi antrean dengan pendaftaran online</li>
                    <li>Mengintegrasikan Rekam Medis Elektronik: Akses cepat dan akurat ke informasi medis pasien.</li>
                    <li>Mengelola Data dengan Efisien: Penyimpanan data yang aman dan terorganisir.</li>
                    <li>Meningkatkan Kepuasan Pasien: Layanan lebih cepat dan efisien.</li>
                </ul>
                <h6>Bergabunglah dengan HEALTH Bridge sekarang dan tingkatkan kualitas layanan kesehatan Anda!
                    HEALTH Bridge – Solusi Cerdas untuk Layanan Kesehatan Modern!
                </h6>
            </div>
            <div class="col col-6 col-md-4  d-flex align-items-center justify-content-center">
                <a href="{{route('mitra_sign')}}" class="btn btn-outline-primary" style="background-color: rgba(64, 162, 227,20%); width:60%; height:6vh;">Gabung Sebagai Mitra!</a>
            </div>
        </div>
        <h4 class="mb-4 mt-4">Daftar Fasilitas Kesehatan</h4>
        <div class="filters d-flex">
            <div class="row  d-flex justify-content-center align-items-center align-content-center p-2  rounded-4" style="width: 30%;background-color: rgba(64, 162, 227,20%);">
                <div class="col">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </div>
            </div>
            <div class="row d-flex p-3 rounded-4" style="width:max-content;background-color: rgba(64, 162, 227,20%);">
                <div class="col-md-auto">
                    <button type=" button" class="btn btn-info">Reset</button>
                </div>
                <div class="col-md-auto">
                    <select class="form-select form-select-sm" aria-label="Small select example" id="provinceSelect">
                        <option selected>Provinsi</option>
                    </select>
                </div>
                <div class="col-md-auto">
                    <select class="form-select form-select-sm" aria-label="Small select example" id="citySelect">
                        <option selected>Kota/kabupaten</option>
                    </select>
                </div>
                <div class="col-md-auto">
                    <select class="form-select form-select-sm" aria-label="Small select example">
                        <option selected>Tipe Fasilitas Kesehatan</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="d-flex mt-4 mitra-list justify-content-center p-4 flex-column align-items-center">
            <div class="row row-cols-2">
                <?php for ($i = 0; $i < 20; $i++) : ?>
                    <div class="col">
                        <div class="card mb-3" style="width: 40vw;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="/asset/img/klk.svg" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Klinik Budhi Pratama</h5>
                                        <p class="card-text"><i class="bi bi-geo-fill" style="font-size: 1rem; color: cornflowerblue"></i> Jl. Raya Tengah No.26, RT 06/RW 01, Gedong, Kecamatan Ps. Rebo, Jakarta Timu</p>
                                        <div class="d-flex gap-4">
                                            <p><i class="bi bi-telephone-outbound-fill" style="font-size: 1rem; color: green"></i>+62 218 778 3668</p>
                                            <p><i class="bi bi-envelope-heart-fill" style="font-size: 1rem; color: pink"></i>@klinikbudhipratama.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>
</div>
@endsection