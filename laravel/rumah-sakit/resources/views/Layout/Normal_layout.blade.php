<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Helth Bridge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/asset/css/style.css">
</head>

<body>
    <!-- Top Nav -->
    <div class="topnav d-flex">
        <a href="/login" type="button" class="btn btn-primary btn-sm">Sign in</a>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/asset/img/logo.png" alt="Logo" width="60%" height="60%" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mitra_pages')}}">Mitra</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">Tentang Kami</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('layanan') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Layanan Kesehatan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('layanan') }}">Klinik</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('layanan') }}">Puskesmas</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('layanan') }}">Rumah Sakit</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contac">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('Home')
    <div class="mainpage d-flex flex-column">
        @yield('content')
    </div>

    <footer class="text-center text-lg-start text-white" style="background-color: #40A2E3" id="contac">
        <div class="container p-4 pb-0">
            <section class="">
                <div class="row">
                    <div class="col d-flex flex-column justify-content-center">
                        <p>
                            Akses Mudah untuk kesehtan anda!<br>
                            Jika Anda memiliki pertanyaan atau <br>memerlukan informasi lebih lanjut,<br> jangan ragu untuk menghubungi kami :
                        </p>
                    </div>
                    <hr class="w-100 clearfix d-md-none" />
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Layanan Kesahatan</h6>
                        <p>
                            <a class="text-white">Klinik</a>
                        </p>
                        <p>
                            <a class="text-white">Rumah Sakit</a>
                        </p>
                        <p>
                            <a class="text-white">Puskesmas</a>
                        </p>
                        <p>
                            <a class="text-white">Obat-obatan</a>
                        </p>
                    </div>
                    <hr class="w-100 clearfix d-md-none" />
                    <hr class="w-100 clearfix d-md-none" />
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                        <p><i class="bi bi-geo mr-3"></i>Jl. Cempaka Lestari III No.63 Blok G, RT.13/RW.7, Lb. Bulus, Kec. Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12440
                        </p>
                        <p><i class="bi bi-envelope-at-fill mr-4"></i> healthbridge@gmail.com </p>
                        <p><i class="bi bi-telephone-outbound-fill mr-4"></i>+62-822-5678-9076</p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="https://www.instagram.com/h_uda.344/" role="button"><i class="bi bi-meta"></i> Health Bridge</a>
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #ff38ac" href="https://www.instagram.com/vivieldh20/" role="button"><i class="bi bi-instagram">Health Bridge</i></a>
                    </div>
                </div>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2024 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">Healthbridge</a>
        </div>
    </footer>

    <script src="/asset/js/srcript.js"></script>
    <script type="text/javascript" src="/asset/js/vanilla-tilt.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>