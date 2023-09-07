<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <nav class="row navbar" id="navbar">
        <div class="col nav-link" id="nav-link">
            <a href="">Men</a>
            <a href="">Women</a>
            <a href="/produk">Product</a>
        </div>
        <div class="col nav-toggle">
            <button id="toggle"><i class="bi bi-list"></i></button>
        </div>
        <div class="col brand-nav">
            <img src="/img/brand_logo.png" alt="">
            <h6>Marmoes hope</h6>
        </div>
        <div class="col btn-nav">
            <button id="search"><i class="bi bi-search"></i></button>
            <a href=""><i class="bi bi-person-circle"></i></a>
            <a href=""><i class="bi bi-cart"></i></a>
        </div>
    </nav>
    <div class="search-form">
        <div class="form">
            <input type="text" class="form-control serch" id="exampleFormControlInput1" placeholder="Search">
        </div>
    </div>
    <?= $this->renderSection('content') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
</body>

</html>