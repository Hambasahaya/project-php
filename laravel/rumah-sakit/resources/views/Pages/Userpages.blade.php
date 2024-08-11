@extends("Layout.Userpages_layout")
@section("usercontent")
<div class="userhome d-flex flex-column">
    <div class="userinfo d-flex flex-column justify-content-center align-items-center">
        <!-- Swiper -->
        <div class="swiper homeswiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="/asset/img/posterhome1.svg" />
                </div>
                <div class="swiper-slide">
                    <img src="/asset/img/posterhome2.svg" />
                </div>
                <div class="swiper-slide">
                    <img src="/asset/img/posterhome3.svg" />
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <user class="usermenus">
        <div class="row row-cols-4 gap-2">
            <div class="col d-flex flex-column">
                <a href="http://"><img src="/asset/img/vector91.svg" alt="" class="img-link"></a>
                <h6><a href="http://">Pendaftaran</a></h6>

            </div>
            <div class="col d-flex flex-column">
                <a href="http://"><img src="/asset/img/vector92.svg" alt="" class="img-link"></a>
                <h6 class="text center"><a href="http://">Hasil Diagnosa</a></h6>
            </div>
            <div class="col d-flex flex-column">
                <a href="http://"><img src="/asset/img/vector93.svg" alt="" class="img-link"></a>
                <h6><a href="http://">Resep Obat</a></h6>

            </div>
            <div class="col d-flex flex-column">
                <a href="http://"><img src="/asset/img/vector94.svg" alt="" class="img-link"></a>
                <h6> <a href="{{route('antrianpasient')}}"> Antrian</a></h6>
            </div>

            <div class="col d-flex flex-column">
                <a href="{{route('scanner_pages')}}"><img src="/asset/img/vector95.svg" onclick="" alt="" class="img-link">
                    <h6><a href="{{route('scanner_pages')}}">Scan Barcode</a></h6>
            </div>

        </div>
    </user>
</div>
<div class="authpages">
    @if(session("berhasil_login"))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById('loginsukses'));
            setTimeout(() => {
                myModal.show();
            }, 3000);
        });
    </script>
    <div class="modal fade" id="loginsukses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="background-color: transparent;">
            <div class="modal-content" style="background-color: transparent;">
                <div class="finishnewpas d-flex flex-column justify-content-center align-items-center align-content-center">
                    <form action="" method="post" class="d-flex  p-4 flex-column">
                        <h6 class="text-center">SELAMAT ANDA BERHASIL MASUK !!!</h6>
                        <img src="/asset/img/sukses.svg " class="align-self-center img-form" alt="" srcset="" width="35%">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection