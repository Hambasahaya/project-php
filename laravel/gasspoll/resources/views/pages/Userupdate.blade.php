@extends("layout.header")
@section("content")
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="100%" height="250vw" style="border-radius: 60%;" src="/img/userImg/{{session()->get('foto')}}"><span class="text-black-50">{{session("user_email")}}</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">detail akun</h4>
                </div>
                <form action="/userupdate" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder=" name" value="" name="nama"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="number" class="form-control" placeholder="enter phone number" value="" name="nophone"></div>
                        <div class="col-md-12"><label class="labels">Email </label><input type="text" class="form-control" placeholder="enter email id" value="{{session('user_email')}}" name="email"></div>
                        <div class="col-md-12"><label class="labels">Jenik Kelamin</label>
                            <select class="form-select form-select-sm" aria-label="Small select example" name="jk">
                                <option value=1 selected>Laki-laki</option>
                                <option value=2>perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Foto</span>
                            <input type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="foto">
                        </div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection