
    <!-- form register -->
    <div class="container">
        <form action="<?=Base_url?>Karyawan/proses" class="form" enctype="multipart/form-data">
            <div class="header">
                <h4>Biodata Pegawai Baru</h4>
            </div>
            <div class="input">
                <label class="lebel" for="">Nama Pegawai</label>
                <input type="text" name="nama">
            </div>
            <div class="input">
                <label class="lebel" for="">Jenis Kelamin</label>
                <select name="" id="jk">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="input">
                <label class="lebel" for="">Alamat</label>
                <input type="text" name="" id="fakultas">
            </div>
            <div class="input-foto">
                <label class="lebel" for="">Foto</label>
                <input type="file" name="foto" id="foto">
            </div>
            <div class="input">
                <label class="lebel" for="">Nomor Telpon</label>
                <input type="number" name="nomor" id="jurusan">
            </div>
            <div class="input">
                <label class="lebel" for="">Jabatan</label>
                <select name="jabatan" id="">
                    <option value="">Pilih Jabatan</option>
                    <option value="Admin">Admin</option>
                    <option value="Kasir">Kasir</option>
                </select>
            </div>
            <div class="input">
                <label class="lebel" for="">Username</label>
                <input type="text" name="Username" id="fakultas">
            </div>
            <div class="input">
                <label class="lebel" for="">Pasword</label>
                <input type="password" name="" id="fakultas">
            </div>
            <div class="btn">
                <button type="submit">Daftar!</button>
            </div>
         </form>
</div>