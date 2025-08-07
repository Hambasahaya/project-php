@extends('Layouts.Template')
@Section('content')
<div class="layout d-flex flex-column gap-5">
    <div class="">
        @include('components.articleslideshow')
    </div>
    <section id="trending">
        <div class="col-12 Latest">
            <div class="headersection">
                <h5>Trending</h5>
            </div>
            <div class="container">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($dataartikel as $trending)
                        @if($trending->category["Category_name"]==="trending")
                        <div class="swiper-slide">
                            <a href="/artikelpage/{{$trending['id']}}">
                                <div class="card" style="width: 100%;">
                                    <img src="{{ asset('storage/' . $trending['img_artikel']) }}" class=" card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">{{$trending["sub_heading"]}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <section id="sport">
        <div class="col-12 Latest">
            <div class="headersection2 mx-auto d">
                <h5>Sport</h5>
            </div>
            <div class="container">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($dataartikel as $sport)
                        @if($sport->category["Category_name"]==="sport")
                        <div class="swiper-slide">
                            <a href="/artikelpage/{{$sport['id']}}">
                                <div class="card" style="width: 100%;">
                                    <img src="{{ asset('storage/' . $sport['img_artikel']) }}" class=" card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">
                                        <p class="card-text">{{$sport["sub_heading"]}}</p>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <section id="technology">
        <div class="col-12 Latest">
            <div class="headersection2 mx-auto d">
                <h5>Technology</h5>
            </div>
            <div class="container">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($dataartikel as $technology)
                        @if($technology->category["Category_name"]==="technology")
                        <div class="swiper-slide">
                            <a href="/artikelpage/{{$technology['id']}}">
                                <div class="card" style="width: 100%;">
                                    <img src="{{ asset('storage/' . $technology['img_artikel']) }}" class=" card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">{{$technology["sub_heading"]}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
    </section>
    <section id="lifestyle">
        <div class="col-12 Latest">
            <div class="headersection2 mx-auto d">
                <h5>LifeLifestyle</h5>
            </div>
            <div class="container">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($dataartikel as $lifestyle)
                        @if($lifestyle->category["Category_name"]==="lifestyle")
                        <div class="swiper-slide">
                            <a href="/artikelpage/{{$lifestyle['id']}}">
                                <div class="card" style="width: 100%;">
                                    <img src="{{ asset('storage/' . $lifestyle['img_artikel']) }}" class=" card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">{{$lifestyle["sub_heading"]}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
</div>
@endSection