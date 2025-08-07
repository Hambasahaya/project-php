<div class="container">
    <h3 class="mb-4">Absen Kelas </h3>

    <div class="accordion" id="kelasAccordion">
        @forelse($kelasDosen as $kIndex => $kelas)
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingKelas{{ $kIndex }}">
                <button class="accordion-button {{ $kIndex !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKelas{{ $kIndex }}" aria-expanded="{{ $kIndex === 0 ? 'true' : 'false' }}" aria-controls="collapseKelas{{ $kIndex }}">
                    {{ $kelas->kode_kelas }} - {{ $kelas->ruangan }} ({{ $kelas->hari }}, {{ $kelas->jam_mulai }} - {{ $kelas->jam_selesai }})
                </button>
                <a href="{{ route('rekap.absen.kelas', ['kelas_id' => $kelas->id, 'format' => 'pivot']) }}"
                    class="btn btn-sm btn-outline-success ms-2 me-2"
                    title="Download Rekap Pivot">
                    <i class="fas fa-table"></i> Rekap Absen
                </a>
            </h2>
            <div id="collapseKelas{{ $kIndex }}" class="accordion-collapse collapse {{ $kIndex === 0 ? 'show' : '' }}" aria-labelledby="headingKelas{{ $kIndex }}" data-bs-parent="#kelasAccordion">
                <div class="accordion-body">
                    <div class="accordion" id="pertemuanAccordion{{ $kIndex }}">
                        @for($pertemuan = 1; $pertemuan <= 15; $pertemuan++)
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingPertemuan{{ $kIndex }}-{{ $pertemuan }}">
                                <button class="accordion-button {{ $pertemuan !== 1 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePertemuan{{ $kIndex }}-{{ $pertemuan }}" aria-expanded="{{ $pertemuan === 1 ? 'true' : 'false' }}" aria-controls="collapsePertemuan{{ $kIndex }}-{{ $pertemuan }}">
                                    Pertemuan {{ $pertemuan }}
                                </button>
                            </h2>
                            <div id="collapsePertemuan{{ $kIndex }}-{{ $pertemuan }}" class="accordion-collapse collapse {{ $pertemuan === 1 ? 'show' : '' }}" aria-labelledby="headingPertemuan{{ $kIndex }}-{{ $pertemuan }}" data-bs-parent="#pertemuanAccordion{{ $kIndex }}">
                                <div class="accordion-body">
                                    @php
                                    $absenPertemuan = $kelas->kehadiran
                                    ->where('pertemuan', $pertemuan)
                                    ->groupBy('user_id');
                                    @endphp

                                    @if($absenPertemuan->count())
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Nama Mahasiswa</th>
                                                    <th>NIM</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                    <th>Waktu Absen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($absenPertemuan as $userId => $absenList)
                                                @php
                                                $user = \App\Models\User::find($userId);
                                                $absen = $absenList->first();
                                                @endphp
                                                <tr>
                                                    <td>{{ $user->nama ?? '-' }}</td>
                                                    <td>{{ $user->nim ?? '-' }}</td>
                                                    <td>{{ $absen->status }}</td>
                                                    <td>{{ $absen->keterangan }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($absen->created_at)->format('d M Y H:i') }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                    <div class="alert alert-warning mb-0">
                                        Belum ada data absen untuk pertemuan ini.
                                    </div>
                                    @endif
                                </div>
                            </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-info">Tidak ada kelas yang diampu.</div>
    @endforelse
</div>
</div>