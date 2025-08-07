@extends('Layout.DasboardLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Pelaporan
                </div>
                <div class="card-body">
                    <x-table />
                </div>
            </div>
            @endSection