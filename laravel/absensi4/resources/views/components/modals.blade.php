<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    @if(Route::is('adminmatakuliah'))
                    Tambah Data Mata Kuliah
                    @elseif(Route::is('adminkelas'))
                    Tambah Data Kelas
                    @elseif(Route::is('adminMhs'))
                    Tambah Data Mahasiswa
                    @elseif(Route::is('adminDosen'))
                    Tambah Data Dosen
                    @endif
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="
                    @if(Route::is('adminmatakuliah'))
                        {{ route('addMatakuliah') }}
                    @elseif(Route::is('adminkelas'))
                        {{ route('addKelas') }}
                    @elseif(Route::is('adminMhs'))
                        {{ route('addmhs') }}
                    @elseif(Route::is('adminDosen'))
                        {{ route('adddosen') }}
                    @endif
                " method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- FORM MATAKULIAH --}}
                    @if(Route::is('adminmatakuliah'))
                    <div class="mb-3">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" name="nama_matakuliah" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Semester</label>
                        <input type="number" class="form-control" name="semester" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Logo Mata kuliah</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept="image/*" name="foto_matakuliah">
                            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                        </div>
                    </div>

                    {{-- FORM KELAS --}}
                    @elseif(Route::is('adminkelas'))
                    <div class="mb-3">
                        <label class="form-label">Kode Kelas</label>
                        <input type="text" class="form-control" name="kode_kelas" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mata Kuliah</label>
                        <select class="form-select" name="mata_kuliah" required>
                            <option selected disabled>Pilih Mata Kuliah</option>
                            @foreach(\App\Models\Matakuliah::all() as $mk)
                            <option value="{{ $mk->id }}">{{ $mk->nama_matakuliah }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ruangan</label>
                        <input type="text" class="form-control" name="ruangan" maxlength="10" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jadwal Mulai</label>
                        <input type="time" class="form-control" name="jam_mulai" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jadwal Selesai</label>
                        <input type="time" class="form-control" name="jam_selesai" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hari</label>
                        <input type="text" class="form-control" name="hari" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dosen Pengampu</label>
                        <select class="form-select" name="dosen_pengampu" required>
                            <option selected disabled>Pilih Dosen</option>
                            @foreach(\App\Models\User::where('role', 'dosen')->get() as $dosen)
                            <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- FORM MAHASISWA --}}
                    @elseif(Route::is('adminMhs'))
                    <div class="mb-3">
                        <label class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    {{-- FORM DOSEN --}}
                    @elseif(Route::is('adminDosen'))
                    <div class="mb-3">
                        <label class="form-label">Nama Dosen</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    @endif
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>