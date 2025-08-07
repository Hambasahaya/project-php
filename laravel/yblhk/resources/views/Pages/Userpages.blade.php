@extends('layout.AuthLayout')
@section('content')
<div class="profile-page">
    @if(session('sukses_update'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Sukses!',
            text: "Profle Berhasil Di perbaharui!",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    @endif
    <div class="content">
        <div class="content__cover mb-4">
            <div class="content__avatar" style="background-image: url('{{ asset('storage/userImg/' . Auth::user()->foto_user) }}');">
            </div>
            <div class="content__bull"><span></span><span></span><span></span><span></span><span></span>
            </div>
        </div>
        <br>
        <div class="content__title mt-6">
            <h1>{{Auth::user()->nama}}</h1><span>{{Auth::user()->alamat}}</span>
        </div>
        <div class="content__description">
            <p>Email : {{Auth::user()->email}}</p>
            <p>Nomor Telphone : {{Auth::user()->noTlp}}</p>
        </div>
        <ul class="content__list">
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <a href="/dasboard" class="btn btn-outline-primary">Back To Dasboard</a>
                <a href="/userpagesUpdate" class="btn btn-outline-warning">Update Data</button>
                    <a href="/logout" class="btn btn-outline-danger">Log Out</a>
            </div>
        </ul>
    </div>
    <div class="bg">
        <div><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
        </div>
    </div>
    <div class="theme-switcher-wrapper" id="theme-switcher-wrapper"><span>Themes color</span>
        <ul>
            <li><em class="is-active" data-theme="orange"></em></li>
            <li><em data-theme="green"></em></li>
            <li><em data-theme="purple"></em></li>
            <li><em data-theme="blue"></em></li>
        </ul>
    </div>

</div>
@endSection