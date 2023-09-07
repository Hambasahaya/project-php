
    <div class="tabel">
        <a href="<?=Base_url?>Karyawan/add" class="btn-add">Tambah Karyawan</a>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Alamat</th>
                <th>Nomor Telpon</th>
                <th>Foto</th>
                <th>Aksi</th>

            </tr>
            <?php 
            $no=1;
            foreach ($data['karyawan'] as $data) :?>
            <tr>
            <td><?=$no++?></td>
            <td><?=$data["nama_user"]?></td>
            <td><?=$data["role"]?></td>
            <td><?=$data["alamat"]?></td>
            <td><?=$data["no_tlp"]?></td>
        </tr>
        <?php endforeach;?>
        </table>
</div>
