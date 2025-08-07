@extends('pages.layout.template')

@section('content')
    <main id="main" class="main" style="background-color:#f75c41">

        <div class="pagetitle">
            <h1 class="text-white">DASHBOARD</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white">Dashboard</li>
                </ol>
            </nav>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card info-card sales-card" style="background-color:#FFA500">
                        <div class="card-body">
                            <h6 class="fw-bold text-center card-title mt-4">SELAMAT DATANG
                                DI
                                APLIKASI
                                PERAMALAN
                                HARGA SAHAM
                                BBNI TBK
                            </h6>
                            <div class="align-items-center">
                                <div class="text-center mt-3">
                                    <h5 class="fw-bold">TENTANG APLIKASI</h5>
                                    <p class="ps-3 mt-3">Aplikasi ini merupakan pusat prediksi harga saham bni </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
