@extends("layout.Adminlayout")
@section("contentadmin")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style.css">
<div class="updateform d-flex">
    @foreach($data_update as $udta)
    <form action="/addproduk" enctype="multipart/form-data" method="post">
        @csrf
        <input type="hidden" name="id_produk" value="{{$udta->id_produk}}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_produk" value="{{$udta->nama_produk}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Stok</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="stock" value="{{$udta->stok}}">
        </div>
        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label">berat</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="berat" value="{{$udta->berat}}">
        </div>
        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label">harga</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="harga" value="{{$udta->harga}}">
        </div>
        <div class=" mb-3">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="deskripsi"></textarea>
                <label for="floatingTextarea">Deskripsi</label>
            </div>
        </div>
        <div class="mb-3">
            <select class="form-select form-select-sm" aria-label="Small select example" name="kategori">
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
            <label for="formFileSm" class="form-label">foto produk</label>
            <input class="form-control form-control-sm" id="formFileSm" type="file" name="foto[]" value="{{$udta->foto}}" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endforeach
</div>
@endsection