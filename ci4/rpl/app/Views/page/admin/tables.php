<?= $this->extend('template/template_admin'); ?>

<?= $this->section('konten') ?>
<table class="table table-light table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Nim</th>
            <th scope="col">jurusan</th>
            <th scope="col">fakultas</th>
            <th scope="col">jenis Kelamin</th>
            <th scope="col">email</th>
            <th scope="col">No telphone</th>
            <th scope="col">foto</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $no = 1;
            foreach ($data_pendaftar as $fakultas) : ?>
                <td><?= $no++ ?></td>
                <td><?= $fakultas['nama_pendaftar'] ?></td>
                <td><?= $fakultas['nim_pendaftar'] ?></td>
                <td><?= $fakultas['nama_jurusan'] ?></td>
                <td><?= $fakultas['nama_fakultas'] ?></td>
                <td><?= $fakultas['jk'] ?></td>
                <td><?= $fakultas['email'] ?></td>
                <td><?= $fakultas['no_tlp'] ?></td>
                <td><img src="/foto_pendafar/<?= $fakultas['foto'] ?>" alt="" width="50vh" height="50vh"></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <a href="/admin/<?= $fakultas['nim_pendaftar'] ?>" class="btn btn-outline-primary">Hapus</a>
                        <a href="/admin/verif/<?= $fakultas['nim_pendaftar'] ?>" class="btn btn-outline-primary">terima</a>
                    </div>
                </td>
            <?php endforeach; ?>
        </tr>
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Fakultas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Fakultas</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
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
<?= $this->endSection() ?>