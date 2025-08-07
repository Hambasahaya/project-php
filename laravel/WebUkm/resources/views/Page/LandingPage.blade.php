@extends("Template.Layout")
<header>
    @include('component.Navbar')
</header>
@include('component.Banner')
@section("Content")
<section id="about" class="d-flex flex-column ">
    <div class="about d-flex gap-2 flex-column">
        <h4 class="text-center">About</h4>
        <p>Unit Kegiatan Mahasiswa (UKM) di kampus adalah wadah bagi mahasiswa untuk mengembangkan minat, bakat, dan keterampilan di luar kegiatan akademik.
            UKM mencakup berbagai bidang, mulai dari olahraga, seni, hingga keilmuan dan kewirausahaan.
            Bergabung dengan UKM memberikan kesempatan bagi mahasiswa untuk berkontribusi dalam kegiatan positif, memperluas jaringan,
            serta meningkatkan soft skill yang berguna untuk karier dan kehidupan pribadi.</p>
        <p>Kegiatan UKM di kampus juga membantu meningkatkan kemampuan kepemimpinan, kerjasama tim, dan komunikasi antar mahasiswa.
            Setiap UKM diselenggarakan oleh mahasiswa dan didukung oleh pihak kampus untuk menciptakan lingkungan yang mendukung kreativitas dan inovasi.
            UKM sering kali menjadi tempat awal terbentuknya komunitas-komunitas aktif yang turut berperan dalam pengembangan kampus dan masyarakat sekitar.</p>
    </div>
    <div class="row d-flex flex-row ukm-list">
        <div class="col-6 d-flex justify-content-center align-items-center align-content-center">
            @include('Component.CardsSlide')
        </div>
        <div class="col-6">
            @include('Component.Slide')
        </div>
    </div>
</section>
<section id="contac">
    <div class="row flex-row align-items-center align-content-center">
        <div class="col-6 d-flex flex-column gap-4">
            <div class="header-contac">
                <h4>Contac Us</h4>
            </div>
            <div class="d-flex gap-2 align-items-center align-content-center">
                <img src="{{asset('img/phone.png')}}" alt="" srcset="" width="30px">
                <h4>+62 851-5853-8629</h4>
            </div>
            <div class="d-flex gap-2 align-items-center align-content-center">
                <img src="{{asset('img/email.png')}}" alt="" srcset="" width="30px">
                <h4>UnitkegiatanMahasiswaumb@ac.id</h4>
            </div>
            <div class="d-flex gap-2 align-items-center align-content-center">
                <img src="{{asset('img/location.png')}}" alt="" srcset="" width="40px">
                <h4>Kampus Mercubuana Meruya</h4>
            </div>
        </div>
        <div class="col-6 d-flex justify-content-center align-items-center align-content-center">
            <img src="{{asset('img/contac.jpg')}}" alt="" srcset="" width="70%" class="rounded-4">
        </div>
    </div>
</section>
@endsection