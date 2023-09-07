<div class="container">
    <!-- hapus alert -->
    <?php if (session()->getFlashdata("addprd")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= session()->getFlashdata("addprd"); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <!-- end -->
    <!-- hapus alert -->
    <?php if (session()->getFlashdata("delprd")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= session()->getFlashdata("delprd"); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <!-- end -->
    <!-- hapus alert -->
    <?php if (session()->getFlashdata("editprd")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= session()->getFlashdata("editprd"); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <!-- end -->
    <div class="btn-group" role="group" aria-label="Basic outlined example">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-person-plus"></i> Tambah produk</button>
        <a href="http:/Admin/endcetak" class="btn btn-outline-success"><i class="bi bi-arrow-down-square-fill"></i> Download Data</a>
    </div>
    <div class="table-responsive">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga Produk</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Jumlah Stok</th>
                    <th scope="col">Opsi</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($dataprd as $data) : ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $data["nama_prd"] ?></td>
                        <td>Rp.<?= number_format($data["harga_prd"]) ?></td>
                        <td>Rp.<?= number_format($data["harga_beli"]) ?></td>
                        <?php if ($data["stok"] == 0) : ?>
                            <td>STOK HABIS!!</td>

                        <?php else : ?>
                            <td><?= $data["stok"] ?>
                            <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <form action="/Admin/prd/<?= $data["id_produk"] ?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-outline-danger"><i class="bi bi-x-octagon-fill"> Hapus</i></button>
                                    </form>
                                    <a href="/Admin/editprd/<?= $data["id_produk"]; ?>" type="button" class="btn btn-outline-warning"><i class="bi bi-magic"></i> Edit</a>
                                </div>
                            </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Karyawan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="/Admin/addprd" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama produk</label>
                            <input type="text" class="form-control" required name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Harga Jual</label>
                            <input type="text" class="form-control" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Harga Beli</label>
                            <input type="text" class="form-control" name="beli" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jumlah Stok</label>
                            <input type="number" class="form-control" name="stok" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Suplaier:</label>
                            <input type="text" class="form-control" required name="supel">
                        </div>
                        <button type="submit" class="btn btn-primary">Proses Data!</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<script>
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>