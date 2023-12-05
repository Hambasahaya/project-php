<?= $this->extend("template/template1") ?>

<?= $this->section("content") ?>;
<div class="order-list">
  <table class="table">
    <thead class="table-light">
      <tr>
        <th scope="col">#Order id</th>
        <th scope="col">Date</th>
        <th scope="col">Total</th>
        <th scope="col">Status Payment</th>
        <th scope="col">Status Order</th>
        <th scope="col">Detail order</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($order_list as $order) : ?>
        <tr>
          <th scope="row"><?= $order["nomor_transaksi"] ?></th>
          <td><?= $order["tangal_transaksi"] ?></td>
          <td>Rp.<?= number_format($order["total"]) ?></td>
          <td>
            <?= $order["status_pembayaran"] ?><br>
            <?php if ($order["status_pembayaran"] == "menunggu pembayaran") : ?>

              <a href="https://app.sandbox.midtrans.com/snap/v2/vtweb/<?= $order["lnk"] ?> " class="btn btn-success">Bayar</a>
            <?php endif; ?>
          </td>
          <td><?= $order["status_pengriman"] ?></td>
          <td><a href="/detail_tr/<?= $order["id_transaksi"] ?>" class="btn btn-success">Detail Transaksis</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?= $this->endSection() ?>;