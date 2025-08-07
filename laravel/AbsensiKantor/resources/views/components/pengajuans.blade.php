<div class="mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-semibold mb-0"><i class="bi bi-list-task me-2"></i>Daftar Pengajuan</h5>
        <i class="bi bi-chevron-down text-muted"></i>
    </div>

    <div class="table-responsive shadow rounded-4">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-primary text-white rounded-top-3">
                <tr>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Status</th>
                    <th>Alasan</th>
                    <th>Bukti</th>
                    @if(Auth::user()->level==="HR")
                    <th class="text-center">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($pengajuans as $data)
                <tr>
                    <td>{{ $data->user->nama }}</td>
                    <td>
                        <span class="badge bg-info text-dark text-capitalize px-3 py-2">{{ $data->jenis }}</span>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($data->tanggal_mulai)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->tanggal_selesai)->format('d M Y') }}</td>
                    <td>
                        @php
                        $status = strtolower($data->status);
                        $badgeColor = match($status) {
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'secondary'
                        };
                        @endphp
                        <span class="badge bg-{{ $badgeColor }} text-capitalize px-3 py-2">
                            {{ $status }}
                        </span>
                    </td>
                    <td class="text-truncate" style="max-width: 180px;">{{ $data->alasan }}</td>
                    <td>
                        @if($data->bukti)
                        <a href="{{ asset('storage/'.$data->bukti) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-eye-fill"></i> Lihat
                        </a>
                        @else
                        <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    @if(Auth::user()->level==="HR")
                    <td class="text-center">
                        <div class="btn-group btn-group-sm" role="group">
                            <button class="btn btn-outline-success" title="Izinkan"
                                onclick="handlePengajuanAction({{ $data->id }}, 'approve')">
                                <i class="bi bi-check2-circle"></i>
                            </button>
                            <button class="btn btn-outline-danger" title="Tolak"
                                onclick="handlePengajuanAction({{ $data->id }}, 'reject')">
                                <i class="bi bi-x-circle"></i>
                            </button>
                        </div>
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted py-4">
                        <i class="bi bi-folder-x fs-4 d-block mb-2"></i>
                        Tidak ada data pengajuan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    function handlePengajuanAction(id, action) {
        const url = `/pengajuan/${id}/${action}`;
        const token = '{{ csrf_token() }}';

        fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(res => {
                alert(res.message);
                location.reload();
            })
            .catch(err => {
                alert('Terjadi kesalahan.');
                console.error(err);
            });
    }
</script>