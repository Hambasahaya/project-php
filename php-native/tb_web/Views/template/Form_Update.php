<div class="form">
    <form action="../proses/produk.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <?php foreach ($data["data_prd"] as $dataupdt) : ?>
            <input type="hidden" name="id_produk" value="<?= $dataupdt['id_produk'] ?>">
            <input type="hidden" name="foto" value="<?= $dataupdt['foto_produk'] ?>">
            <div class="input">
                <div class="label">
                    <label for="">Nama Produk</label>
                </div>
                <div class="input-text">
                    <input type="text" name="nama_produk" value="<?= $dataupdt["nama_produk"] ?>" id="nama_produk">
                </div>
            </div>
            <div class="input">
                <div class="label">
                    <label for="">Foto Produk</label>
                </div>
                <div class="input-text">
                    <input type="file" value="<?= $dataupdt['foto_produk'] ?>" name="foto">
                </div>
            </div>
            <div class="input">
                <div class="label">
                    <label for="">Harga Produk</label>
                </div>
                <div class="input-text">
                    <input type="number" name="harga" value="<?= $dataupdt["harga_produk"] ?>" id="harga">
                    <p id="error"></p>
                </div>
            </div>
            <div class="input">
                <div class="label">
                    <label for="">Jumlah Stok</label>
                </div>
                <div class="input-text">
                    <input type="number" name="stok" value="<?= $dataupdt["jml_stok"] ?>" id="stok">
                    <p id="error"></p>
                </div>
            </div>
            <div class="btn-sumbit">
                <button type="update" name="update">Update Produk!</button>
            </div>
        <?php endforeach; ?>
    </form>
</div>