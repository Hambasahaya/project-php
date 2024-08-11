@extends("layout.header")

@section("content")
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="singglepage d-flex flex-column">
    <div class="container">
        <div class="row Singgle">
            <div class="col img-prd d-flex flex-column">
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        @foreach ($data_prd as $prd)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/imgPrd/' . $prd->foto) }}" />
                        </div>
                        @foreach ($prd->galeri as $prd_galeri)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/imgPrd/' . $prd_galeri->nama_foto) }}" />
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($data_prd as $prd)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/imgPrd/' . $prd->foto) }}" />
                        </div>
                        @foreach ($prd->galeri as $prd_galeri)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/imgPrd/' . $prd_galeri->nama_foto) }}" />
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col detail_prodduk d-flex flex-column">
                @foreach ($data_prd as $prd)
                <h4>{{$prd->nama_produk}}</h4>
                <p>
                    Deskripsi Produk:<br>{{$prd->deskirpsi}}
                    <br>
                    sisa stok: {{$prd->stok}}
                    <br>
                    kategori Produk : {{$prd->kategori->kategori}}
                </p>
                <div class="btn-card d-flex">
                    <h4>Rp. {{number_format($prd->harga)}}</h4>
                    @auth
                    <button type="button" class="addtocart" data-id_produk="{{ $prd->id_produk }}" data-harga="{{ $prd->harga }}"><i class="bi bi-bag-plus-fill"></i></button>
                    @endauth
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>
@endsection