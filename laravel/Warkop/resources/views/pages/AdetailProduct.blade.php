@extends('Layouts.AdminTemplate')
@section('contentAdmin')
<div class="card mb-4">
    <div class="card-header d-flex flex-row align-items-center">
        <i class="fas fa-table me-2"></i> Daftar Product
        <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Product
        </button>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Nama Product</th>
                    <th>Img Product</th>
                    <th>Price</th>
                    <th>Desc</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama Product</th>
                    <th>Img Product</th>
                    <th>Price</th>
                    <th>Desc</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($products as $prd)
                <tr>
                    <td>{{$prd->nama_product}}</td>
                    <td><img src="/images/{{$prd->img_product}}" alt="" srcset="" width="100" height="100"></td>
                    <td>{{$prd->price}}</td>
                    <td>{{$prd->desc}}</td>
                    <td>{{$prd->stock}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="/deleteprd/{{$prd->id_product}}" class="btn btn-danger">Hapus</a>
                            <button type="button" class="btn btn-primary btn-warning" data-id="{{$prd->id_product}}" data-bs-toggle="modal" data-bs-target="#updateProductModal">
                                Update data product
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Tambah data Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('addprd')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-box2-heart"></i></span>
                        <input type="text" class="form-control" placeholder="Nama product" aria-label="nama_product" aria-describedby="basic-addon1" name="nama_product">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-123"></i></span>
                        <input type="number" class="form-control" aria-label="stock" name="stock" placeholder="stock">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">IDR</span>
                        <input type="text" class="form-control" aria-label="stock" name="price" placeholder="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Desc product</span>
                        <textarea class="form-control" aria-label="With textarea" name="desc"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-box2-heart"></i></span>
                        <select class="form-select" aria-label="Default select example" name="id_kategori">
                            <option selected>Pilih Kategori Product</option>
                            @foreach($kategori as $kt)
                            <option value="{{$kt->id_kategori}}">{{$kt->kategori_prd}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02" name="img_product">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Update Product -->
<div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="updateProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateProductModalLabel">Update Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('updateprd')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <input type="hidden" name="id" value="">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-box2-heart"></i></span>
                        <input type="text" class="form-control" placeholder="Nama product" aria-label="nama_product" aria-describedby="basic-addon1" name="nama_product">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-123"></i></span>
                        <input type="number" class="form-control" aria-label="stock" name="stock" placeholder="Stock">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">IDR</span>
                        <input type="text" class="form-control" aria-label="price" name="price" placeholder="Price">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Desc product</span>
                        <textarea class="form-control" aria-label="With textarea" name="desc"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02" name="img_product">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Tambahkan ini di <head> atau sebelum penutup tag </body> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).on('click', '.btn-warning', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: '/showprd/' + id,
            type: 'GET',
            success: function(data) {
                $('#updateProductModal input[name="nama_product"]').val(data.nama_product);
                $('#updateProductModal input[name="stock"]').val(data.stock);
                $('#updateProductModal input[name="price"]').val(data.price);
                $('#updateProductModal textarea[name="desc"]').val(data.desc);
                $('#updateProductModal input[name="id"]').val(data.id_product);
                $('#updateProductModal').modal('show');
            },
            error: function() {
                alert('Error! Tidak dapat mengambil data produk.');
            }
        });
    });
</script>

@endSection