<div class="container">
    <?php if (session()->getFlashdata("pesanan")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= session()->getFlashdata("pesanan"); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata("kosong")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= session()->getFlashdata("kosong"); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata("hapus")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= session()->getFlashdata("hapus"); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata("end")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= session()->getFlashdata("end"); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <!-- end -->
    <h4 class="text-center">KASIR</h4>
    <h4 class="text-right">Total Belanja Rp.<?= number_format($total) ?></h4>
    <div class="btn-group" role="group" aria-label="Basic outlined example">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-cart"></i> Tambah Pesanan</button>
        <form action="/kasir/end" method="post">
            <button type="submit" class="btn btn-outline-success"><i class="bi bi-hourglass-bottom"></i>Proses Pesanan</button>
        </form>
    </div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <form action="/kasir/clear" method="post">
            <button class="btn btn-primary me-md-2" type="submit"><i class=" bi bi-trash3-fill"></i> Kosongkan Keranjang</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga Produk</th>
                    <th scope="col">Jumlah beli</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($datadibeli as $data) : ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $data["name"] ?></td>
                        <td>Rp.<?= $data["price"] ?></td>
                        <td><?= number_format($data["qty"]) ?></td>
                        <td>Rp.<?= number_format($data["qty"] * $data["price"]) ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <form action="/kasir/delete" method="post">
                                    <input type="hidden" name="row" value="<?= $data["rowid"] ?>">
                                    <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Pesanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/Kasir/aksi">
                    <input type="hidden" name="nomorpesanan" value="<?= rand() ?>">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pilih Barang</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="prd">
                            <?php foreach ($dataprd as $data) : ?>
                                <?php if ($data["stok"] > 0) : ?>
                                    <option value="<?= $data["id_produk"] ?>"><?= $data["nama_prd"] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Jumlah dibeli</label>
                        <input type="number" class="form-control" name="jml">
                    </div>
                    <button type="submit" class="btn btn-primary">Proses Pesanan!</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>