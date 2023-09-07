<?php
if(isset($_SESSION['add_prd'])):?>

<div class="flash" id="flash">
    <div class="flash-mesege">
        <h4><?=$_SESSION['add_prd']?></h4>
    </div>
    <div class="close">
    <i class="bi bi-x-circle" style="font-size: 1.5rem; color: red; border:2px solid black; margin:2px;padding:3px;box-sizing:border-box;" id="btn-fls"></i>
    </div>
</div>
<?php endif;?>
<div class="kasir">
        <div class="atas">
            <div class="btnk">
            <button id="btn-modal">Tambah Produk</button>
            </div>
            <div class="total">
            <div class="btn-grup">
                            <a href="<?=Base_url?>Produk/pdf" class="btn">Cetak Pdf</a>
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
                $no=1;
                foreach ($data["prd"] as $data):?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$data['nama_produk']?></td>
                    <td><img src="<?=Base_url.'fp/'.$data['foto_produk']?>" alt="" srcset="" width="100px" height="100px"></td>
                    <td>Rp.<?=number_format($data['harga_produk'])?></td>
                    <td><?=$data['jml_stok']?></td>
                    <td>
                        <div class="btn-grup">
                            <a href="<?= Base_url?>Produk/update/<?=$data['id_produk']?>" class="btn">Update</a>
                            <a href="<?= Base_url?>Produk/hapus/<?=$data['id_produk']?>" class="btn">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach;?>
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
          <form action="<?=Base_url?>Produk/add" method="post" class="form-m" enctype="multipart/form-data"> 
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
            <button name="submit">Add Pesanan</button>
          </form>
        </div>
        <button id="batal">Batal</button>
      </div>
    </div>