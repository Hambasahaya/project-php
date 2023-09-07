<div class="kasir">
    <div class="tabel-kasir">
        <table>
            <tr>
                <th>No</th>
                <th>Nomor transaksi</th>
                <th>Nama barang</th>
                <th>jumlah beli</th>
                <th>subtotal</th>
            </tr>
            <?php
            $no = 1;
            foreach ($data["data_pembelian"] as $datas) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $datas["nomor_transaksi"] ?></td>
                    <td><?= $datas["nama_produk"] ?></td>
                    <td><?= $datas['qty'] ?></td>
                    <td>Rp.<?= number_format($datas['subtot']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>