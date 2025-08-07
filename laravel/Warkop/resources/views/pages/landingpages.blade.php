@extends('Layouts.template')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<section id="hero1" class="hero section-warkop">
    <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
            <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Nikmati Kopi dan <br>Hidangan Lezat di <br>Warkop Stiga</h1>
                <p data-aos="fade-up" data-aos-delay="100">Kami adalah tim yang berdedikasi untuk menciptakan pengalaman terbaik di warkop dengan suasana nyaman dan pelayanan ramah</p>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="#menu" class="btn-get-started">Menu</a>

                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <img src="/assets/img/logo-putih.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section>
<section id="about" class="about section">

    <div class="container section-title" data-aos="fade-up">
        <h2>About Us<br></h2>
        <p><span>Learn More About Us</span></p>
    </div>

    <div class="container">

        <div class="row gy-4">
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                <img src="/assets/img/warkop2.jpg" class="img-fluid mb-4" alt="">
                <div class="book-a-table">
                    <h3>Book a Table</h3>
                    <p>+62 858-9215-7078</p>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
                <div class="content ps-0 ps-lg-5">
                    <p style="font-size: 20px;" class="fst-italic">
                        Warkop kami menawarkan suasana nyaman dan santai untuk berkumpul bersama teman dan keluarga. Berikut adalah beberapa alasan mengapa Anda harus mengunjungi Warkop kami:
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle-fill"></i> <span style="font-size: 20px;">Tempat yang nyaman dan santai untuk bersantai setelah hari yang melelahkan.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span style="font-size: 20px;">Berbagai macam kopi yang dibuat dengan biji kopi pilihan dan teknik seduh yang sempurna.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span style="font-size: 20px;">Makanan ringan yang lezat dan cocok untuk menemani obrolan panjang.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span style="font-size: 20px;">Suasana yang hangat dengan dekorasi unik yang membuat Anda merasa seperti di rumah sendiri.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span style="font-size: 20px;">Tempat yang cocok untuk bekerja atau belajar dengan fasilitas Wi-Fi gratis.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span style="font-size: 20px;">Lokasi yang strategis dan mudah dijangkau di pusat kota.</span></li>

                    </ul>
                    <p style="font-size: 20px;">
                        Nikmati pengalaman nongkrong yang berbeda di Warkop kami. Datang dan rasakan sendiri kenyamanan serta kehangatan yang kami tawarkan.
                    </p>


                </div>
            </div>
        </div>

    </div>

</section>
<section id="why-us" class="why-us section light-background">

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="why-box">
                    <h3>Why Choose Stiga</h3>
                    <p>
                        Nikmati suasana santai dan nyaman di warkop kami, tempat ideal untuk mengobrol dan menikmati secangkir kopi hangat. Kami menyajikan kopi berkualitas tinggi serta makanan ringan yang lezat. Dengan pelayanan yang ramah dan harga terjangkau, warkop kami adalah pilihan terbaik untuk melepas penat.
                    </p>
                    <div class="text-center">
                        <a href="#about" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-xl-4">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-cup-hot"></i>
                            <h4>Kualitas Kopi Terbaik</h4>
                            <p>Setiap cangkir kopi disajikan dengan perhatian penuh agar Anda mendapatkan pengalaman yang sempurna.</p>
                        </div>
                    </div>

                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-gem"></i>
                            <h4>Nyaman dan Bersih</h4>
                            <p>Warkop kami menawarkan suasana yang nyaman dan dilengkapi fasilitas Wi-Fi gratis dengan kecepatan 4G.</p>
                        </div>
                    </div>

                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-inboxes"></i>
                            <h4>Harga Terjangkau</h4>
                            <p>Nikmati berbagai pilihan menu kopi dan makanan ringan dengan harga yang ramah di kantong.

                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</section>
<section id="menu" class="menu section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Our Menu</h2>
        <p><span>Check Our Stiga Menu</span></p>
    </div>

    <div class="container">
        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                    <h4>Snack</h4>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                    <h4>Mie</h4>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
                    <h4>Nasi</h4>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
                    <h4>Minuman</h4>
                </a>
            </li>

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

            <div class="tab-pane fade active show" id="menu-starters">

                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3 style="font-size: 30px;">Snack</h3>
                </div>

                <div class="row gy-5">

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/cireng.png" class="glightbox"><img src="/assets/img/menu/cireng.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Cireng</h4>
                        <p class="ingredients">
                            Kudapan khas Bandung, cocok untuk teman ngopi.
                        </p>
                        <p class="price">
                            Rp 10.000
                        </p>

                        <button type="button" class="addtocart" data-id_produk="" data-harga=""><i class="bi bi-bag-plus-fill"></i></button>

                    </div>

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/pisang.png" class="glightbox"><img src="/assets/img/menu/pisang.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Pisang Bakar</h4>
                        <p class="ingredients">
                            Pisang manis dipanggang dengan keju dan coklat.
                        </p>
                        <p class="price">
                            Rp 15.000
                        </p>
                    </div>

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/baso.png" class="glightbox"><img src="/assets/img/menu/baso.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Baso Aci</h4>
                        <p class="ingredients">
                            Mie dengan bakso aci yang lezat dan kuah pedas.
                        </p>
                        <p class="price">
                            Rp 15.000
                        </p>
                    </div><!-- Menu Item -->

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/kentang.png" class="glightbox"><img src="/assets/img/menu/kentang.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Kentang Goreng</h4>
                        <p class="ingredients">
                            Kentang goreng dengan taburan bumbu spesial.
                        </p>
                        <p class="price">
                            Rp 15.000
                        </p>
                    </div><!-- Menu Item -->

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/otak2.png" class="glightbox"><img src="/assets/img/menu/otak2.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Otak Otak</h4>
                        <p class="ingredients">
                            Otak otak yang dipanggang dengan sempurna.
                        </p>
                        <p class="price">
                            Rp 12.000
                        </p>
                    </div><!-- Menu Item -->

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/roti.png" class="glightbox"><img src="/assets/img/menu/roti.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Roti Bakar</h4>
                        <p class="ingredients">
                            Roti bakar renyah dengan isi keju dan coklat leleh.
                        </p>
                        <p class="price">
                            Rp 15.000
                        </p>
                    </div><!-- Menu Item -->

                </div>
            </div><!-- End Starter Menu Content -->

            <div class="tab-pane fade" id="menu-breakfast">

                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3 style="font-size: 30px;">Mie</h3>
                </div>

                <div class="row gy-5">

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/mie.png" class="glightbox"><img src="/assets/img/menu/mie.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Mie Goreng</h4>
                        <p class="ingredients">
                            Mie goreng lezat dengan bumbu khas dan topping telur serta sayuran segar.
                        </p>
                        <p class="price">
                            Rp 10.000
                        </p>
                    </div><!-- Menu Item -->

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/mie1.png" class="glightbox"><img src="/assets/img/menu/mie1.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Mie Pedas Ayam Suwir</h4>
                        <p class="ingredients">
                            Mie pedas dengan ayam suwir dan sayuran hijau segar, cocok untuk pecinta makanan pedas.
                        </p>
                        <p class="price">
                            Rp 15.000
                        </p>
                    </div><!-- Menu Item -->

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/menu-item-3.png" class="glightbox"><img src="/assets/img/menu/menu-item-3.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Mie Tumis Sayuran</h4>
                        <p class="ingredients">
                            Tumis sayuran segar dengan bumbu khas dan saus spesial, sehat dan lezat.
                        </p>
                        <p class="price">
                            Rp 10.000
                        </p>
                    </div><!-- Menu Item -->

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/mie2.png" class="glightbox"><img src="/assets/img/menu/mie2.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Mie Goreng Seafood</h4>
                        <p class="ingredients">
                            Mie goreng seafood dengan potongan sayuran segar dan bumbu gurih.
                        </p>
                        <p class="price">
                            Rp 20.000
                        </p>
                    </div><!-- Menu Item -->

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/mie3.png" class="glightbox"><img src="/assets/img/menu/mie3.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Sup Mie Kuah Daging</h4>
                        <p class="ingredients">
                            Sup mie kuah dengan sayuran segar dan daging sapi yang lembut.
                        </p>
                        <p class="price">
                            Rp 13.000
                        </p>
                    </div><!-- Menu Item -->

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/mie4.png" class="glightbox"><img src="/assets/img/menu/mie4.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Mie Kuah Pedas Ayam</h4>
                        <p class="ingredients">
                            Mie kuah pedas dengan irisan ayam dan topping sayuran segar.
                        </p>
                        <p class="price">
                            Rp 16.000
                        </p>
                    </div><!-- Menu Item -->

                </div>
            </div><!-- End Breakfast Menu Content -->

            <div class="tab-pane fade" id="menu-lunch">

                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3 style="font-size: 30px;">Nasi</h3>
                </div>

                <div class="row gy-5">

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/1.png" class="glightbox"><img src="/assets/img/menu/1.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Nasi Ayam Rendang</h4>
                        <p class="ingredients">
                            Nasi putih hangat disajikan dengan ayam rendang bumbu rempah khas, lezat dan menggugah selera.
                        </p>
                        <p class="price">
                            Rp 20.000
                        </p>
                    </div><!-- Menu Item -->

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/2.png" class="glightbox"><img src="/assets/img/menu/2.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Nasi Ayam Kecap</h4>
                        <p class="ingredients">
                            Nasi putih dengan ayam kecap manis yang dimasak dengan bumbu tradisional, cocok untuk makan siang.
                        </p>
                        <p class="price">
                            Rp 20.000
                        </p>
                    </div><!-- Menu Item -->

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/3.png" class="glightbox"><img src="/assets/img/menu/3.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Nasi Ayam Sayur</h4>
                        <p class="ingredients">
                            Nasi putih dengan potongan ayam goreng dan sayuran segar, disajikan dengan sambal pedas.
                        </p>
                        <p class="price">
                            Rp 18.000
                        </p>
                    </div><!-- Menu Item -->

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/4.png" class="glightbox"><img src="/assets/img/menu/4.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Nasi Ayam Mie Sayur</h4>
                        <p class="ingredients">
                            Kombinasi nasi putih, mie goreng, ayam goreng, dan sayuran segar, lengkap dan mengenyangkan.
                        </p>
                        <p class="price">
                            Rp 18.000
                        </p>
                    </div><!-- Menu Item -->

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/5.png" class="glightbox"><img src="/assets/img/menu/5.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Nasi Goreng</h4>
                        <p class="ingredients">
                            Nasi goreng spesial dengan telur mata sapi dan bumbu khas, cocok untuk segala suasana.
                        </p>
                        <p class="price">
                            Rp 17.000
                        </p>
                    </div><!-- Menu Item -->

                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/6.png" class="glightbox"><img src="/assets/img/menu/6.png" class="menu-img img-fluid" alt=""></a>
                        <h4>Nasi Kuning</h4>
                        <p class="ingredients">
                            Nasi kuning harum dengan bumbu kunyit, disajikan dengan ayam goreng, telur, dan sambal.
                        </p>
                        <p class="price">
                            Rp 20.000
                        </p>
                    </div><!-- Menu Item -->

                </div>
            </div><!-- End Lunch Menu Content -->

            <div class="tab-pane fade" id="menu-dinner">

                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3 style="font-size: 30px;">Minuman</h3>
                </div>
                <div class="row gy-5">
                    @foreach($products as $prd)
                    @if($prd->kategoriprd && $prd->kategoriprd->kategori_prd === "minuman")
                    <div class="col-lg-4 menu-item">
                        <a href="/assets/img/menu/minum1.png" class="glightbox"><img src="/images/{{$prd->img_product}}" class="menu-img img-fluid" alt=""></a>
                        <h4>{{$prd->nama_product}}</h4>
                        <p class="ingredients">
                            {{$prd->desc}}
                        </p>
                        <p class="price">
                            Rp.{{number_format($prd->price)}}
                        </p>
                        <p class="price">
                            Stock:{{$prd->stock}}
                        </p>
                        <button type="button" class="addtocart" data-id_produk="{{ $prd->id_product }}" data-harga="{{ $prd->price }}"><i class="bi bi-bag-plus-fill"></i></button>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div><!-- End Dinner Menu Content -->

        </div>

    </div>

</section>

<section id="testimonials" class="testimonials section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>TESTIMONIALS</h2>
        <p>What Are They Saying About Us</span></p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    }
                }
            </script>
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="row gy-4 justify-content-center">
                            <div class="col-lg-6">
                                <div class="testimonial-content">
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Tempat yang nyaman dan cocok untuk nongkrong bareng teman-teman. Kopinya enak dan makanan ringan di sini bervariasi. Saya selalu senang datang ke Warkop Stiga!</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                    <h3>Ahmad S.</h3>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 text-center">
                                <img src="/assets/img/testimonials/1.png" class="img-fluid testimonial-img" alt="">
                            </div>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="row gy-4 justify-content-center">
                            <div class="col-lg-6">
                                <div class="testimonial-content">
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Warkop Stiga punya suasana yang asik banget. Pelayanannya ramah dan cepat, dan harga makanannya terjangkau. Favorit saya adalah es kopi susu mereka yang segar banget!</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                    <h3>Dewa</h3>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 text-center">
                                <img src="/assets/img/testimonials/2.png" class="img-fluid testimonial-img" alt="">
                            </div>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="row gy-4 justify-content-center">
                            <div class="col-lg-6">
                                <div class="testimonial-content">
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Saya sering bekerja di sini karena Wi-Fi-nya kencang dan suasananya tenang. Selain itu, mie goreng dan nasi kuningnya juga sangat enak. Highly recommended!</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                    <h3>Rian T.</h3>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 text-center">
                                <img src="/assets/img/testimonials/3.png" class="img-fluid testimonial-img" alt="">
                            </div>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="row gy-4 justify-content-center">
                            <div class="col-lg-6">
                                <div class="testimonial-content">
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Warkop Stiga jadi tempat favorit saya untuk bersantai. Minuman sodanya menyegarkan, dan roti bakarnya juga lezat. Plus, tempatnya bersih dan pelayanannya top!</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                    <h3>Nano</h3>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 text-center">
                                <img src="/assets/img/testimonials/4.png" class="img-fluid testimonial-img" alt="">
                            </div>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

</section>

<section id="gallery" class="gallery section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Gallery</h2>
        <p><span>Check Our Gallery</span></p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "centeredSlides": true,
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 1,
                            "spaceBetween": 0
                        },
                        "768": {
                            "slidesPerView": 3,
                            "spaceBetween": 20
                        },
                        "1200": {
                            "slidesPerView": 5,
                            "spaceBetween": 20
                        }
                    }
                }
            </script>
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="/assets/img/gallery/1.png"><img src="/assets/img/gallery/1.png" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="/assets/img/gallery/2.png"><img src="/assets/img/gallery/2.png" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="/assets/img/gallery/3.png"><img src="/assets/img/gallery/3.png" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="/assets/img/gallery/4.png"><img src="/assets/img/gallery/4.png" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="/assets/img/gallery/5.png"><img src="/assets/img/gallery/5.png" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="/assets/img/gallery/6.png"><img src="/assets/img/gallery/6.png" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="/assets/img/gallery/7.png"><img src="/assets/img/gallery/7.png" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="/assets/img/gallery/1.png"><img src="/assets/img/gallery/1.png" class="img-fluid" alt=""></a></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

</section>
<section id="contact" class="contact section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p><span>Need Help Contact Us</span></p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-5">
            <iframe style="width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15861.509300735846!2d106.7406079!3d-6.2741970!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTYnMjcuMSJTIDEwNsKwNDQnMjMuMyJF!5e0!3m2!1sen!2sus!4v1689081725621" frameborder="0" allowfullscreen=""></iframe>

        </div>

        <div class="row gy-4">

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                    <i class="icon bi bi-geo-alt flex-shrink-0"></i>
                    <div>
                        <h3>Address</h3>
                        <p>Jl. Nusa Jaya, Pd. Karya, Kec. Pd. Aren, Kota Tangerang Selatan, Banten</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                    <i class="icon bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Call Us</h3>
                        <p>+62 858-9215-7078</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                    <i class="icon bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Us</h3>
                        <p>stiga@gmail.com</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
                    <i class="icon bi bi-clock flex-shrink-0"></i>
                    <div>
                        <h3>Opening Hours<br></h3>
                        <p><strong>Senin-Minggu:</strong> 14.30 - 02.30; <strong>Sabtu:</strong> 14.30 - 03.00</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

        </div>



    </div>

</section>
@endSection