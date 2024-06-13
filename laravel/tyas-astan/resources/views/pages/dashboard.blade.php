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
                                    <p class="ps-3 mt-3">Aplikasi ini merupakan salah satu syarat
                                        Kelulusan Universitas Gunadarma Jurusan
                                        Informatika, Pada Website ini menyediakan 2 Prediksi Pemodelan Pertama
                                        Menggunakan
                                        LSTM Dan kedua Menggunakan Regresi, dengan mengupload File CSV, Menginput tanggal
                                        dan jumlah prediksi yang di inginkan atau dengan
                                        memilih metode apa yang akan digunakan untuk memprediksi harga saham
                                        meningkat dan menurun. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
