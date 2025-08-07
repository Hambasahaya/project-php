<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-body shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <div class="header-table d-flex p-3 mb-3 justify-content-between w-100 align-items-center align-content-center">
                    <h4 class="card-title">Data Absen Seluruh Karyawan</h4>
                    <a href="{{route('exportAllAbsen')}}" class="btn btn-gradient-primary btn-fw">Rekap Data Absen</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Nama </th>
                                <th> Role </th>
                                <th> Divisi </th>
                                <th> Tanggal Absen </th>
                                <th> Lokasi Absen </th>
                                <th> Jam Absen </th>
                                <th> Status Absen </th>
                                <th> Foto Absen </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dataabsen)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dataabsen->user->nama }}</td>
                                <td>{{ $dataabsen->user->role->role_name }}</td>
                                <td>{{ $dataabsen->user->divisi->nama_divisi }}</td>
                                <td>{{ $dataabsen->tanggal }}</td>
                                <td>{{ $dataabsen->lokasi_absen }}</td>
                                <td>{{ $dataabsen->jam_masuk }}</td>
                                <td>{{ $dataabsen->status }}</td>
                                <td> <img src="{{ asset('storage/foto_absen/' . ($dataabsen->foto_absen)) }}" alt="image" /></td>
                                @if($dataabsen->user_id!=Auth::user()->id)
                                <td>
                                    <div class="d-flex gap-3">
                                        <button
                                            type="button"
                                            class="btn btn-gradient-warning btn-fw btn-edit-absen"
                                            data-id="{{ $dataabsen->id }}">
                                            Update
                                        </button>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModalabsen" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form id="form-update-absen" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">Update Status Kehadiran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="mb-3">
                            <select class="form-select" name="status" id="edit-status-kehadiran">
                            </select>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttonsabsen = document.querySelectorAll('.btn-edit-absen');
        buttonsabsen.forEach(button => {
            button.addEventListener('click', async () => {
                const id = button.getAttribute('data-id');
                try {
                    const response = await fetch(`/absenstatus/${id}`);
                    const result = await response.json();
                    if (result.success) {
                        const data = result.data;
                        const select = document.getElementById('edit-status-kehadiran');
                        select.innerHTML = '';
                        const currentOption = document.createElement('option');
                        currentOption.value = data.status;
                        currentOption.textContent = `Status Saat Ini: ${data.status.charAt(0).toUpperCase() + data.status.slice(1)}`;
                        currentOption.selected = true;
                        currentOption.disabled = true;
                        select.appendChild(currentOption);
                        const options = ['hadir', 'izin', 'alpa', 'sakit'];
                        options.forEach(status => {
                            if (status !== data.status) {
                                const option = document.createElement('option');
                                option.value = status;
                                option.textContent = status.charAt(0).toUpperCase() + status.slice(1);
                                select.appendChild(option);
                            }
                        });

                        document.getElementById('edit-id').value = id;
                        document.getElementById('form-update-absen').action = `/absenupdate/${id}`;
                        console.log(result);
                        const modal = new bootstrap.Modal(document.getElementById('editModalabsen'));
                        modal.show();
                    } else {
                        alert(result.message || 'Gagal mengambil data.');
                    }
                } catch (error) {
                    console.error(error);
                    alert('Terjadi kesalahan saat mengambil data.');
                }
            });
        });
    });
</script>