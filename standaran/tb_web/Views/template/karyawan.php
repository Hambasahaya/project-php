<?php
date_default_timezone_set("Asia/Bangkok");
?>
<div class="kasir">
    <div class="atas">
        <div class="btn-grup">
            <button class="btn" id="btn-modal">tambah Karyawan</button>
            <a href="../proses/karyawan.php/?pdf=1" class="btn">Cetak pdf</a>
        </div>
        <div class="header-tabel">
            <h4>Daftar Nama-Nama Karyawan</h4>
            <h4>Toko Super Semar</h4>
            <h4>Per Tanggal: <?= date("d F Y, H:i:s") ?></h4>
        </div>
    </div>
    <div class="tabel-kasir">
        <table>
            <tr class="tsx">
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Alamat</th>
                <th>Nomor Telpon</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            foreach ($data['karyawan'] as $data) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data["nama_user"] ?></td>
                    <td><?= $data["role"] ?></td>
                    <td><?= $data["alamat"] ?></td>
                    <td><?= $data["no_tlp"] ?></td>
                    <td><img src="../asset/img/fk/<?= $data['foto'] ?>" alt="" srcset="" width="100px" height="100px"></td>
                    <td>
                        <div class="btn-grup">
                            <a href="../proses/karyawan.php/?hapus=<?= $data['id_user'] ?>" class="btn">Hapus</a>
                        </div>
                        <form action="../page/update3.php" method="post">
                            <input type="hidden" name="id" value="<?= $data['id_user']; ?>">
                            <button name="update" class="btn">Update</button>
                        </form>
                    </td>
    </div>
    </tr>
<?php endforeach; ?>
</table>
</div>
</div>
<!-- modal -->
<div id="modal" class="modal">
    <div class="modal-box">
        <div class="judul-modal">
            <h2>Karyawan Baru</h2>
        </div>
        <div class="modal-conten">
            <form action="../proses/karyawan.php" method="POST" class="form-m" enctype="multipart/form-data">
                <div class="label">
                    <label for="">Nama Karyawan</label>
                </div>
                <div class="input">
                    <input type="text" name="nama_karyawan">
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
                <div class="label">
                    <label for="">Alamat</label>
                </div>
                <div class="input">
                    <input type="text" name="alamat">
                </div>
                <div class="label">
                    <label for="">Nomor Telfon</label>
                </div>
                <div class="input">
                    <input type="number" name="no">
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
                    <input type="text" name="username">
                </div>
                <div class="label">
                    <label for="">Password</label>
                </div>
                <div class="input">
                    <input type="password" name="password" id="pw">
                </div>
                <div class="input">
                    <input type="checkbox" onclick="show()">Tampilkan Password
                </div>

                <div class="label">
                    <label for="">foto Karyawan</label>
                </div>
                <div class="input">
                    <input type="file" name="foto" id="">
                </div>
                <button name="tambah_k">Tambah Karyawan</button>
            </form>
        </div>
        <button id="batal">Batal</button>
    </div>
</div>