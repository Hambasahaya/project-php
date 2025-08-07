@extends('Layout.DasboardLayout')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="container">
    <div class="row">
        @if(session('sukses_kategori'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('
                sukses_kategori ') }}',
                confirmButtonColor: '#3085d6',
            });
        </script>
        @endif
        @if(session('gagal_kategori'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'gagal!',
                text: '{{ session('
                gagal_kategori ') }}',
                confirmButtonColor: '#3085d6',
            });
        </script>
        @endif
        <div class="col-sm-12">
            <div class="card mb-4">
                <div class="card-header d-flex">
                    <i class="fas fa-table me-1"></i>
                    Data Pelaporan
                    @if(request()->routeIs('KategoriLaporan'))
                    <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Data Kategori Laporan
                    </button>
                </div>
                <div class="card-body">
                    <x-table />
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Laporan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('AddNewKategori')}}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-tags"></i></span>
                                    <input type="text" class="form-control" placeholder="masukan kategori" aria-label="Username" aria-describedby="basic-addon1" name="kategori_laporan">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Tambah!</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endSection