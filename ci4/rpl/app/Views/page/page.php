<?= $this->extend('template/template'); ?>

<!-- home section -->
<?= $this->section('home') ?>
<section id="home">
    <div class="home">
        <div class="sc-title">
            <h4>Pencak Silat UMB</h4>
        </div>
        <div class="sc-content">
            <p>UKM Pencak Silat Universitas Mercu Buana adalah sebuah organisasi mahasiswa yang berfokus
                pada pengembangan dan penyebaran seni bela diri tradisional Indonesia, yaitu Pencak Silat.
                UKM ini memberikan mahasiswa kesempatan untuk belajar, berlatih, dan mengembangkan keterampilan
                Pencak Silat mereka,sambil mempromosikan nilai-nilai budaya dan filosofis yang terkait dengan seni bela diri ini.</p>
        </div>
        <div class="sc-aksi">
            <div class="btn-group">
                <button>Daftar sekarang</button>
                <button>Hubungi kami</button>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>


<!-- about -->
<?= $this->section('about') ?>
<section id="about">
    <div class="img-about">
        <img src="/img/img2.png" alt="" srcset="">
    </div>
    <div class="about-content">
        <h4>Apa itu Pencak Silat?</h4>
        <p>Pencak Silat adalah seni bela diri tradisional yang berasal dari Indonesia, yang melibatkan serangkaian teknik tangan kosong,
            senjata tradisional, dan gerakan berbasis filosofi budaya. Terdapat beragam aliran Pencak Silat yang berbeda, seperti Merpati Putih,
            Tapak Suci, dan PSHT,yang masing-masing memiliki teknik dan karakteristik unik yang menggambarkan ciri khas daerah dan tradisi budaya.</p>
    </div>
</section>
<?= $this->endSection() ?>

<!-- section prestasi -->
<?= $this->section('pres'); ?>
<section id="pres">
    <h4 class="text-center"> PRESTASI </h4>
    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="/img/pres1.png" />
            </div>
            <div class="swiper-slide">
                <img src="/img/pres2.png" />
            </div>
            <div class="swiper-slide">
                <img src="/img/pres3.png" />
            </div>
            <div class="swiper-slide">
                <img src="/img/pres4.png" />
            </div>
            <div class="swiper-slide">
                <img src="/img/pres5.png" />
            </div>
            <div class="swiper-slide">
                <img src="/img/pres6.png" />
            </div>
            <div class="swiper-slide">
                <img src="/img/pres7.png" />
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>


<!-- section pendaftaran -->
<?= $this->section('pendaftaran'); ?>
<section id="pendaftaran">
    <?php if (!isset($_SESSION['oke'])) : ?>
        <div class="title-sc">
            <h4>FORM PENDAFTARAN UKM PENCAK SILAT </h4>
            <p class="text-center">isi form ini untuk melakuan pendaftaran</p>
        </div>
        <div class="form-pendaftaran">
            <form action="/pendaftaran" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" required name="email">
                    <div id="emailchek" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" required id="nama">
                    <div id="namachek" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control" name="nim" required id="nim">
                    <p id='cheknim'></p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fakultas</label>
                    <select class="form-select form-select-sm" aria-label="Small select example" name="fakultas" id="fakultas" required>
                        <?php foreach ($nama_fakultas as $fakultas) : ?>
                            <option value="<?= $fakultas['id_fakultas'] ?>"><?= $fakultas["nama_fakultas"] ?></option>
                            <option value="<?= $fakultas['id_fakultas'] ?>"><?= $fakultas["nama_fakultas"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <select class="form-select form-select-sm" aria-label="Small select example" name="jurusan" id="jurusan" required>

                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-select form-select-sm" aria-label="Small select example" name="jk" required>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">No.telphone</label>
                    <input type="number" class="form-control" name="no" required id="no">
                    <p id="chkno"></p>
                </div>
                <div class="mb-3">
                    <label class="form-label">PHOTO</label>
                    <input type="file" class="form-control" name="foto" required>
                </div>
                <button type="submit" class="btn btn-primary" id="btn-daftar">Daftar!</button>
            </form>
        <?php else : ?>
            <img src="/img/oke.gif" alt="" srcset="">
        <?php endif; ?>
        </div>
</section>
<?= $this->endSection(); ?>