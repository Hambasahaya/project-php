<div class="kasir">
    <div class="atas">
        <div class="btn-grup">
        </div>
    </div>
    <div class="tabel-kasir">
        <table>
            <tr>
                <th>Nomor Transaksi</th>
                <th>Nama Petugas</th>
                <th>Total Belanja</th>
                <th>Tanggal Transaksi</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            foreach ($data["data_transaksi"] as $datas) : ?>
                <tr>
                    <td><?= $datas["nomor_transaksi"] ?></td>
                    <td><?= $datas['nama_user'] ?></td>
                    <td>Rp.<?= number_format($datas['total_belanja']) ?></td>
                    <td><?= $datas['tanggal_pembelian'] ?></td>
                    <td>
                        <div class="btn-grup">
                            <form action="../page/detail.php" method="post">
                                <input type="hidden" name="detail" value="<?= intval($datas["nomor_transaksi"]) ?>">
                                <button class="btn">Lihat detail</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>