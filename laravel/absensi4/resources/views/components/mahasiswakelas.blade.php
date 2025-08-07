<div class="container">
    <h3 class="mb-4">Daftar Mahasiswa Berdasarkan Kelas</h3>

    <div class="accordion" id="kelasAccordion">
        @forelse($kelasDosen as $index => $kelas)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $index }}">
                <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                    {{ $kelas->kode_kelas }} - {{ $kelas->ruangan }} ({{ $kelas->hari }}, {{ $kelas->jam_mulai }} - {{ $kelas->jam_selesai }})
                </button>
            </h2>
            <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#kelasAccordion">
                <div class="accordion-body">
                    @if($kelas->mahasiswa->count())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>NIM</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kelas->mahasiswa as $mhs)
                                <tr>
                                    <td>{{ $mhs->nama }}</td>
                                    <td>{{ $mhs->email }}</td>
                                    <td>{{ $mhs->nim ?? '-' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-warning mb-0">
                        Tidak ada mahasiswa dalam kelas ini.
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-info">
            Anda belum mengampu kelas manapun.
        </div>
        @endforelse
    </div>
</div>