<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">
            @if(Route::is('adminmatakuliah'))
            Data Matakuliah
            @elseif(Route::is('adminkelas'))
            Data Kelas
            @elseif(Route::is('adminMhs'))
            Data Mahasiswa
            @elseif(Route::is('adminDosen'))
            Data Dosen
            @else
            Data
            @endif
        </h6>

        <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
            @if(Route::is('adminmatakuliah'))
            Tambah Data Matakuliah
            @elseif(Route::is('adminkelas'))
            Tambh Data Kelas
            @elseif(Route::is('adminMhs'))
            Tambah Data Mahasiswa
            @elseif(Route::is('adminDosen'))
            Tambah Data Dosen
            @else
            Data
            @endif
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        @if(isset($data[0]))
                        @foreach(array_keys($data[0]) as $key)
                        @if($key !== 'mata_kuliah')
                        <th>{{ ucwords(str_replace('_', ' ', $key)) }}</th>
                        @endif
                        @endforeach
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $row)
                    <tr>
                        @foreach($row as $key => $value)
                        @if($key === 'mata_kuliah')
                        @continue
                        @endif
                        <td>
                            @if((Route::is('adminkelas') || Route::is('dosen.jadwal')) && $key === 'qrcode')
                            <img src="{{ asset('storage/qrcodes/' . $value) }}" alt="QR Code" width="100">

                            @elseif(Route::is('adminkelas') && $key === 'dosen')
                            {{ $row['dosen']['nama'] ?? '-' }}

                            @elseif((Route::is('adminMhs') || Route::is('adminDosen')) && $key === 'foto')
                            <img src="{{ asset('storage/' . $value) }}" alt="Foto " width="100" class="rounded">

                            @elseif(Route::is('adminmatakuliah') && $key === 'foto_matakuliah')
                            <img src="{{ asset('storage/' . $value) }}" alt="Foto" width="50" class="rounded">

                            @else
                            {{ $value }}
                            @endif
                        </td>
                        @endforeach
                        @if(Auth::user()->role==="admin")
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ 
    Route::is('adminkelas') 
        ? route('hapuskelas', $row['id']) 
        : (Route::is('adminmatakuliah') 
            ? route('deleteMatakuliah', $row['id']) 
            : (Route::is('adminMhs') 
                ? route('deleteMahasiswa', $row['id']) 
                : route('deletedosen', $row['id']))) 
}}"
                                    class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    Hapus
                                </a>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdate{{ $row['id'] }}">
                                    Update
                                </button>
                                @if(Route::is('adminkelas'))
                                <a href="{{ route('plotingMahasiswa', $row['id']) }}" class="btn btn-info btn-sm">Plotting Mahasiswa</a>
                                <a href="{{ route('showmhskelas', $row['id']) }}" class="btn btn-success btn-sm">Lihat Mahasiswa Dikelas</a>
                                @endif
                            </div>
                        </td>
                        @endif
                        @if(Auth::user()->role==="dosen")
                        <td>
                            <a href="{{ route('kelas.regenerateQrCode', $row['id']) }}" class="btn btn-info btn-sm"
                                onclick="return confirm('QR lama akan dihapus dan diganti dengan baru. Lanjutkan?')">
                                Regenerate QR
                            </a>

                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

@foreach($data as $row)
<div class="modal fade" id="modalUpdate{{ $row['id'] }}" tabindex="-1" aria-labelledby="modalUpdateLabel{{ $row['id'] }}" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ 
    Route::is('adminmatakuliah') 
        ? route('updateMatakuliah', $row['id']) 
        : (Route::is('adminkelas') 
            ? route('updatekelas', $row['id']) 
            : (Route::is('adminMhs') 
                ? route('updateMahasiswa', $row['id']) 
                : route('updatedosen', $row['id']))) 
}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ Route::is('adminmatakuliah') ? 'Edit Mata Kuliah' : 'Edit Kelas' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @if(Route::is('adminmatakuliah'))
                    {{-- Form untuk Mata Kuliah --}}
                    <div class="mb-3">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" name="nama_matakuliah" value="{{ $row['nama_matakuliah'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Semester</label>
                        <input type="number" class="form-control" name="semester" value="{{ $row['semester'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Logo Mata kuliah</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept="image/*" name="foto_matakuliah">
                            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                        </div>
                    </div>

                    @elseif(Route::is('adminkelas'))
                    {{-- Form untuk Kelas --}}
                    <div class="mb-3">
                        <label class="form-label">Kode Kelas</label>
                        <input type="text" class="form-control" name="kode_kelas" value="{{ $row['kode_kelas'] }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mata Kuliah</label>
                        <select class="form-select" name="mata_kuliah" required>
                            @foreach(\App\Models\Matakuliah::all() as $mk)
                            <option value="{{ $mk->id }}" {{ $row['mata_kuliah'] == $mk->id ? 'selected' : '' }}>
                                {{ $mk->nama_matakuliah }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ruangan</label>
                        <input type="text" class="form-control" name="ruangan" value="{{ $row['ruangan'] }}" maxlength="10" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" name="jam_mulai" value="{{ $row['jam_mulai'] }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" name="jam_selesai" value="{{ $row['jam_selesai'] }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hari</label>
                        <input type="text" class="form-control" name="hari" value="{{ $row['hari'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dosen Pengampu</label>
                        <select class="form-select" name="dosen_pengampu" required>
                            @foreach(\App\Models\User::where('role', 'dosen')->get() as $dosen)
                            <option value="{{ $dosen->id }}" {{ $row['dosen'] == $dosen->id ? 'selected' : '' }}>
                                {{ $dosen->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    @elseif(Route::is('adminMhs'))
                    <div class="mb-3">
                        <label class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama" value="{{ $row['nama'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $row['email']??'' }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password <small class="text-muted">(kosongkan jika tidak ingin diganti)</small></label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" value="{{ $row['jurusan'] ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fakultas</label>
                        <input type="text" class="form-control" name="fakultas" value="{{ $row['fakultas'] ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">semester</label>
                        <input type="number" class="form-control" name="semester" value="{{ $row['semester'] ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">pendidikan Terakhir</label>
                        <input type="text" class="form-control" name="pendidikan_terakhir" value="{{ $row['pendidikan_terakhir'] ?? '' }}">
                    </div>
                    <div class="mb-3 d-flex gap-2">
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="radioDefault1">
                            <label class="form-check-label" for="radioDefault1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioDefault2" value="Perempuan" checked>
                            <label class="form-check-label" for="radioDefault2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No HP</label>
                        <input type="text" class="form-control" name="no_hp" value="{{ $row['no_hp'] ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat">{{ $row['alamat'] ?? '' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="foto">
                            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                        </div>
                    </div>
                    @elseif(Route::is('adminDosen'))
                    <div class="mb-3">
                        <label class="form-label">Nama Dosen</label>
                        <input type="text" class="form-control" name="nama" value="{{ $row['nama'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $row['email'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NUPTK</label>
                        <input type="text" class="form-control" name="nuptk" value="{{ $row['nuptk'] ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">pendidikan Terakhir</label>
                        <input type="text" class="form-control" name="pendidikan_terakhir" value="{{ $row['pendidikan_terakhir'] ?? '' }}">
                    </div>
                    <div class="mb-3 d-flex gap-2">
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="radioDefault1">
                            <label class="form-check-label" for="radioDefault1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioDefault2" value="Perempuan" checked>
                            <label class="form-check-label" for="radioDefault2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No HP</label>
                        <input type="text" class="form-control" name="no_hp" value="{{ $row['no_hp'] ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat">{{ $row['alamat'] ?? '' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="foto">
                            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                        </div>
                    </div>
                    <div class="mb-3">

                        <label class="form-label">Password <small class="text-muted">(kosongkan jika tidak ingin diganti)</small></label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    @endif
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach