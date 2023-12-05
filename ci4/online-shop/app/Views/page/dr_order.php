<?= $this->extend("template/template1") ?>

<?= $this->section("content") ?>;
<div class="order-list">
    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">No transaksi</th>
                <th scope="col">Product Name</th>
                <th scope="col">Image Produk</th>
                <th scope="col">Price</th>
                <th scope="col">QTY</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order_dt as $order) : ?>
                <tr>
                    <th scope="row"><?= $order["id_transaksi"] ?></th>
                    <td><?= $order["name_product"] ?></td>
                    <td><img src="<?= $order["photo_prd"] ?>" alt="" srcset="" width="50"></td>
                    <td>Rp.<?= number_format(intval($order["price"])) ?></td>
                    <td><?= $order["qty"] ?></td>
                    <td>Rp.<?= number_format(intval($order["subtotal"])) ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection();
