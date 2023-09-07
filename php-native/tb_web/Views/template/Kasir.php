<?php
$total_belaja = 0;
$total = $data['data_pesanan'];
foreach ($total as $todd)
    $total_belaja += $todd['subtot'];
?>

<?php if (isset($_SESSION["flash"])) : ?>
    <div class="alert-flash" id="flash">
        <div class="pesan-alert">
            <h4><?= $_SESSION["flash"]; ?></h4>
            <?php unset($_SESSION["flash"]); ?>
            <div class="btn-close-flash">
                <button id="close-flash"><i class="bi bi-x-square"></i></button>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="kasir">
    <div class="atas">
        <div class="btnk">
            <button id="btn-modal" class="btn">Tambah Belanja</button>
            <form action="../proses/kasir.php" method="post">
                <input type="hidden" name="id_ptgs" value="<?= $_SESSION['id_user'] ?>">
                <input type="hidden" name="total" value="<?= $total_belaja ?>">
                <button type="submit" name="chekout" class="btn">proses Pesanan!</button>
            </form>
        </div>
        <div class="total">
            <h4>total Belanja anda:<?= "Rp." . number_format($total_belaja) ?></h4>
        </div>
    </div>
    <div class="tabel-kasir">
        <table>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Jumlah Dibeli</th>
                <th>Sub Total</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            foreach ($data['data_pesanan'] as $data_psn) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data_psn["nama_produk"] ?></td>
                    <td>Rp.<?= number_format($data_psn["harga_produk"]) ?></td>
                    <td><?= $data_psn["qty"] ?></td>
                    <td>Rp.<?= number_format($data_psn["subtot"]); ?></td>
                    <td>
                        <div class="btn-grup">
                            <a href="../proses/kasir.php/?hapus_psn=<?= $data_psn['id_pesanan'] ?>" class="btn">Hapus</a>
                            <form action="../page/update2.php" method="post">
                                <input type="hidden" name="update" value="<?= $data_psn['id_pesanan'] ?>">
                                <button class="btn">Update Pesanan</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<!-- modal1 -->
<div id="modal" class="modal">
    <div class="modal-box">
        <div class="judul-modal">
            <h2>Tambah Pesanan</h2>
        </div>
        <div class="modal-conten">
            <form action="../proses/kasir.php" method="post" class="form-m">
                <input type="hidden" name="id_petugas" value="<?= (int)$_SESSION['id_user'] ?>">
                <div class="label">
                    <label for="">Pilh Produk:</label>
                </div>
                <div class="input">
                    <select name="produk" id="">
                        <?php foreach ($data['data_produk'] as $data_prd) : ?>
                            <option value="<?= (int)$data_prd['id_produk'] ?>"><?= $data_prd['nama_produk'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="label">
                    <label for="">Jumlah Ingin Dibeli</label>
                </div>
                <div class="input">
                    <input type="number" name="jml" id="">
                </div>
                <button name="simpan_pesanan">Add Pesanan</button>
            </form>
        </div>
        <button id="batal">Batal</button>
    </div>
</div>