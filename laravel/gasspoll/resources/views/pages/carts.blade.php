@extends("layout.header")
@section("content")
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="carts-pages d-flex">
    <div class="carts d-flex flex-column">
        <h4>Keranjang</h4>
        <div class="cart-btn d-flex">
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Pilih Semua</label>
            </div>
        </div>
        @foreach($cartdata as $data)
        <div class="carts-produk">
            @if($data->produk->stok > 0)
            <input type="checkbox" class="form-check-input product-checkbox" id="{{$data->produk->nama_produk}}">
            @endif
            <label class="form-check-label" for="{{$data->produk->nama_produk}}">{{$data->produk->nama_produk}}</label>
            <div class="carts-detail d-flex">
                <div class="carts-img d-flex flex-column">
                    <img src="{{ asset('storage/imgPrd/' . $data->produk->foto) }}" alt="" id="produk-image">
                    <br>
                    <div class="carts-deskirpsi d-flex flex-row">
                        <div class="produk-stok d-flex" data-stok="{{$data->produk->stok}}">
                            @if($data->produk->stok > 0)
                            <p>Sisa Stok produk:{{$data->produk->stok}}</p>
                            @else
                            <h5>Stok habis</h5>
                            @endif
                            <br>
                        </div>
                    </div>
                </div>
                <div class=" produk-pricee d-flex">
                    <h4>Rp.{{number_format($data->produk->harga)}}</h4>
                </div>
            </div>
            <input type="hidden" value="{{$data->id_keranjang}}" class="product-id">
            <div class="carts-act d-flex">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end align-items-center">
                    <a href="{{ route('cart.delete', ['cart_id' => $data->id_keranjang]) }}"><i class="bi bi-trash"></i></a>
                    <button class="btn btn-primary me-md-2" type="button"><i class="bi bi-plus-circle-fill"></i></button>
                    <input type="text" class="form-control qty-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" width="20px" value="{{$data->qty}}" readonly>
                    <button class="btn btn-primary" type="button"><i class="bi bi-dash-circle-fill"></i></button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="ringkasan d-flex flex-column">
        <h4>Ringksan Belanja</h4>
        <h5 id="total">Total: Rp.0</h5>
        <div class="d-grid gap-2">
            <button id="checkoutButton" class="btn btn-primary" type="button">Checkout</button>
        </div>
    </div>
</div>
@endsection