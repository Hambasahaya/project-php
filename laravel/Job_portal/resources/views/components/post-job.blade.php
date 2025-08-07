<div class="edit-profile-container position-relative">
    <h2>Tambah Lowongan</h2>
    <hr>

    <form action="{{route('addNewLowongan')}}" method="post">
        @csrf
        <div class="kolom mb-3">
            <label for="posisi" class="form-label text-white">Posisi Pekerjaan</label>
            <input type="text" class="form-control" id="posisi"
                placeholder="Contoh: Frontend Developer" name="judul_lowongan">
        </div>

        <div class="kolom mb-3">
            <label class="form-label text-white">Kategori Pekerjaan</label>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle w-100 text-start" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Pilih Kategori
                </button>
                <ul class="dropdown-menu w-100 p-2 shadow">
                    @foreach (['UI/UX', 'Frontend', 'Backend', 'Fullstack'] as $kategori)
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $kategori }}"
                                id="{{ strtolower($kategori) }}" name="kategori_lowongan[]">
                            <label class="form-check-label"
                                for="{{ strtolower($kategori) }}">{{ $kategori }}</label>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="kolom mb-3">
            <label for="tipe_pekerjaan" class="form-label text-white">Tipe Pekerjaan</label>
            <select class="form-select" id="tipe_pekerjaan" name="tipe_pekerjaan">
                <option value="">Pilih Tipe</option>
                <option value="fulltime">Full-time</option>
                <option value="parttime">Part-time</option>
                <option value="freelance">Freelance</option>
                <option value="remote">Remote</option>
            </select>
        </div>

        <div class="kolom mb-3 lokasi-field">
            <label class="form-label text-white">Provinsi</label>
            <select id="provinsi" class="form-select" name="provinsi">
                <option value="">Pilih Provinsi</option>
            </select>
        </div>

        <div class="kolom mb-3 lokasi-field">
            <label class="form-label text-white">Kabupaten/Kota</label>
            <select id="kota" class="form-select" name="kota">
                <option value="">Pilih Kabupaten/Kota</option>
            </select>
        </div>

        <div class="kolom mb-3">
            <label for="gaji_minimum" class="form-label text-white">Gaji Minimum</label>
            <input type="number" class="form-control" name="gaji_minimum" placeholder="Contoh: 3000000">
        </div>

        <div class="kolom mb-3">
            <label for="gaji_maksimum" class="form-label text-white">Gaji Maksimum</label>
            <input type="number" class="form-control" name="gaji_maximum" placeholder="Contoh: 8000000">
        </div>

        <div class="kolom mb-3">
            <label for="kualifikasi" class="form-label text-white">Kualifikasi</label>
            <textarea class="form-control" id="kualifikasi" name="kualifikasi"
                rows="6" placeholder="Masukkan kualifikasi yang dibutuhkan..."></textarea>
        </div>

        <div class="kolom mb-3">
            <label for="deskripsi" class="form-label text-white">Deskripsi Pekerjaan</label>
            <textarea class="form-control" id="deskripsi" rows="6"
                placeholder="Masukkan deskripsi pekerjaan..." name="deskripsi_lowongan"></textarea>
        </div>

        <div class="btn-save">
            <button type="submit" class="btn btn-primary px-4">Tambah</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tipeSelect = document.getElementById('tipe_pekerjaan');
        const lokasiFields = document.querySelectorAll('.lokasi-field');
        const provinsiSelect = document.getElementById('provinsi');
        const kotaSelect = document.getElementById('kota');

        function toggleLokasi() {
            const tipe = tipeSelect.value;
            lokasiFields.forEach(field => {
                field.style.display = (tipe === 'remote') ? 'none' : 'block';
            });
        }

        tipeSelect.addEventListener('change', toggleLokasi);
        toggleLokasi();
        fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
            .then(response => response.json())
            .then(data => {
                data.forEach(prov => {
                    let option = document.createElement('option');
                    option.value = prov.name;
                    option.setAttribute('data-id', prov.id);
                    option.text = prov.name;
                    provinsiSelect.add(option);
                });
            });

        provinsiSelect.addEventListener('change', function() {
            const selectedOption = provinsiSelect.options[provinsiSelect.selectedIndex];
            const provId = selectedOption.getAttribute('data-id');
            kotaSelect.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';

            if (!provId) return;

            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provId}.json`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(kota => {
                        let option = document.createElement('option');
                        option.value = kota.name;
                        option.text = kota.name;
                        kotaSelect.add(option);
                    });
                });
        });
    });
</script>