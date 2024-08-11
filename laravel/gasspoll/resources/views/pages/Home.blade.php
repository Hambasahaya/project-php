@extends("layout.header")
<!-- buka content -->
@section("content")
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="home d-flex flex-column">
    <div class="banner d-flex">
        <img src="/img/banner.png" alt="">
    </div>
</div>
<div class="kategoryprd text-center">
    <h4>SparePart Category</h4>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($kategori as $kategori)
            <a href="/kategori/{{$kategori->id_kategori}}">
                <div class="swiper-slide d-flex">
                    <div class="cardimg">
                        <a href="/kategori/{{$kategori->id_kategori}}"><img src="/img/oli.jpeg" alt=""></a>
                    </div>
                    <div class="card-titel">
                        <a href="/kategori/{{$kategori->id_kategori}}">
                            {{$kategori->kategori}}
                        </a>
                    </div>
                </div>
                <div class="swiper-slide d-flex">
                    <div class="cardimg">
                        <a href="/kategori/{{$kategori->id_kategori}}"><img src="/img/oli.jpeg" alt=""></a>
                    </div>
                    <div class="card-titel">
                        <a href="/kategori/{{$kategori->id_kategori}}">
                            {{$kategori->kategori}}
                        </a>
                    </div>
                </div>
                <div class="swiper-slide d-flex">
                    <div class="cardimg">
                        <a href="/kategori/{{$kategori->id_kategori}}"><img src="/img/oli.jpeg" alt=""></a>
                    </div>
                    <div class="card-titel">
                        <a href="/kategori/{{$kategori->id_kategori}}">
                            {{$kategori->kategori}}
                        </a>
                    </div>
                </div>
                <div class="swiper-slide d-flex">
                    <div class="cardimg">
                        <a href="/kategori/{{$kategori->id_kategori}}"><img src="/img/oli.jpeg" alt=""></a>
                    </div>
                    <div class="card-titel">
                        <a href="/kategori/{{$kategori->id_kategori}}">
                            {{$kategori->kategori}}
                        </a>
                    </div>
                </div>
                <div class="swiper-slide d-flex">
                    <div class="cardimg">
                        <a href="/kategori/{{$kategori->id_kategori}}"><img src="/img/oli.jpeg" alt=""></a>
                    </div>
                    <div class="card-titel">
                        <a href="/kategori/{{$kategori->id_kategori}}">
                            {{$kategori->kategori}}
                        </a>
                    </div>
                </div>
                <div class="swiper-slide d-flex">
                    <div class="cardimg">
                        <a href="/kategori/{{$kategori->id_kategori}}"><img src="/img/oli.jpeg" alt=""></a>
                    </div>
                    <div class="card-titel">
                        <a href="/kategori/{{$kategori->id_kategori}}">
                            {{$kategori->kategori}}
                        </a>
                    </div>
                </div>
                <div class="swiper-slide d-flex">
                    <div class="cardimg">
                        <a href="/kategori/{{$kategori->id_kategori}}"><img src="/img/oli.jpeg" alt=""></a>
                    </div>
                    <div class="card-titel">
                        <a href="/kategori/{{$kategori->id_kategori}}">
                            {{$kategori->kategori}}
                        </a>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
<div class="header-produk">
    <h4 class="text-center">New Product's</h4>
    <form id="search-form" class="d-flex" role="search">
        <input id="search-input" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>
<div class="produk d-flex">
    <div class="row kategory">
        @foreach($data_prd as $produk)
        <div class="card" style="width: 20rem; padding: 16px; height: 70vh;">
            <a href="/singgle/{{$produk->id_produk}}"><img src="{{ asset('storage/imgPrd/' . $produk->foto) }}" class="card-img-top p-8" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                <p class="card-text">{{ $produk->kategori->kategori }}</p>
                @if($produk->stok < 0) <p class="card-text">Stok Kosong</p>
                    @else
                    <p class="card-text">stok Barang:{{ $produk->stok ?? 'Stok Tidak Diketahui' }}</p>
                    @endif
                    <div class="btn-card d-flex">
                        <h4>Rp.{{ number_format($produk->harga) }}</h4>
                        @auth
                        <button type="button" class="addtocart" data-id_produk="{{ $produk->id_produk }}" data-harga="{{ $produk->harga }}"><i class="bi bi-bag-plus-fill"></i></button>
                        @endauth
                    </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- tutup content -->
@endsection

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: '4',
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            spaceBetween: 10,
            freeMode: false,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });
</script>