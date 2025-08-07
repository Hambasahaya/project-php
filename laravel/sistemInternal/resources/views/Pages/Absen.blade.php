@extends('Layouts.MainLayout')
@section('content')
@if(session("succsess_absen"))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <p>{{session("succsess_absen")}}</p>
    <hr>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session("gagal_absen"))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Well Fail!</h4>
    <p>{{session("gagal_absen")}}</p>
    <hr>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="page-header">
    <h3 class="page-title">Absen </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Absen</a></li>
            <li class="breadcrumb-item active" aria-current="page">Absen</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <x-absen></x-absen>
                <x-table></x-table>
            </div>
        </div>
    </div>
    @if(Auth::user()->role->role_name==="hr")
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <x-tableAbsen></x-tableAbsen>
            </div>
        </div>
    </div>
    @endif
</div>
@endSection