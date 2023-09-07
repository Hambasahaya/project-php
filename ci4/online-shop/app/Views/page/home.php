<?= $this->extend('template/layout'); ?>

<?= $this->section('content') ?>
<div class="jumbotron">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner ms-auto">
            <div class="carousel-item active">
                <img src="/img/1.jpeg" class="d-block   border rounded" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/2.jpeg" class="d-block  border rounded" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/3.jpeg" class="d-block   border rounded" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/4.jpeg" class="d-block   border rounded" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<div class="container">
    <div class="section-home" id="newin">
        <div class="header-section">
            <h4>New product's</h4>
        </div>
        <div class="produk-new">
            <?php for ($i = 0; $i < 8; $i++) : ?>
                <div class="card">
                    <div class="card-header">
                        <img src="/img/prd1.jpg" alt="" class="img-card">
                    </div>
                    <div class="card-content">
                        <div class="product-name">
                            <h5> Lorem, ipsum dolor.</h5>
                        </div>
                        <div class="produk-price">
                            <h6>IDR.15000</h6>
                        </div>
                        <div class="card-action">
                            <button class="add-card" id="add-cart"><i class="bi bi-minecart"></i></button>
                            <button class="add-whislist" id=add-whislist><i class="bi bi-bag-heart-fill"></i></button>
                        </div>
                    </div>
                </div>
            <?php endfor ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>