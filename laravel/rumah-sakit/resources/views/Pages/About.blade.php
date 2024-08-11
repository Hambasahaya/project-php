@extends('Layout.Normal_layout')
@section('content')
<div class="about d-flex flex-column">
    <div class="row ">
        <div class="col flex-shrink-0">
            <img src="/asset/img/assert1.svg" alt="">
        </div>
        <div class="col d-flex justify-content-center flex-column g-4 flex-grow-1">
            <div class="d-flex align-items-center justify-content-baseline align-content-center ">
                <img src="/asset/img/vector1.svg" alt="" width="8%" class="flex-shrink-0 img-thumbnail">
                <h4 class="flex-grow-1 ms-2 p-2">Tentang Kami</h4>
            </div>
            <div class="d-flex p-4 rounded about-text ">
                <p>Selamat datang di Health Bridge,
                    platform terintegrasi yang dirancang khusus untuk mempermudah pendaftaran dan manajemen pasien di berbagai fasilitas kesehatan,
                    termasuk rumah sakit, puskesmas, dan klinik.</p>
            </div>
        </div>
    </div>
    <div class="misi d-flex align-items-center flex-column ">
        <div class="d-flex align-items-center justify-content-center">
            <img src="/asset/img/misi.png" alt="" srcset="" width="30%">
            <h4>Misi-kami</h4>
        </div>
        <div class="misi-text d-flex">
            Misi kami adalah menyediakan solusi teknologi yang efisien dan mudah digunakan untuk meningkatkan kualitas layanan kesehatan. Melalui pendaftaran online, pasien dapat mengisi data diri dan jadwal kunjungan di website kami, kemudia discan di fasilitas kesehatan, sehingga mengurangi waktu tunggu, meningkatkan akurasi data, dan memberikan pengalaman layanan kesehatan yang lebih baik bagi pasien dan tenaga medis. Kami berkomitmen untuk terus mengembangkan layanan ini demi memberikan manfaat maksimal bagi kesehatan masyarakat.
        </div>
    </div>
    <div class="keuggulan">
        <div class="swiper mySwiper2">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="card mb-3">
                        <div class="card-header">LAYANAN KAMI</div>
                        <div class="card-body">
                            <h5 class="card-title">Melalui platform kami, Anda dapat:</h5>
                            <p class="card-text">
                            <ul>
                                <li>Memudahkan pasien untuk mendaftar dari mana saja dan kapan saja, tanpa perlu antri lama di tempat.</li>
                                <li>Mengatur antrian secara efisien untuk mengurangi waktu tunggu dan meminimalkan kerumunan di fasilitas kesehatan.</li>
                                <li>Menyimpan dan mengelola rekam medis pasien secara digital untuk akses yang lebih cepat dan aman.</li>
                                <li>Menggunakan teknologi barcode untuk mempercepat proses pendaftaran dan verifikasi data pasien</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card mb-3">
                        <div class="card-header">KENAPA MEMILIH KAMI?</div>
                        <div class="card-body">
                            <p class="card-text">
                            <ul>
                                <li>Mempercepat proses administrasi dan mengurangi waktu tunggu.</li>
                                <li>Dapat diakses kapan saja dan dari mana saja.</li>
                                <li>Dapat digunakan oleh berbagai jenis fasilitas kesehatan</li>
                                <li>Tim dukungan kami siap membantu Anda setiap saat.</li>
                            </ul>
                            </p>
                            <h5 class="card-title">
                                Kami berkomitmen untuk terus meningkatkan layanan kami dan menjadi mitra terpercaya dalam memberikan perawatan kesehatan yang lebih baik. Terima kasih telah mempercayai kami sebagai bagian dari solusi kesehatan Anda.
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card  mb-3">
                        <div class="card-header">NILAI-NILAI KAMI</div>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">
                            <ul>
                                <li>Kami terus berinovasi untuk menyediakan solusi terbaik di bidang kesehatan.</li>
                                <li>Platform kami dirancang untuk memberikan layanan yang handal dan konsisten.</li>
                                <li>Antarmuka yang intuitif dan mudah digunakan untuk semua pengguna, baik pasien maupun tenaga medis.</li>
                                <li>Menjaga kerahasiaan dan keamanan data pasien adalah prioritas utama kami.</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
@endsection