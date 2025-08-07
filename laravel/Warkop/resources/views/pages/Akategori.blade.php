@extends('Layouts.AdminTemplate')
@section('contentAdmin')
<div class="card mb-4">
    <div class="card-header d-flex flex-row align-items-center">
        <i class="fas fa-table me-2"></i> Daftar kategori
        <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah kategori
        </button>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Nama kategori</th>
                    <th>ID kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama kategori</th>
                    <th>ID kategori</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($dataCategory as $prd)
                <tr>
                    <td>{{$prd->kategori_prd}}</td>
                    <td>{{$prd->id_kategori}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="/deleteketegori/{{$prd->id_kategori}}" class="btn btn-danger">Hapus</a>
                            <button type="button" class="btn btn-primary btn-warning" data-id="{{$prd->id_kategori}}" data-bs-toggle="modal" data-bs-target="#updateProductModal">
                                Update data kategori
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
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Tambah data kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('Addkategori')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-box2-heart"></i></span>
                        <input type="text" class="form-control" placeholder="Kaategori product" aria-label="kategori_prd" aria-describedby="basic-addon1" name="kategori_prd">
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

<div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="updateProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateProductModalLabel">Update kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('updatekategori')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <input type="hidden" name="id" value="">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-box2-heart"></i></span>
                        <input type="text" class="form-control" placeholder="Nama product" aria-label="kategori_prd" aria-describedby="basic-addon1" name="kategori_prd">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Kategori</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).on('click', '.btn-warning', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: '/showkategori/' + id,
            type: 'GET',
            success: function(data) {
                $('#updateProductModal input[name="kategori_prd"]').val(data.kategori_prd);
                $('#updateProductModal input[name="id"]').val(data.id_kategori);
                $('#updateProductModal').modal('show');
            },
            error: function() {
                alert('Error! Tidak dapat mengambil data produk.');
            }
        });
    });
</script>

@endSection