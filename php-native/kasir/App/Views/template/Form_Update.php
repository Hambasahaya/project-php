<div class="form">
        <form action="<?=Base_url?>Produk/proses_update" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <?php foreach ($data["data_produk"] as $dataupdt) :?>
            <input type="hidden" name="id_produk" value="<?=$dataupdt['id_produk']?>">
            <div class="input">
                <div class="label">
                    <label for="">Nama Produk</label>
                </div>
                <div class="input-text">
                    <input type="text" name="nama_produk" value="<?=$dataupdt["nama_produk"]?>" id="nama_produk">
                </div>
            </div>
            <div class="input">
                <div class="label">
                    <label for="">Foto Produk</label>
                </div>
                <div class="input-text">
                    <input type="file" value="<?=$dataupdt['foto_produk']?>" name="foto">
                </div>
            </div>
            <div class="input">
                <div class="label">
                    <label for="">Harga Produk</label>
                </div>
                <div class="input-text">
                    <input type="number" name="harga" value="<?=$dataupdt["harga_produk"]?>" id="harga">
                    <p id="error"></p>
                </div>
            </div>
            <div class="input">
                <div class="label">
                    <label for="">Jumlah Stok</label>
                </div>
                <div class="input-text">
                    <input type="number" name="stok" value="<?=$dataupdt["jml_stok"]?>" id="stok">
                    <p id="error"></p>
                </div>
            </div>
            <div class="btn-sumbit">
                <button type="submit">Update Produk!</button>
            </div>
            <?php endforeach;?>
        </form>
    </div>