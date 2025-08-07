<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Jam Masuk</th>
            <th>Jam Pulang</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($absens as $absen)
        <tr>
            <td>{{ $absen->tanggal_absen }}</td>
            <td>{{ $absen->user->nama }}</td>
            <td>{{ $absen->jam_masuk }}</td>
            <td>{{ $absen->jam_pulang ?? 'Belum pulang' }}</td>
            <td>{{ ucfirst($absen->status) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>