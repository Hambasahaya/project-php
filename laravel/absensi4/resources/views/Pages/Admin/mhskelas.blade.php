@extends('Layouts.AdminLayout')

@section('content')
<div class="container">
    <h4>Daftar Mahasiswa di Kelas: {{ $kelas->kode_kelas }}</h4>

    @if($kelas->mahasiswa->count())
    <table class="table table-bordered mt-3">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas->mahasiswa as $index => $mhs)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-warning mt-3">
        Belum ada mahasiswa yang dipetakan ke kelas ini.
    </div>
    @endif

    <a href="{{ route('adminkelas') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection