@extends('Layouts.MainLayout')
@section('content')
@if(session("succsess_role"))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <p>{{session("succsess_role")}}</p>
    <hr>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session("gagal_role"))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Well Fail!</h4>
    <p>{{session("gagal_role")}}</p>
    <hr>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="page-header">
    <h3 class="page-title">Manage Role </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Manage-Role</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Role</li>
        </ol>
    </nav>
</div>
<x-table></x-table>
@endSection