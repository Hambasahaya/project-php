@extends('Layouts.Admin')
@section('admincontent')
<div class="container-fluid">
    <div class="page-header min-height-250 border-radius-lg mt-4 d-flex flex-column justify-content-end">
        <span class="mask bg-primary opacity-9"></span>
        <div class="w-100 position-relative p-3">
            <div class="d-flex justify-content-between align-items-end">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-1 text-white font-weight-bolder">
                            {{Auth::user()->name }}
                        </h5>
                        <p class="mb-0 text-white text-sm">
                            @if(Auth::user()->level=="admin")
                            CEO / Co-Founder
                            @endif
                            @if(Auth::user()->level=="pembaca")
                            Pembaca
                            @endif
                        </p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{route('auth.logout')}}" class="btn btn-outline-white mb-0 me-1 btn-sm">
                        LOG OUT
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Profile Information</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="javascript:;">
                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <hr class="horizontal gray-light my-4">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp;{{Auth::user()->name}}</li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp;{{Auth::user()->email}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endSection