@extends('Layouts.MainLayout')
@section('content')
@if(session("success_add_employee"))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <p>Akun Berhasil di buat Silahkan Chek email pada email yang anda daftarkan</p>
    <hr>
    <p class="mb-0">Harap Login dan Perbarui password serta detail Indormasi akun anda!</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="page-header">
    <h3 class="page-title">Manage Human Resource </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Manage hr</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Human Resource</li>
        </ol>
    </nav>
</div>
<x-table></x-table>
@endSection