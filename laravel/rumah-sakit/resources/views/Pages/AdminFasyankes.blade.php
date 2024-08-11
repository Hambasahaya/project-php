@extends("Layout.Auth_layout")
@section("auth")
<div class="authpages d-flex flex-column">
    <div class="registerbox d-flex flex-column justify-content-center align-items-center align-content-center">
        <img src="/asset/img/misi2.svg" alt="" class="img-form" srcset="" width="25%">
        <form action="{{route('registeradmin')}}" method="post" class=" d-flex p-4 flex-column">
            @csrf
            <label for="exampleFormControlInput1" class="form-label">Nama Lengkap Fasyankes: @error('nama_lengkap'){{ $message }}@enderror</label>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control" placeholder="Nama Lengkap" aria-describedby="basic-addon1" name="nama_lengkap" required>
            </div>
            <label for="exampleFormControlInput1" class="form-label">No.NIK Kepala Fasyankes: @error('NIK'){{ $message }}@enderror</label>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-vcard"></i></span>
                <input type="text" class="form-control" placeholder="NIK" aria-describedby="basic-addon1" name="nik" required>
            </div>
            <label for="exampleFormControlInput1" class="form-label">No.Kantor Fasyankes @error('No_hp'){{ $message }}@enderror</label>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                <input type="tel" class="form-control" placeholder="phone number" aria-describedby="basic-addon1" name="No_hp">
            </div>
            <label for="exampleFormControlInput1" class="form-label">Tanggal Berdiri Fasyankes:@error('tanggal_lahir'){{ $message }}@enderror</label>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-heart"></i></span>
                <input type="date" class="form-control" placeholder="" aria-describedby="basic-addon1" name="tanggal_lahir">
            </div>
            <label for="exampleFormControlInput1" class="form-label">Email Fasyankes: @error('email'){{ $message }}@enderror</label>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-heart-fill"></i></span>
                <input type="email" class="form-control" placeholder="email" aria-describedby="basic-addon1" name="email">
            </div>
            <label for="exampleFormControlInput1" class="form-label">Password:@error('password'){{ $message }}@enderror</label>
            <div class="input-group mb-4 ">
                <span class="input-group-text "><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <span class="input-group-text"><i class="bi bi-eye-slash-fill"></i></span>
            </div>
            <label for="exampleFormControlInput1" class="form-label">No.SIP Dokter Pendiri Fasyankes: @error('No_sip_dokter'){{ $message }}@enderror</label>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-medical-fill"></i></span>
                <input type="text" class="form-control" placeholder="No.SIP Dokter Pendiri Fasyankes" aria-describedby="basic-addon1" name="No_sip_dokter" required>
            </div>
            <label for="exampleFormControlInput1" class="form-label">Kategori Fasyankes @error('Kategori_Fasyankes'){{ $message }}@enderror</label>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-buildings-fill"></i></span>
                <select class="form-select form-select-sm" aria-label="Small select example" name="Kategori_Fasyankes" required>
                    <option selected>Pilih Jenis Fasyankes</option>
                    <option value="1">Rumah Sakit </option>
                    <option value="2">Klinik</option>
                    <option value="3">Puskesmas</option>
                </select>
            </div>
            <label for="exampleFormControlInput1" class="form-label">Status Fasyankes @error('status_Fasyankes'){{ $message }}@enderror</label>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-earmark-medical-fill"></i></span>
                <select class="form-select form-select-sm" aria-label="Small select example" name="status_Fasyankes" required>
                    <option selected>Pilih Status Fasyankes</option>
                    <option value="1">SWASTA </option>
                    <option value="2">NEGERI</option>
                </select>
            </div>
            <label for="exampleFormControlInput1" class="form-label">alamat Lengkap Fasyankes:@error('alamat_fasyankes'){{ $message }}@enderror</label>
            <div class="input-group mb-4 ">
                <span class="input-group-text "><i class="bi bi-geo"></i></span>
                <textarea class="form-control" placeholder="alamat Lengkap Fasyankes" id="floatingTextarea" name="alamat_fasyankes"></textarea>
            </div>
            <button class="mt-4">Daftarkan Fasyankes!</button>
        </form>
    </div>
</div>
@endsection