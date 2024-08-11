@extends("Layout.Normal_layout")

@section("content")
<div class="layanan-page d-flex justify-content-between flex-column">
    <div class="serch-bar d-flex align-item-center justify-content-between">
        <div class="d-flex align-items-center ">
            <img src="/asset/img/puskesmas.svg" alt="" class="">
            <h4>Layanan Keshatan</h4>
        </div>
        <form class="d-flex p-2 ms-auto" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        </form>
    </div>
    <div class="cards-layanan d-flex flex-column">
        <div class="filters d-flex  justify-content-between align-items-center ">
            <button type=" button" class="btn btn-info">Reset</button>
            <select class="form-select form-select-sm" aria-label="Small select example" id="provinceSelect">
                <option selected>Provinsi</option>
            </select>
            <select class="form-select form-select-sm" aria-label="Small select example" id="citySelect">
                <option selected>Kota/kabupaten</option>
            </select>
        </div>
        <div class="card mb-3 justify-content-between">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/asset/img/puskesmasf.svg" class="img-fluid p-2" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body h-100 justify-content-between d-flex flex-column">
                        <h5 class="card-title">Klinik Griya Medika</h5>
                        <p class="card-text">Jl. KS. Tubun No.21 RT 05 RW 06, Petamburan, Tanah Abang, Jakarta Pusat.</p>
                        <div class="category rounded bg-white" style="width: max-content;padding:4px">
                            <h6>Umum 24 jam</h6>
                        </div>
                        <p class="card-text"><small class="text-body-secondary">
                                <?php
                                for ($i = 0; $i < 4; $i++) : ?>
                                    <i class="bi bi-star-fill" style="color: #FFD700;"></i>
                                <?php endfor; ?>
                            </small>4.0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection