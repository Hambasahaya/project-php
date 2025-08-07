@extends("layout.Adminlayout")
@section("contentadmin")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <tr>
                            <th>Nama Pendaftar</th>
                            <th>fakultas</th>
                            <th>jurusan</th>
                            <th>nim</th>
                            <th>pilihan_ukm</th>
                            <th>email</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $usersdata)
                        <tr>
                            <td>{{$usersdata->nama}}</td>
                            <td>{{$usersdata->fakultas}}</td>
                            <td>{{$usersdata->jurusan}}</td>
                            <td>{{$usersdata->nim}}</td>
                            <td>{{$usersdata->pilihan_ukm}}</td>
                            <td>{{$usersdata->email}}</td>
                            <td>
                                <div class="d-grid gap-2 d-md-block">
                                    <a href="/admin/users/update/{{ $usersdata->id }}" class="btn btn-primary">update</a>
                                    <a href="/admin/users/delete/{{ $usersdata->id}}" class="btn btn-warning">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach;
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- /.container-fluid -->
@endsection