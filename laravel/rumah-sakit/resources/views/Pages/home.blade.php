@extends('Layout.Normal_layout')
@section('Home')
@include("Component.Hero")
<div class="mainpage d-flex flex-column">
  <div class="container text-header">
    <h4>Daftar Spesialisasi</h4>
    <p>Di bawah ini adalah berbagai spesialisasi. Klik pada setiap spesialisasi untuk mendapatkan informasi lebih lanjut:</p>
  </div>
  <div class="spesialisasi d-flex flex-column">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="row ">
            <div class="col">
              <a href="/laya/1">
                <div class="card" style="width: 18rem;">
                  <img src="/asset/img/doctor-high-tech-healthcare-diagnosis 1.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">Spesialis Anestesi</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col">
              <a href="laya/2">
                <div class="card" style="width: 18rem;">
                  <img src="/asset/img/stages-baby-boy-collection-flat-design 1.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">Spesialis Anak</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col">
              <a href="laya/3">
                <div class="card" style="width: 18rem;">
                  <img src="/asset/img/professional-surgeons-surrounding-patient-operation-table-flat-illustration 1.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">Spesialis Bedah</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col">
              <a href="laya/4">
                <div class="card" style="width: 18rem;">
                  <img src="/asset/img/hand-drawn-flat-design-thyroid-illustration 1.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">Spesialis Endokrinologi</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col">
              <a href="laya/5">
                <div class="card" style="width: 18rem;">
                  <img src="/asset/img/confused-elderly-man-suffering-from-alzheimer-disease-his-relative-doctor-flat-vector-illustration 1.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">Spesialis Geriatri</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col">
              <a href="laya/6">
                <div class="card" style="width: 18rem;">
                  <img src="/asset/img/qnyr_6e7r_220302 1.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">Spesialis Dokter Gigi</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col">
              <a href="laya/7">
                <div class="card" style="width: 18rem;">
                  <img src="/asset/img/high-blood-pressure-abstract-concept-illustration 1.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">Spesialis Jantung</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col">
              <a href="laya/8">
                <div class="card" style="width: 18rem;">
                  <img src="/asset/img/hand-drawn-sex-toys-illustration 1.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">Spesialis Kulit dan
                      Alat Kelamin</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col">
              <a href="laya/9">
                <div class="card" style="width: 18rem;">
                  <img src="/asset/img/flat-hand-drawn-microblading-illustration 1.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">Spesialis Mata</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col">
              <a href="laya/10">
                <div class="card" style="width: 18rem;">
                  <img src="/asset/img/klinik (8) 1.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">Spesialis Saraf</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col">
              <a href="laya/11">
                <div class="card" style="width: 18rem;">
                  <img src="/asset/img/klinik (9) 1.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">Spesialis Kandungan</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col">
              <a href="laya/12">
                <div class="card" style="width: 18rem;">
                  <img src="/asset/img/klinik (10) 1.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">Spesialis Kangker</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col">
              <a href="laya/13">
                <div class="card" style="width: 18rem;">
                  <img src="/asset/img/klinik (11) 1.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">Spesialis Tulang</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col">
              <a href="laya/14">
                <div class="card" style="width: 18rem;">
                  <img src="/asset/img/klinik (12) 1.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">Spesialis Paru-Paru</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col">
              <a href="http://">
                <div class="card" style="width: 18rem;">
                  <img src="/asset/img/klinik (13) 1.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center">Spesialis Patologi</h5>
                  </div>
                </div>
            </div>
            <div class="col">
              <div class="card" style="width: 18rem;">
                <img src="/asset/img/klinik (14) 1.svg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Spesialis Penyakit Dalam</h5>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" style="width: 18rem;">
                <img src="/asset/img/klinik (15) 1.svg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Spesialis Psikiatri</h5>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" style="width: 18rem;">
                <img src="/asset/img/klinik (16) 1.svg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Spesialis Radiologi</h5>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" style="width: 18rem;">
                <img src="/asset/img/klinik (17) 1.svg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Spesialis Rehabilitasi medis</h5>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" style="width: 18rem;">
                <img src="/asset/img/klinik (18) 1.svg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">Spesialis THT</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-scrollbar"></div>
    </div>
  </div>
  <div class=" poster-section">
    <div class="row">
      <div class="col slogan d-flex flex-column">
        <h4>
          Informasi Kesehatan Penting untuk Anda!
        </h4>
        <p>Jaga kesehatan Anda dengan membaca poster kesehatan terbaru dari kami. Geser dan klik untuk mendapatkan tips bermanfaat dan informasi terkini tentang kesehatan!</p>
      </div>
      <div class="col poster-header d-flex flex-column">
        <div class="swiper mySwiper1">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="/asset/img/2017_Flyer_PHBS_15x21cm 6.svg" />
            </div>
            <div class="swiper-slide">
              <img src="/asset/img/Poster Infografis Bahaya Begadang Ilustratif Biru dan Putih (1) 7.svg" />
            </div>
            <div class="swiper-slide">
              <img src="/asset/img/Poster Infografis Bahaya Begadang Ilustratif Biru dan Putih 6.svg" />
            </div>
            <div class="swiper-slide">
              <img src="/asset/img/Anemia_15x21cm 5.svg" />
            </div>
            <div class="swiper-slide">
              <img src="/asset/img/Poster Infografis Bahaya Begadang Ilustratif Biru dan Putih (3) 1.svg" />
            </div>
            <div class="swiper-slide">
              <img src="/asset/img/sc-manfaat-air-putih-teg-tirto_ratio-9x16 2.svg" />
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
        <img src="/asset//img/Ellips.png" alt="" srcset="" class="sirkel">
      </div>
    </div>
  </div>
  <div class="container text-center ">
    <div class="row client">
      <div class="col">
        <img src="/asset/img/Ad-Medika-rahman-1 1.svg" alt="" srcset="">
      </div>
      <div class="col">
        <img src="/asset/img/aia-insurance-logo-png-aia-australia-life-insurance-logo-600 1.svg" alt="" srcset="">
      </div>
      <div class="col">
        <img src="/asset/img/Allianz-logo 1.svg" alt="" srcset="">
      </div>
      <div class="col">
        <img src="/asset/img/47422_banner_0_08974 1.svg" alt="" srcset="">
      </div>
      <div class="col">
        <img src="/asset/img/logo bpjs-02 (1) 1.svg" alt="" srcset="">
      </div>
      <div class="col">
        <img src="/asset/img/BPJS_Ketenagakerjaan_vector_logo 1.svg" alt="" srcset="">
      </div>
      <div class="col">
        <img src="/asset/img/bri-life-logo-FBF7DB80BA-seeklogo.com 1.svg" alt="" srcset="">
      </div>
      <div class="col">
        <img src="/asset/img/Indolife-Pensiontama-BESAR 1.svg" alt="" srcset="">
      </div>
      <div class="col">
        <img src="/asset/img/JKN 1.svg" alt="" srcset="">
      </div>
      <div class="col">
        <img src="/asset/img/mandiri 1.svg" alt="" srcset="">
      </div>
      <div class="col">
        <img src="/asset/img/Prudential 1.svg" alt="" srcset="">
      </div>
      <div class="col">
        <img src="/asset/img/Asuransi-Reliance-Indonesia 1.svg" alt="" srcset="">
      </div>
      <div class="col">
        <img src="/asset/img/unnamed-1 1.svg" alt="" srcset="">
      </div>
      <div class="col">
        <img src="/asset/img/Asuransi-Jiwa-Sinarmas-MSIG-1 1.svg" alt="" srcset="">
      </div>
    </div>
  </div>
</div>
</div>

@endsection