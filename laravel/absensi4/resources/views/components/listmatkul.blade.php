@if(request()->routeIs('home'))
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Course</th>
            <th scope="col">Lecturer</th>
            <th scope="col">Day & TIme</th>
            <th scope="col">Room</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_kelas as $data)
        <tr>
            <th scope="row">1</th>
            <td>{{$data->matakuliah->nama_matakuliah}}</td>
            <td>{{$data->dosen->nama}}</td>
            <td>{{$data->hari}},{{$data->jam_mulai}} - {{$data->jam_selesai}}</td>
            <td>{{$data->ruangan}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@if(request()->routeIs('absen'))
<div class="attendance-column">
    <h5><strong>Upcoming</strong></h5>
    @foreach ($upcoming as $kelas)
    <div class="attendance-item">
        <img
            src="{{ $kelas->matakuliah->foto_matakuliah 
        ? asset('storage/' . $kelas->matakuliah->foto_matakuliah) 
        : asset('/img/default.png') 
    }}"
            alt="{{ $kelas->matakuliah->nama_matakuliah }}">
        <div>
            <strong>{{ $kelas->ruangan }} {{ $kelas->kode_kelas }} - {{ $kelas->matakuliah->nama_matakuliah }}</strong><br>
            {{ $kelas->jam_mulai }} - {{ $kelas->jam_selesai }} on {{ $kelas->hari }}
        </div>
    </div>
    @endforeach
</div>
<div class="attendance-column">
    <h5><strong>Recent</strong></h5>
    @foreach ($recent as $kelas)
    <div class="attendance-item">
        <img src="{{ asset('/img/' . strtolower($kelas->matakuliah->kode ?? 'default') . '.png') }}" alt="{{ $kelas->matakuliah->nama }}">
        <div>
            <strong>{{ $kelas->ruangan }} {{ $kelas->kode_kelas }} - {{ $kelas->matakuliah->nama_matakuliah }}</strong><br>
            {{ $kelas->jam_mulai }} - {{ $kelas->jam_selesai }} on {{ $kelas->hari }}
        </div>
    </div>
    @endforeach
</div>
@endif