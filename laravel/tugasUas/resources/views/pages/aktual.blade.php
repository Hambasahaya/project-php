@extends('pages.layout.template')

@section('content')
    <main id="main" class="main" style="background-color:#f75c41">

        <div class="pagetitle">
            <h1 class="text-white">DAFTAR NILAI AKTUAL DAN PREDIKSI</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white">Nilai Aktual</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-8">
                    <div class="card info-card sales-card" style="background-color:#FFA500">
                        <div class="card-body">
                            <a href="" class="mx-2 mt-4 mb-3 btn btn-primary px-5"
                                style="border-radius: 25px; border: 0; background-color: #FF6347; box-shadow: none; transition: background-color 0.3s;"
                                onmouseover="this.style.backgroundColor='#f75c41'; this.style.boxShadow='0px 0px 1.5px gray';"
                                onmouseout="this.style.backgroundColor='#FF6347'; this.style.boxShadow='none';">Refresh</a>
                            <table class="table table-responsive table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Aktual</th>
                                        <th scope="col">Prediksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card info-card sales-card" style="background-color:#FFA500">
                        <div class="card-body">
                            <h3 class="fw-bold text-center card-title mt-1">MENCARI NILAI AKTUAL TAHUNAN</h3>
                            <div class="align-items-center">
                                <div class="mt-3 px-3">
                                    <h5 class="fw-bold text-center">Tahun</h5>
                                    <style>
                                        select {
                                            width: 100%;
                                            padding: 5px;
                                            border-radius: 1px;
                                            border: 0.5px solid gray;
                                            background-color: #f2f2f2;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
