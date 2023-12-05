<?= $this->extend('template/template1'); ?>
<?= $this->section('content') ?>
<div class="box-content">
    <div class="container">
        <div class="menu-link d-flex">
            <button><i class="bi bi-columns-gap"></i><?= $new_produk_sum ?> New produk</button>
            <button><a href="/produk_page"><i class="bi bi-boxes"></i><?= $new_produk_sum ?> Produk</a></button>
        </div>
        <div class="prd-new">
            <h4>New Product's</h4>
            <div class="produk">
                <?php foreach ($new_produk as $data_prd) : ?>
                    <div class="card m-4" style="width:20rem;">
                        <img src="<?= $data_prd['photo_prd'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data_prd['name_product'] ?></h5>
                            <h5 class="card-title"><?= $data_prd['stok'] ?></h5>
                            <p class="card-text"><?= $data_prd['price'] ?></p>
                            <button type="button" class="send-data btn btn-primary" data-product-id="<?= $data_prd['id_product'] ?>"><i class="bi bi-bag-heart"></i></button>
                            <a href="/singgle_page/<?= $data_prd['id_product'] ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>