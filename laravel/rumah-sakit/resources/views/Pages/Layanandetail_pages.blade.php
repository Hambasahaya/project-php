@extends("layout.Normal_layout")
@section("content")
<div class="spesialisasi_pages d-flex flex-column align-items-center">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col align-items-center p-4 img-layanan">
                <div class="card" style="width: 30rem;">
                    <img src="{{$img['img']}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text text-center">{{$img['judul']}} </p>
                    </div>
                </div>
            </div>
            <div class="col d-flex flex-column">
                <div class="d-flex w-30 p-2 gap-2 align-content-center">
                    <img src="/asset/img/vector1.svg" alt="" width="50px">
                    <h4>{{ $content['slug'][0] }}</h4>
                </div>
                <div class="d-flex">
                    <p>
                        {{ $content['kontent_slug'][0] }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="content_spesialis d-flex flex-column">
        <div class="d-flex align-items-center align-content-center justify-content-center">
            <img src="/asset/img/icon2.svg" alt="" srcset="" width="50px">
            <h4>{{ $content['headline'][0] }}</h4>
        </div>
        <div class="d-flex p-2 align-items-center align-content-center justify-content-center rounded-pill " style="background-color: rgba(64, 162, 227,20%);">
            <h4>
                {{ $content['kontent_headline'][0] }}
            </h4>
        </div>
        <div class="d-flex flex-column align-content-center justify-content-center p-4 rounded-4" style="background-color: rgba(64, 162, 227,30%)">
            <h4>{{ $content['konten1_headline'][0] }}</h4>
            <p>{{ $content['kontent_1'][0] }}</p>
        </div>
        <div class="d-flex flex-column align-content-center justify-content-center p-4 rounded-4" style="background-color: rgba(64, 162, 227,20%);">
            <h4>{{ $content['kontent2_headline'][0] }}</h4>
            <p>{{ $content['kontent_2'][0] }}</p>
        </div>
        <div class="d-flex flex-column align-content-center justify-content-center p-4 rounded-4" style="background-color: rgba(64, 162, 227,30%)">
            <h4>{{ $content['kontent3_headline'][0] }}</h4>
            <p>{{ $content['kontent_3'][0] }}</p>
        </div>
        <div class="d-flex flex-column align-content-center justify-content-center p-4 rounded-4" style="background-color: rgba(64, 162, 227,20%)">
            <h4>{{ $content['kontent4_headline'][0] }}</h4>
            <p>{{ $content['kontent_4'][0] }}</p>
        </div>
    </div>
</div>
@endsection