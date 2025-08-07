@extends('Layouts.AuthTemplate')
@section('formAuth')
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0">Warkop Carts</h1>
                                        <h6 class="mb-0 text-muted">items</h6>
                                    </div>
                                    <hr class="my-4">
                                    @foreach($cart as $cartdata)
                                    @if($cartdata->status_pesanan==="cart")
                                    <input type="checkbox" name="selected_products[]" value="{{$cartdata->id_cart}}" class="select-product">
                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img
                                                src="/images/{{$cartdata->product->img_product}}"
                                                class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <!-- <h6 class="text-muted">Shirt</h6> -->
                                            <h6 class="mb-0">{{$cartdata->product->nama_product}}</h6>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <input type="hidden" name="product_id[]" value="{{$cartdata->product->id_product}}">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2 btn-decrement"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input id="form1" min="1" name="quantity[]" value="{{$cartdata->qty}}" type="number"
                                                class="form-control form-control-sm" />

                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2 btn-increment"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h6 class="mb-0">Rp. {{number_format($cartdata->product->price)}}</h6>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="javascript:void(0);" class="text-muted delete-cart-item" data-product-id="{{$cartdata->product->id_product}}"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <hr class="my-4">

                                </div>
                            </div>
                            <div class="col-lg-4 bg-body-tertiary">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">items <span id="total-items">0</span></h5>
                                        <h5 id="total-price">Rp. 0</h5>
                                    </div>
                                    <h5 class="text-uppercase mb-3">Notes:</h5>

                                    <div class="mb-5">
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="text" id="form3Examplea2" class="form-control form-control-lg" name="notes" />
                                            <label class="form-label" for="form3Examplea2">Tulisakan Notes</label>
                                        </div>
                                    </div>

                                    <hr class="my-4">
                                    <button type="button" class="btn btn-dark btn-block btn-lg btn-pesan" data-mdb-ripple-color="dark">Pesan Sekarang!</button>

                                </div>
                                <div id="loading-spinner" style="display: none;">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
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