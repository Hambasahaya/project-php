<?php require_once '../core/function.php'; ?>
<div class="kasir">
    <div class="atas">
        <div class="btn-grup">
            <button id="btn-modal" class="btn">Tambah Produk</button>
        </div>
        <div class="total">
            <div class="btn-grup">
                <a href="Produk/pdf" class="btn">Cetak Pdf</a>
                <a href="" class="btn">Cetak Execl</a>
            </div>
        </div>
    </div>
    <div class="tabel-kasir">
        <table>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Foto</th>
                <th>Harga Produk</th>
                <th>Jumlah Stok</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            foreach ($data["data_produk"] as $data) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_produk'] ?></td>
                    <td><img src="../asset/img/fp/<?= $data['foto_produk'] ?>" alt="<?= $data["foto_produk"] ?>" srcset="" width="100px" height="100px"></td>
                    <td>Rp.<?= number_format($data['harga_produk']) ?></td>
                    <td><?= $data['jml_stok'] ?></td>
                    <?php
                    if ($_SESSION["role"] == "admin") : ?>
                        <td>
                            <div class="btn-grup">
                                <a href="../proses/produk.php/?hapus=<?= $data['id_produk'] ?>" class="btn">Hapus</a>
                            </div>
                            <form action="../page/updete1.php" method="post">
                                <input type="hidden" name="id" value="<?= $data['id_produk']; ?>">
                                <button name="update" class="btn">Update</button>
                            </form>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<!-- modal -->
<div id="modal" class="modal">
    <div class="modal-box">
        <div class="judul-modal">
            <h2>Data Produk Baru</h2>
        </div>
        <div class="modal-conten">
            <form action="../proses/produk.php" method="POST" class="form-m" enctype="multipart/form-data">
                <input type="hidden" value="" name="id_produk">
                <div class="label">
                    <label for="">Nama Produk</label>
                </div>
                <div class="input">
                    <input type="text" name="nama_produk" id="">
                </div>
                <div class="label">
                    <label for="">Harga Produk</label>
                </div>
                <div class="input">
                    <input type="number" name="harga" id="">
                </div>
                <div class="label">
                    <label for="">Stok Masuk</label>
                </div>
                <div class="input">
                    <input type="number" name="stok" id="">
                </div>
                <div class="label">
                    <label for="">foto Produk</label>
                </div>
                <div class="input">
                    <input type="file" name="foto" id="">
                </div>
                <button name="simpan">Tambah Produk</button>
            </form>
        </div>
        <button id="batal">Batal</button>
    </div>
</div>