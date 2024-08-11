@extends("Layout.UsersLayout")
@section('content')
<div class="container hero">
    <div class="row align-items-start align-content-center">
        <div class="col d-flex flex-column align-content-center g-8">
            <div class="d-flex ">
                <h3>Upgrade Dirimu, Upgrade Karirmu!</h3>
                <img src="{{asset('img/rocket.png')}}" alt="" width="50" height="50">
            </div>
            <h6 class="px-2">Belajar bersama detikcom kapan pun dan dimana pun!</h6>
            <a href="http://" class="btn btn-outline-primary">Mulai Belajar Sekarang!</a>
        </div>
        <div class="col d-flex flex-column align-content-center justify-content-center align-items-center">
            <img src="{{asset('img/hero.png')}}" alt="">
        </div>
    </div>
</div>
<div class="kelas">
    <div class="row newkelas">
        <div class="col-4 newkelastagline">
            <h4>Kelas Terbaru</h4>
            <p>Temukan ilmu baru dengan berbagai judul kelas terbaru di detikLearning!</p>
            <a href="http://" class="btn btn-outline-primary">Lihat Semua</a>
        </div>
        <div class="col-7 p-4 bg-white rounded-4">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @for($i=0;$i<10;$i++)
                        <div class="swiper-slide">
                        <div class="row card-kelas">
                            <div class="col-6">
                                <img src="{{asset('img/card1.png')}}" alt="" srcset="" class="rounded-4 w-100">
                            </div>
                            <div class="col-6">
                                <h4>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore, fugiat?
                                </h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni dicta explicabo minus repellat ducimus? Reiciendis autem, doloremque sed dolore facilis magnam? Nulla vero officiis maiores distinctio aspernatur, ducimus ipsum inventore
                                </p>
                            </div>
                        </div>
                </div>
                @endfor
            </div>
            <br>
            <div class="swiper-pagination pt-2"></div>
        </div>
    </div>
</div>
</div>
<div class="kategori d-flex align-items center align-content-center justify-content-center flex-column p-4">
    <h4 class="text-center number">Berbagai Macam Kategori</h4>
    <h5 class="text-center">Eksplor berbagai kelas inspiratif di setiap kategori</h5>
    <div class="kategori-items">
        <div class="swiper mySwiper2">
            <div class="swiper-wrapper">
                <a href="" class="swiper-slide">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Businnes</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Businnes Related courses</h6>
                        </div>
                    </div>
                </a>
                <a href="" class="swiper-slide">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">content</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">content Related courses</h6>
                        </div>
                    </div>
                </a>
                <a href="" class="swiper-slide">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Corporate</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Corporate Related courses</h6>
                        </div>
                    </div>
                </a>
                <a href="" class="swiper-slide">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Produxt</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Produxt Related courses</h6>
                        </div>
                    </div>
                </a>
                <a href="" class="swiper-slide">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">self-development</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">self-development Related courses</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
<div class="featured-content text-center">
    <div class="container">
        <div class="row align-items-center feature">
            <h4 class="number">Only for detikcom</h4>
            <div class="col">
                <h4 class="number">1000+</h4>
                <h5>Employees
                    Learners</h5>
            </div>
            <div class="col">
                <h4 class="number">40+</h4>
                <h5>Amazing
                    Classes</h5>
            </div>
            <div class="col">
                <h4 class="number">160+</h4>
                <h5>Amazing
                    Videos</h5>
            </div>
        </div>
    </div>
</div>

@endSection