<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Helth Bridge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/asset/css/style.css">
</head>

<body>
    <!-- users pages -->
    <div class="userpages">
        <div class="top d-flex justify-content-between">
            <img src="/asset/img/Group2222.svg" alt="" width="80vh">
            <img src="/asset/img/logo.png" alt="" width="10%">
        </div>
        @yield("usercontent")
        <nav class="navbar fixed-bottom ">
            <div class="navbar-nav flex-row mx-auto gap-4">
                <a class="nav-link d-flex flex-column align-items-center" aria-current="page" href="/user">
                    <i class="bi bi-house-heart" style="font-size: 1.3rem;"></i>
                    <p>Beranda</p>
                </a>
                <a class="nav-link d-flex flex-column align-items-center" aria-current="page" href="/layanan">
                    <i class="bi bi-hospital" style="font-size: 1.3rem;"></i>
                    <p>Layanan</p>
                </a>
                <a class="nav-link d-flex flex-column align-items-center" aria-current="page" href="/notifikasi">
                    <i class="bi bi-bell-fill" style="font-size: 1.3rem;"></i>
                    <p>Notifikasi</p>
                </a>
                <a class="nav-link d-flex flex-column align-items-center" aria-current="page" href="/useracc">
                    <i class="bi bi-person-circle" style="font-size: 1.3rem;"></i>
                    <p>Akun</p>
                </a>
            </div>
        </nav>
    </div>
    <!-- enduserpages -->
    <script type="text/javascript" src="/asset/js/vanilla-tilt.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/asset/js/srcript.js"></script>
</body>

</html>