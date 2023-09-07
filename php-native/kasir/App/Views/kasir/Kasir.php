<div class="kasir">
        <div class="atas">
            <div class="btnk">
            <button id="btn-modal">Tambah Belanja</button>
            </div>
            <div class="total">
            <h4>Total Belanja:</h4>
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
                $no=1;
                foreach ($data['pesanan'] as $datapp) :?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$datapp['nama_produk'];?></td>
                    <td>Rp.<?=number_format($datapp['harga_produk']);?></td>
                    <td><?=$datapp['jumlah_beli']?></td>
                    <td>Rp.<?=number_format($datapp['subtotal'])?></td>
                    <td>
                        <div class="btn-grup">
                            <a href="<?= Base_url?>App_Kasir/update/<?=$datapp['id_pesanan']?>" class="btn">Update</a>
                            <a href="<?= Base_url?>App_Kasir/hapus/<?=$datapp['id_pesanan']?>" class="btn">Hapus</a>
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
          <h2>Tambah Pesanan</h2>
          </div>
          <div class="modal-conten">
          <form action="<?=Base_url?>App_Kasir/Add_produk" method="post" class="form-m">
            <input type="hidden" name="id_petugas" value="1">
            <div class="label">
                <label for="">Pilh Produk:</label>
            </div>
            <div class="input">
                <select name="produk" id="">
                    <?php foreach ($data['produk'] as $data_prd) :?>                  
                    <option value="<?=$data_prd['id_produk']?>"><?=$data_prd['nama_produk']?></option> 
                    <?php endforeach;?>                 
                </select>
            </div>
            <div class="label">
                <label for="">Jumlah Ingin Dibeli</label>
            </div>
            <div class="input">
               <input type="number" name="jml" id="">
            </div>
            <button name="submit">Add Pesanan</button>
          </form>
        </div>
        <button id="batal">Batal</button>
      </div>
    </div>
