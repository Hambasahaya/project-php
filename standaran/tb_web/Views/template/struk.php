<?php
date_default_timezone_set("Asia/Bangkok");
$nomor_transaksi = rand(123, 456);
?>
<div class="table-str">
    <div class="header-str">
        <h4>Toko Super Semar</h4>
        <p>Jalan Cendana nomor 6-8, Menteng, Jakarta Pusat</p>
        <hr>
        <p>tanggal transaksi:<?= date("d F Y, l, H:i:s") ?></p>
        <p>Nomor transaksi:<?= $nomor_transaksi ?></p>
    </div>
    <div class="table-beli">
        <table class="str">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah Beli</th>
                <th>Sub Total</th>
            </tr>
            <?php
            $no = 1;
            foreach ($data['data_pesanan'] as $data_pss) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data_pss['nama_produk'] ?></td>
                    <td>Rp.<?= number_format($data_pss['harga_produk']) ?></td>
                    <td><?= $data_pss['qty'] ?></td>
                    <td>Rp. <?= number_format($data_pss['subtot']) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <div class="total">
        <h4>Total Belanja:Rp.<?= number_format($data["total_b"]) ?></h4>

    </div>
</div>
<div class="cetak-str">
    <a href="http://localhost/tb_web/page/kasir.php">Tambah</a>
    <button id="btn-modal">Cetak & kirim</button>
    <form action="../proses/kasir.php" method="post">
        <?php
        foreach ($data['data_pesanan'] as $datap) : ?>
            <input type="hidden" name="petugas" value="<?= (int)$datap["id_petugas"] ?>">
        <?php endforeach; ?>
        <input type="hidden" name="total" value="<?= $data['total_b'] ?>">
        <input type="hidden" name="nomor_t" value="<?= $nomor_transaksi ?>">
        <button type="submit" name="cetak_s">Cetak Struk</button>
    </form>
</div>


<!-- modal -->
<div id="modal" class="modal">
    <div class="modal-box">
        <div class="judul-modal">
            <h2>kirim Struk</h2>
        </div>
        <div class="modal-conten">
            <form action="../proses/kasir.php" method="POST" class="form-m" enctype="multipart/form-data">
                <?php
                foreach ($data['data_pesanan'] as $datap) : ?>
                    <input type="hidden" name="petugas" value="<?= $datap["id_petugas"] ?>">
                <?php endforeach; ?>
                <input type="hidden" name="total" value="<?= $data['total_b'] ?>">
                <input type="hidden" name="nomor_t" value="<?= $nomor_transaksi ?>">
                <div class="label">
                    <label for="">Alamat Email:</label>
                </div>
                <div class="input">
                    <input type="text" name="email">
                </div>
                <button name="kirim">Cetak dan kirim!</button>
            </form>
        </div>
        <button id="batal">Batal</button>
    </div>
</div>