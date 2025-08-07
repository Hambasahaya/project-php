@extends('layout.AuthLayout')
@section('content')
<div class="profile-page">
    <div class="content">
        <div class="content__cover mb-4">
            <div class="content__avatar" style="background-image: url('{{ asset('storage/userImg/' . Auth::user()->foto_user) }}');" id="preview">
            </div>
            <div class="content__bull"><span></span><span></span><span></span><span></span><span></span>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <form action="{{route('userupd')}}" class="form" enctype="multipart/form-data" method="post">
            @csrf
            <div class=" input-group mb-3">
                <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                <input required type="text" class="form-control" placeholder="nama" aria-label="nama" value="{{Auth::user()->nama}}" name="nama">
                <span class="input-group-text">@</span>
                <input required type="text" class="form-control" placeholder="email" aria-label="email" value="{{Auth::user()->email}}" name="email">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i> Alamat </span>
                <textarea class="form-control p-3" aria-label="With textarea" name="alamat">{{Auth::user()->alamat}}</textarea>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                <input required type="text" class="form-control" placeholder="Nomor Telphone" aria-label="Nomor Telphone" value="{{Auth::user()->noTlp}}" name="noTlp">
                <span class="input-group-text"><i class="bi bi-calendar-heart-fill"></i></span>
                <input required type="date" class="form-control" placeholder="tanggal lahir" aria-label="tanggal lahir" value="{{Auth::user()->tanggalLahir}}" name="tanggalLahir">
            </div>
            <div class="input-group mb-3">
                <div class="form-check form-check-inline">
                    <input required class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="laki-laki">
                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline mb-3">
                    <input required class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="perempuan">
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">foto Profile</label>
                <input type="file" class="form-control" name="user_foto" id="foto_user">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-outline-success">Update Data</button>
            </div>

        </form>
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