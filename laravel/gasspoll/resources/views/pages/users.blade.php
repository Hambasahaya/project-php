@extends("layout.header")
@section("content")
<div class="userpages d-flex flex-column">
    <div class="user-img d-flex flex-column">
        <img src="/img/userImg/{{session()->get('foto')}}" alt="" width="">
        <h4>{{session()->get("nama")}}</h4>
    </div>
    <div class="user-menus d-flex flex-column">
        <h4>Menu</h4>
        <div class="menus-user d-flex flex-column">
            <a href="/pembelian"><i class="bi bi-bag-heart-fill"></i>Pembelian</a>
            <a href="/detailuser"><i class=" bi bi-person-bounding-box"></i>Detail Akun</a>
            <a href="/logout"><i class="bi bi-door-open-fill"></i>Log Out</a>
        </div>
    </div>
</div>
@endsection