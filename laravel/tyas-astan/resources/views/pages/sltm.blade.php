@extends('pages.layout.template')

@section('content')
    <main id="main" class="main" style="background-color:#f75c41">

        <div class="pagetitle">
            <h1 class="text-white">PREDIKSI HARGA SAHAM TERTINGGI SLTM</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white">Prediksi Harga SLTM</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-18">
                    <div class="card info-card sales-card" style="background-color:#FFA500">
                        <div class="card-body">
                            <h4 class="text-center mt-2">PREDIKSI HARGA SAHAM 3 HARI KEDEPAN</h4>
                            <a href="" class="mx-2 mt-4 mb-3 btn btn-primary px-5"
                                style="border-radius: 25px; border: 0; background-color: #FF6347; box-shadow: none; transition: background-color 0.3s;"
                                onmouseover="this.style.backgroundColor='#f75c41'; this.style.boxShadow='0px 0px 1.5px gray';"
                                onmouseout="this.style.backgroundColor='#FF6347'; this.style.boxShadow='none';">Refresh</a>
                            <table class="table table-responsive table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Open</th>
                                        <th scope="col">High</th>
                                        <th scope="col">Low</th>
                                        <th scope="col">Close</th>
                                        <th scope="col">Adj Close</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($prediksidata3 as $prediksi)
                                    <tr>
                                    <td>{{ $prediksi['0'] }}</td>
                                    @foreach($prediksi['1'] as $harga)
                                        <td>{{ $harga }}</td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            <h4 class="text-center mt-2">PREDIKSI HARGA SAHAM 7 HARI KEDEPAN</h4>
                            <a href="" class="mx-2 mt-4 mb-3 btn btn-primary px-5"
                                style="border-radius: 25px; border: 0; background-color: #FF6347; box-shadow: none; transition: background-color 0.3s;"
                                onmouseover="this.style.backgroundColor='#f75c41'; this.style.boxShadow='0px 0px 1.5px gray';"
                                onmouseout="this.style.backgroundColor='#FF6347'; this.style.boxShadow='none';">Refresh</a>
                            <table class="table table-responsive table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Open</th>
                                        <th scope="col">High</th>
                                        <th scope="col">Low</th>
                                        <th scope="col">Close</th>
                                        <th scope="col">Adj Close</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($prediksi_data_7 as $prediksi)
                                    <tr>
                                    <td>{{ $prediksi['0'] }}</td>
                                    @foreach($prediksi['1'] as $harga)
                                        <td>{{ $harga }}</td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
