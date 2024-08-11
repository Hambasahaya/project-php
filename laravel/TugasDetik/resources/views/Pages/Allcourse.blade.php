@extends('Layout.UsersLayout')
@section('content')
<section id="Course">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Course</li>
            </ol>
        </nav>
        <div class="row gap-4">
            <div class="col-4 img-course-content rounded-4 p-4" style="background-color: rgba(132, 100, 157, 0.8)">
                <img src="{{asset('img/Course.jpg')}}" alt="" class="img-course  mx-auto d-block ">
            </div>
            <div class="col-7 p-2">
                <h4 style="font-size: 35px; font-family:Bebas Neue, sans-serif;font-weight: 700;">Semua Course</h4>
                <p style="color: gray;">30 Topik Pembelajaran</p>
                <h5 style=" font-family:Poppins, sans-serif;font-weight:200;">Lihat semua topik pembelajaran dari beragam kategori detikLearning disini!</h5>
            </div>
        </div>
    </div>
    </div>
</section>
<section id="listCourse">
    <div class="container">
        <div class="container ">
            <div class="row filter">
                <div class="col-8 d-flex gap-2 p-4 align-items-center">
                    <i class="bi bi-sort-down-alt" style="font-size: 1.7rem;"></i>
                    <h4>Sort By:</h4>
                    <div class="dropdown-center">
                        <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Terbaru
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Terbaru</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Terlama</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Abjad A | Z</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Terbesar</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Terkecil</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-4 d-flex align-items-center">
                    <form class="search-form form-inline my-2 my-lg-0 ">
                        <input id="nav-search" class="form-control  rounded-pill" type="search" placeholder="Cari Course" value="" aria-label="Search">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cols-4 p-4 list-course">
        @for($i=0;$i<30;$i++)
            <div class="col mt-4">
            <div class="card p-3 gap-4 rounded-5" style="width: 20rem;">
                <img src="{{asset('img/card1.png')}}" class="card-img-top rounded-4" alt="...">
                <div class="card-body p-0">
                    <h5 class="card-title">Spreadsheet Introduction for Professional User</h5>
                    <p class="card-text">
                        Kursus "Spreadsheet Introduction for Professional User" ini dirancang untuk memberikan pemahaman tentang penggunaan dasar Google Spreadsheet bagi pengguna spreadsheet tingkat pemula hingga menengah ya...
                    </p>
                    <p class="card-text">
                        7 Meteri
                    </p>
                </div>
            </div>
    </div>
    @endfor
    </div>
</section>
@endSection