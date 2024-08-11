@extends("layout.Adminlayout")
@section("contentadmin")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Data Produk
            </button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Stock</th>
                            <th>Berat</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>kategori Produk</th>
                            <th>Foto</th>
                            <th>Aksi</th>

                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prd_data as $prd)
                        <tr>
                            <td>{{$prd->nama_produk}}</td>
                            <td>{{$prd->stok}}</td>
                            <td>{{$prd->berat}}</td>
                            <td>{{$prd->deskirpsi}}</td>
                            <td>{{$prd->harga}}</td>
                            <td>{{$prd->kategori->kategori}}</td>
                            <td><img src="{{ asset('storage/imgPrd/' . $prd->foto) }}" alt="" srcset="" width="50px" height="50px"></td>
                            <td>
                                <div class="d-grid gap-2 d-md-block">
                                    <a href="/updprd?id_produk={{ $prd->id_produk }}" class="btn btn-primary">update</a>
                                    <a href="/deleteprd?id_produk={{ $prd->id_produk }}" class="btn btn-warning">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach;
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/addproduk" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="stock" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">berat</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="berat" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">harga</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="deskripsi" required></textarea>
                            <label for="floatingTextarea">Deskripsi</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <select class="form-select form-select-sm" aria-label="Small select example" name="kategori" required>
                            <option selected>Pilih Kategori Produk</option>
                            @foreach($kategori as $kg)
                            <option value="{{$kg->id_kategori}}">{{$kg->kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">foto utama produk</label>
                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="foto_utama" required>
                    </div>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">foto galeri produk</label>
                        <input class="form-control form-control-sm" id="formFileSm" type="file" required name="foto[]" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection