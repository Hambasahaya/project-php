@extends('layouts.pelamar')

@section('content')
<style>
    .profile-container {
        background-color: #4e6cff;
        padding: 30px;
        border-radius: 20px;
        max-width: 800px;
        margin: 40px auto;
        color: black;
    }

    .header {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 20px;
    }

    .logo {
        width: 60px;
        height: 60px;
        background-color: #d9d9d9;
        border-radius: 5px;
        flex-shrink: 0;
    }

    .info {
        flex: 1;
    }

    .info h4 {
        margin: 0 0 5px 0;
        font-weight: bold;
    }

    .row-info {
        display: flex;
        font-size: 14px;
        gap: 10px;
    }

    .section-box {
        background-color: #ff67c3;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 20px;
        color: white;
    }

    .section-box h5 {
        margin-top: 0;
        font-weight: bold;
    }

    .social-icon {
        background-color: #d9d9d9;
        width: 20px;
        height: 20px;
        border-radius: 4px;
        display: inline-block;
        text-align: center;
        font-size: 12px;
        line-height: 20px;
        color: black;
    }

    @media (max-width: 600px) {
        .row-info {
            flex-direction: column;
            gap: 5px;
        }

        .header {
            flex-direction: column;
            align-items: flex-start;
        }

        .profile-container {
            padding: 20px;
        }
    }
</style>

<div class="profile-container">
    <div class="header">
        <div class="logo"></div>
        <div class="info">
            <h4>PT. xxxxxxxxxx</h4>
            <div class="row-info">
                <span style="margin-right: 100px">Lokasi</span>
                <span>Jenis pekerjaan</span>
            </div>
            <div class="row-info">
                <span>Jumlah karyawan</span>
            </div>
        </div>
    </div>

    <h5 style="margin-top: 30px;">Tentang PT.xxxx</h5>

    <div class="section-box">
        <h5>Deskripsi</h5>
        <p>
            lorem sojcpwmwpmcipkposjcojaibujbknjksjanoksaojci cjanc asicoscabs sansabcsacsa iscosauh08wq ishscabsajbcosaj
        </p>
    </div>

    <div class="section-box">
        <h5>Hubungi Kami</h5>
        <p><strong>Alamat</strong><br>
        jl.xxx snowmocm;lncs mnslkopeqw</p>
        <p><strong>Media Sosial</strong><br>
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
        </p>
    </div>
</div>
@endsection
