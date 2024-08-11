<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Detik</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg  p-4">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{asset('img/logo.png')}}" alt="Logo" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                <form class="search-form form-inline my-2 my-lg-0 ">
                    <input id="nav-search" class="form-control  rounded-pill" type="search" placeholder="Cari Course" value="" aria-label="Search">
                </form>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="#">All Course</a>
                    @if(!Auth::user())
                    <a class="nav-link btn btn-outline-primary" href="#" id="btn">Register</a>
                    <a class="nav-link btn btn-outline-primary" href="#" id="btn">Login</a>
                    @endif
                    @if(Auth::user())
                    <a class="nav-link btn btn-outline-primary" href="#" id="btn">Dashbord</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="p-4">
        <div class="row p-4">
            <div class="col-8 d-flex flex-column gap-4 ">
                <a class="navbar-brand" href="/">
                    <img src="{{asset('img/logo.png')}}" alt="Logo" class="d-inline-block align-text-top">
                </a>
                <div class="d-flex gap-2 social">
                    <img src="{{asset('img/facebook.png')}}" alt="" srcset="">
                    <img src="{{asset('img/instagram.png')}}" alt="" srcset="">
                    <img src="{{asset('img/twiter.png')}}" alt="" srcset="">
                    <img src="{{asset('img/youtube.png')}}" alt="" srcset="">
                    <img src="{{asset('img/linkedin.png')}}" alt="" srcset="">
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex gap-4">
                    <a href="http://">All Course</a>
                    <a href="http://">My Course</a>
                    <a href="http://">Dashbord</a>
                </div>
            </div>
        </div>
        <div class="text-center p-3">
            Copyright © 2024
            <a class="text-black" href="/">detikcom Learning. All rights reserved.</a>
        </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>