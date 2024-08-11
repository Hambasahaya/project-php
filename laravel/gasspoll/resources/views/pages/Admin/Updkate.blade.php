@extends("layout.Adminlayout")
@section("contentadmin")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style.css">
<div class="updateform d-flex">
    @foreach($data_update as $udta)
    <form action="/addproduk" enctype="multipart/form-data" method="post">
        @csrf
        <input type="hidden" name="id_produk" value="{{ $udta->id_produk }}">
        <div class="mb-3">
            <label for="kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $udta->kategori }}">
        </div>
        <div class="mb-3">
            <label for="formFileSm" class="form-label">Foto Kategori</label>
            <input class="form-control form-control-sm" id="formFileSm" type="file" name="foto">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endforeach
</div>
@endsection