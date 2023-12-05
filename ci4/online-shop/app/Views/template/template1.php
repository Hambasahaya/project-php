<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>thrifting-in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<!-- navbar -->

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            Thrifting-in
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto search">
                <form class="d-flex" role="search">
                    <input class="form-control me-2 nav-sc" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto user">
                <a class="nav-link" href="/cart_page/<?= session('data_user') ?>"><i class="bi bi-bag-fill"></i></a>
                <a class="nav-link" href="/order/<?= session('data_user') ?>"><i class="bi bi-box2-heart"></i></a>
                <a class="nav-link" href="/user"><i class="bi bi-person-circle"></i></a>
            </div>
        </div>
    </div>
</nav>
<!-- endnav -->
<?= $this->renderSection('content') ?>
<!-- footer -->
<div class="footer">
    <div class="container text-center">
        <div class="row align-items-baseline ftro ">
            <div class="col social-media">
                <div class="header-scm">
                    <h4>Thrifting</h4>
                </div>
                <div class="text-sc">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.quo sequi!</p>
                </div>
                <div class="icon-sc">
                    <a href=""><i class="bi bi-instagram" style="font-size: 1.2rem;"></i></a>
                    <a href=""><i class="bi bi-facebook" style="font-size: 1.2rem;"></i></a>
                    <a href=""><i class="bi bi-youtube" style="font-size: 1.2rem;"></i></a>
                    <a href=""><i class="bi bi-whatsapp" style="font-size: 1.2rem;"></i></a>
                </div>
            </div>
            <div class="col Abtu">
                <div class="header-scm">
                    <h4>About</h4>
                </div>
                <div class="link-abt">
                    <a href="">About Us</a>
                    <a href="">Location</a>
                    <a href=""> Contac service</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copy">
    <h4><i class="bi bi-c-circle"></i>Thriftingi-in</h4>
</div>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="/js/script.js"></script>
</body>

</html>