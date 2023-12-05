<?= $this->extend('template/template2'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Tambah Data</button>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">nama tempat</th>
            <th scope="col">deskripsi</th>
            <th scope="col">harga</th>
            <th scope="col">Foto</th>
            <th scope="col">Jumlah</th>
            <th scope="col">tipe</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data_place as $data_tempat) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data_tempat['nama'] ?></td>
                <td><?= $data_tempat['deskripsi'] ?></td>
                <td><?= $data_tempat['harga'] ?></td>
                <td><img src="/img/foto_tempat/" <?= $data_tempat['foto'] ?> alt="" srcset=""></td>
                <td><?= $data_tempat['jml'] ?></td>
                <td><?= $data_tempat['kategori'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data tempat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tempat" action="prosestempat" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Tempat</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="harga">
                    </div>
                    <div class="mb-3" id="foto">
                        <label for="exampleInputEmail1" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto">
                        <button type="button" id="tambah_foto" onclick="addImage()">Tambah foto</button>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jumlah Ketersedian Tempat</label>
                        <input type="number" class="form-control" name="jml">
                    </div>
                    <div class="mb-3">
                        <select class="form-select form-select-sm" aria-label="Small select example" name="kategori">
                            <option selected>pilih tipe tempat</option>
                            <?php foreach ($kategori as $data_kt) : ?>
                                <option value="<?= $data_kt['id_kategori'] ?>"><?= $data_kt['kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah data</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    function addImage() {
        const container = document.getElementById('foto');

        const input = document.createElement('input');
        input.type = 'file';
        input.name = 'images[]';
        input.className = 'form-control'
        input.accept = 'image/*';

        container.appendChild(input);
    }
</script>
<?= $this->endSection(); ?>