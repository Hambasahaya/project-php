@extends('Layouts.MainLayout')
@section('content')
@if(session("succsess_divisi"))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <p>{{session("succsess_divisi")}}</p>
    <hr>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session("gagal_divisi"))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Well Fail!</h4>
    <p>{{session("gagal_divisi")}}</p>
    <hr>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="page-header">
    <h3 class="page-title">Manage Divisi </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Manage-Divsi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Divisi</li>
        </ol>
    </nav>
</div>
<x-table></x-table>
@endSection