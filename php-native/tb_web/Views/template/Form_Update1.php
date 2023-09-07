<div class="form">
    <form action="../proses/karyawan.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <?php foreach ($data["data_pegawai"] as $dataupdt) : ?>
            <input type="hidden" name="id_karyawan" value="<?= $dataupdt['id_user'] ?>">
            <input type="hidden" name="foto" value="<?= $dataupdt['foto'] ?>">
            <div class="label">
                <label for="">Nama Karyawan</label>
            </div>
            <div class="input">
                <input type="text" name="nama_karyawan" value="<?= $dataupdt['nama_user'] ?>">
            </div>
            <div class="label">
                <label for="">Jenis Kelamin</label>
            </div>
            <div class="input">
                <select name="jk" id="">
                    <option value="1">laki-laki</option>
                    <option value="2">perempuan</option>
                </select>
            </div>
            <div class=" label">
                <label for="">Alamat</label>
            </div>
            <div class="input">
                <input type="text" name="alamat" id="" value="<?= $dataupdt['alamat'] ?>">
            </div>
            <div class="label">
                <label for="">Nomor Telfon</label>
            </div>
            <div class="input">
                <input type="number" name="no" id="" value="<?= $dataupdt['no_tlp'] ?>">
            </div>
            <div class="label">
                <label for="">Role</label>
            </div>
            <div class="input">
                <select name="Role">
                    <option value="1">Admin</option>
                    <option value="2">Kasir</option>
                </select>
            </div>
            <div class="label">
                <label for="">Username</label>
            </div>
            <div class="input">
                <input type="text" name="username" id="" value="<?= $dataupdt['username'] ?>">
            </div>
            <div class="label">
                <label for="">Password</label>
            </div>
            <div class="input">
                <input type="password" name="password" id="" value="<?= $dataupdt['password'] ?>">
            </div>
            <div class="label">
                <label for="">foto Karyawan</label>
            </div>
            <div class="input">
                <input type="file" name="foto" id="">
            </div>
            <button name="update_k">Update Karyawan</button>
    </form>
<?php endforeach; ?>
</form>
</div>