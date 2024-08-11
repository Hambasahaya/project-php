@extends("Layout.Userpages_layout")
@section("usercontent")

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <section class="section">
        <div class="d-flex mt-4 dokterlist justify-content-center p-4 flex-column align-items-center">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="card mb-3" style="width: 50vh;">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex justify-content-center align-items-center p-2 rounded-start">
                                <img src="" class="img-fluid" alt="..." style="border-radius: 100%;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title">Dr
                                    </h2>
                                    <p class="card-text"><i class="bi bi-geo-fill" style="font-size: 1rem; color: cornflowerblue"></i> h</p>
                                    <div class="d-flex gap-3">
                                        <p><i class="bi bi-telephone-outbound-fill" style="font-size: 1rem; color: green"></i></p>
                                        <p><i class="bi bi-envelope-heart-fill" style="font-size: 1rem; color: pink"></i></p>
                                    </div>
                                    <div class="d-flex gap-3 align-items-baseline">
                                        <p><i class="bi bi bi-toggle-on" style="font-size: 1rem; color: green"></i></p>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <button type="button" class="btn btn-warning edit-btn">lihat detail</button>
                                            <button type="button" class="btn btn-danger delete">unduh</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection