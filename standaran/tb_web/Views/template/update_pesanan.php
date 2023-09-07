<div class="form">
        <form action="../proses/kasir.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <?php foreach ($data['produk_update'] as $data_prd) :?>   
        <input type="hidden" name="id_pesanan" value="<?=$data_prd['id_pesanan']?>">
            <div class="input">
                <div class="label">
                    <label for="">Nama Produk</label>
                </div>
                <div class="input-text">
                    <input type="text" name="nama_produk" value="<?=$data_prd['nama_produk']?>" id="nama_produk" disabled>
                </div>
            </div>
            <div class="input">
                <div class="label">
                    <label for="">Harga Produk</label>
                </div>
                <div class="input-text">
                    <input type="text" name="harga" value="<?=$data_prd['harga_produk']?>" id="harga" readonly>
                    <p id="error"></p>
                </div>
            </div>
            <div class="input">
                <div class="label">
                    <label for="">Jumlah beli</label>
                </div>
                <div class="input-text">
                    <input type="number" name="jml" value="<?=$data_prd['jumlah_beli']?>" id="stok">
                    <p id="error"></p>
                </div>
            </div>
            <div class="btn-sumbit">
                <button name="update">Update Pembelian!</button>
            </div>
        </form>
        <?php endforeach;?>
    </div>