@extends('Layouts.AdminLayout')
@section('content')
<div class="container-fluid pt-4 px-4">
    @if ($errors->any())
    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
        <strong>{{ $error }}</strong>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('succes'))
    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
        <strong> {{ session('succes') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-flex w-100">
                    <h6 class="mb-4">Table Categories</h6>
                    <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Tambah Categories
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id Categories</th>
                                <th scope="col">Nama Categories</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datacategoris as $categoris)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{$categoris->id_categories}}</td>
                                <td>{{$categoris->nama_categories}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" class="btn btn-warning" onclick="openUpdateModal({{ $categoris->id_categories }})">Update</button>
                                        <button type="button" class="btn btn-danger" onclick="deleteCategory({{ $categoris->id_categories }})">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"> Tambah Categories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="{{route('AddCatergories')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Masukan Nama Categories</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_categories">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Categories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="" id="updateForm">
                    @csrf
                    <input type="hidden" name="id" id="updateCategoryId">
                    <div class="mb-3">
                        <label for="updateNamaCategories" class="form-label">Nama Categories</label>
                        <input type="text" class="form-control" id="updateNamaCategories" name="nama_categories">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openUpdateModal(id) {
        // Mengambil data dari server
        $.ajax({
            url: '/categories/get/' + id,
            method: 'GET',
            success: function(response) {
                if (response.category) {
                    // Isi nilai input dengan data yang didapat
                    $('#updateCategoryId').val(response.category.id);
                    $('#updateNamaCategories').val(response.category.nama_categories);

                    // Set action URL dengan ID kategori yang benar
                    $('#updateForm').attr('action', '/categories/update/' + id);

                    $('#updateModal').modal('show'); // Buka modal
                }
            },
            error: function(error) {
                console.log(error);
                alert('Data tidak ditemukan!');
            }
        });
    }

    function deleteCategory(id) {
        if (confirm('Apakah kamu yakin ingin menghapus data ini?')) {
            $.ajax({
                url: '/categories/delete/' + id,
                method: 'GET',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }
</script>

@endSection