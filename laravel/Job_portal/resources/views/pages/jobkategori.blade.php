@extends('layouts.app')
@section('content')
<div class="container-all">
    <div class="rekomendasi">
        <div class="rekomendasi-list">
            @foreach($data_lowongan as $data)
            <div class="rekomendasi-item">
                <div class="rekomendasi-image">
                    <img src="{{ asset('storage/foto_user/'.$data->perusahaan->foto) }}" alt="Gambar Rekomendasi">
                </div>
                <div class="rekomendasi-content">
                    <h3>{{$data->perusahaan->nama}}</h3>
                    <p>Open Position for {{$data->judul_lowongan}}</p>
                    <p>{{$data->lokasi}}</p>
                    <p>{{$data->tipe_pekerjaan}}</p>
                    <p>Rp.{{number_format($data->gaji_manimum)}}-Rp.{{number_format($data->gaji_maximum)}}</p>

                </div>
                <a href="{{route('statusjobs',$data->id)}}" class="rekomendasi-button">Lihat +</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection