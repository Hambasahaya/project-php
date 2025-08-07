<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-body shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                @if(request()->routeIs('ManageEmployee') && Auth::user()->role->role_name==="hr")
                <div class="header-table d-flex p-3 mb-3 justify-content-between w-100 align-items-center align-content-center">
                    <h4 class="card-title">Data karyawan</h4>
                    <div class="btn-tops d-flex gap-2">
                        <button type="button" class="btn btn-gradient-primary btn-fw" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Employee</button>
                        <a href="{{route('karyawanmerge')}}" class="btn btn-gradient-primary btn-fw">Rekap Data Karyawan</a>
                    </div>
                </div>
                @endif
                @if(request()->routeIs('Managehr') && Auth::user()->role->role_name==="admin")
                <div class="header-table d-flex p-3 mb-3 justify-content-between w-100 align-items-center align-content-center">
                    <h4 class="card-title">Data Human Resource</h4>
                    <button type="button" class="btn btn-gradient-primary btn-fw" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Human Resource</button>
                </div>
                @endif
                @if(request()->routeIs('Managedivisi') && Auth::user()->role->role_name==="admin")
                <div class="header-table d-flex p-3 mb-3 justify-content-between w-100 align-items-center align-content-center">
                    <h4 class="card-title">Data Divisi</h4>
                    <button type="button" class="btn btn-gradient-primary btn-fw" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Divisi</button>
                </div>
                @endif
                @if(request()->routeIs('Managerole') && Auth::user()->role->role_name==="admin")
                <div class="header-table d-flex p-3 mb-3 justify-content-between w-100 align-items-center align-content-center">
                    <h4 class="card-title">Data Role Akses</h4>
                    <button type="button" class="btn btn-gradient-primary btn-fw" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Role</button>
                </div>
                @endif
                @if(request()->routeIs('Task'))
                <div class="header-table d-flex p-3 mb-3 justify-content-between w-100 align-items-center align-content-center">
                    <h4 class="card-title">Data Task </h4>
                    <button type="button" class="btn btn-gradient-primary btn-fw" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Task</button>
                </div>
                @endif
                @if(request()->routeIs('Absen') )
                <div class="header-table d-flex p-3 mb-3 justify-content-between w-100 align-items-center align-content-center">
                    <h4 class="card-title">Data Log Absen Harian</h4>
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                        <thead>
                            @if(request()->routeIs('ManageEmployee') && Auth::user()->role->role_name==="hr")
                            <tr>
                                <th> No </th>
                                <th> Nama </th>
                                <th> Jenis Kelamin </th>
                                <th> Foto </th>
                                <th> Alamat Lengkap </th>
                                <th> Tanggal Lahir </th>
                                <th> No.Hp </th>
                                <th> Email </th>
                                <th> Divisi </th>
                                <th> Role </th>
                                <th> Action </th>
                            </tr>
                            @endif
                            @if(request()->routeIs('Managehr') && Auth::user()->role->role_name==="admin")
                            <tr>
                                <th> Nama </th>
                                <th> Email </th>
                                <th> Divisi </th>
                                <th> Role </th>
                            </tr>
                            @endif
                            @if(request()->routeIs('Task'))
                            <tr>
                                <th> No </th>
                                <th> Judul Task </th>
                                <th> Deskripsi Task </th>
                                <th> Status Task </th>
                                <th> File Task </th>
                                <th> Tanggal Deadline </th>
                                <th> Action </th>
                            </tr>
                            @endif
                            @if(request()->routeIs('Managedivisi') && Auth::user()->role->role_name==="admin")
                            <tr>
                                <th> No </th>
                                <th> Nama Divisi </th>
                                <th> Kepala Divisi </th>
                                <th> Action </th>
                            </tr>
                            @endif
                            @if(request()->routeIs('Managerole') && Auth::user()->role->role_name==="admin")
                            <tr>
                                <th> No </th>
                                <th> Role Name </th>
                                <th> Action </th>
                            </tr>
                            @endif
                            @if(request()->routeIs('Absen'))
                            <tr>
                                <th> No </th>
                                <th> Tanggal Absen </th>
                                <th> Foto Absen </th>
                                <th> Lokasi Absen </th>
                                <th> Jam Absen </th>
                                <th> Status Absen </th>
                            </tr>
                            @endif
                        </thead>
                        <tbody>
                            @if(request()->routeIs('ManageEmployee') && Auth::user()->role->role_name==="hr" && $data!=null)
                            @foreach($data as $datakaryawan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$datakaryawan->nama}}</td>
                                <td>
                                    {{ optional($datakaryawan->detail->first())->jenis_kelamin ?? 'Data Belum dilengkapi Data' }}
                                </td>
                                <td class="py-1">
                                    <img src="{{ asset('storage/foto_profil/' . ($datakaryawan->detail->first()->foto_profil ?? 'foto_profil.png')) }}" alt="image" />
                                </td>
                                <td>
                                    {{ optional($datakaryawan->detail->first())->alamat_lengkap ?? 'data Belum dilengkapi Data' }}
                                </td>
                                <td>
                                    {{ optional($datakaryawan->detail->first())->tanggal_lahir ?? 'data Belum dilengkapi Data' }}
                                </td>
                                <td>
                                    {{ optional($datakaryawan->detail->first())->no_hp ?? 'data Belum dilengkapi Data' }}
                                </td>
                                <td>{{$datakaryawan->email}}</td>
                                <td>{{$datakaryawan->divisi->nama_divisi}}</td>
                                <td>{{$datakaryawan->role->role_name}}</td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <button
                                            type="button"
                                            class="btn btn-gradient-warning btn-fw btn-edit-karyawan"
                                            data-id="{{ $datakaryawan->id }}"
                                            data-user-role="{{ $datakaryawan->role->id}}"
                                            data-user-divisi="{{ $datakaryawan->divisi->id}}"
                                            data-role-online="{{Auth::user()->role->id}}">
                                            Update
                                        </button>
                                        <a href="{{ route('deletekaryawan', ['id' => $datakaryawan->id]) }}" class="btn btn-gradient-danger btn-fw">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                            @if(request()->routeIs('Absen') && $data !=null)
                            @foreach($data as $dataabsen)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$dataabsen->tanggal}}</td>
                                <td class="py-1">
                                    <img src="{{ asset('storage/foto_absen/' . $dataabsen->foto_absen) }}" alt="image" />
                                </td>
                                <td>
                                    {{$dataabsen->lokasi_absen}}
                                </td>
                                <td>{{$dataabsen->jam_masuk}}</td>
                                <td>{{$dataabsen->status}}</td>
                            </tr>
                            @endforeach
                            @endif
                            @if(request()->routeIs('Task') && $data !=null)
                            @foreach($data as $datatask)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$datatask->judul}}</td>
                                <td>{{$datatask->deskripsi}}</td>
                                <td>{{$datatask->status_task}}</td>
                                <td>
                                    @if ($datatask->file_tugas)
                                    @php
                                    $filePath = 'storage/file_task/' . $datatask->file_tugas;
                                    $extension = strtolower(pathinfo($datatask->file_tugas, PATHINFO_EXTENSION));
                                    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
                                    @endphp

                                    @if (in_array($extension, $imageExtensions))
                                    <a href="{{ $filePath }}" target="_blank">Lihat Gambar</a>
                                    @else
                                    <a href="{{ $filePath }}" download>Download File</a>
                                    @endif
                                    @else
                                    Tidak Ada File Tugas
                                    @endif
                                </td>
                                <td>{{$datatask->tanggal_deadline}}</td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <button
                                            type="button"
                                            class="btn btn-gradient-warning btn-fw btn-edit-task"
                                            data-id="{{ $datatask->id }}">
                                            Update
                                        </button>
                                        <a href="{{ route('hapustask', ['id' => $datatask->id]) }}" class="btn btn-gradient-danger btn-fw">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            @if(request()->routeIs('Managehr') && Auth::user()->role->role_name==="admin" && $data !=null)
                            @foreach($data as $datahr)
                            <tr>
                                <td>{{$datahr->nama}}</td>
                                <td>
                                    {{$datahr->email}}
                                </td>
                                <td>{{$datahr->divisi->nama_divisi}}</td>
                                <td>{{$datahr->role->role_name}}</td>
                            </tr>
                            @endforeach
                            @endif
                            @if(request()->routeIs('Managedivisi') && Auth::user()->role->role_name==="admin"&& $data !=null)
                            @foreach($data as $datadivisi)
                            <tr>
                                <td>{{$datadivisi->id}}</td>
                                <td>
                                    {{$datadivisi->nama_divisi}}
                                </td>
                                <td>
                                    {{$datadivisi->kepala_divisi?'$datadivisi->kepala_divisi?':"Belum Dipilih oleh HR"}}
                                </td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <button
                                            type="button"
                                            class="btn btn-gradient-warning btn-fw btn-edit-divisi"
                                            data-id="{{ $datadivisi->id }}">
                                            Update
                                        </button>
                                        <a href="{{ route('deletedivisi', ['id' => $datadivisi->id]) }}" class="btn btn-gradient-danger btn-fw">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            @if(request()->routeIs('Managerole') && Auth::user()->role->role_name==="admin"&& $data !=null)
                            @foreach($data as $datarole)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{$datarole->role_name}}
                                </td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <button
                                            type="button"
                                            class="btn btn-gradient-warning btn-fw btn-edit-role"
                                            data-id="{{ $datarole->id }}">
                                            Update
                                        </button>
                                        <a href="{{ route('deleterole', ['id' => $datarole->id]) }}" class="btn btn-gradient-danger btn-fw">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            @if(request()->routeIs('ManageEmployee') && Auth::user()->role->role_name==="hr")
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Karyawan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Karyawan</label>
                        <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                        <div id="emailHelp" class="form-text">Alamat Email Ini Akan Digunakan Untuk karyawan Melakukan Login</div>
                    </div>
                    <div class="mb-3">
                        <select required class="form-select" aria-label="Default select example" name="role_id">
                            <option selected value="">pilih Role untuk Karyawan Baru</option>
                            @foreach($datarole as $data)
                            <option value="{{$data->id}}">{{$data->role_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <select required class="form-select" aria-label="Default select example" name="division_id">
                            <option selected value="">pilih Divsi untuk Karyawan Baru</option>
                            @foreach($datadivisi as $data)
                            @if($data->nama_divisi==="hr")
                            continue;
                            @endif
                            <option value="{{$data->id}}">{{$data->nama_divisi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create karyawan Account</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        @endif
        @if(request()->routeIs('Task'))
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Task</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Judul Tugas</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul">
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Jelaskan Deskripsi Tugas Anda" id="floatingTextarea2" style="height: 100px" name="deskripsi"></textarea>
                        <label for="floatingTextarea2">Deskripsi Tugas</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Deadline Tugas</label>
                    <input required type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="deadline">
                </div>
                <button type="submit" class="btn btn-primary">Buat Tugas Baru!</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    @endif
    @if(request()->routeIs('Managehr') && Auth::user()->role->role_name==="admin")
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Human Resource</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Human Resource</label>
                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">Alamat Email Ini Akan Digunakan Untuk HR Melakukan Login</div>
            </div>
            <button type="submit" class="btn btn-primary">Create HR Account</button>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
</div>
@endif
@if(request()->routeIs('Managedivisi') && Auth::user()->role->role_name==="admin")
<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Divisi</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Divisi</label>
            <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_divisi">
        </div>
        <button type="submit" class="btn btn-primary">Create New Divisi</button>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
</div>
@endif
@if(request()->routeIs('Managerole') && Auth::user()->role->role_name==="admin")
<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Role</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Role Name</label>
            <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="role_name">
        </div>
        <button type="submit" class="btn btn-primary">Create New Role</button>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
</div>
@endif
</div>
</div>
<!-- Modal Update -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                @if(request()->routeIs('ManageEmployee') && Auth::user()->role->role_name==='hr')
                <form id="form-update-karyawan" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input required type="hidden" name="id" id="edit-id">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Karyawan</label>
                        <input required type="text" class="form-control" id="edit-nama-karyawan" aria-describedby="emailHelp" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input required type="email" class="form-control" id="edit-email-karyawan" aria-describedby="emailHelp" name="email">
                        <div id="emailHelp" class="form-text">Alamat Email Ini Akan Digunakan Untuk karyawan Melakukan Login</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nomor Hp</label>
                        <input required type="text" class="form-control" id="edit-nomorhp" name="no_hp">
                        <div id="emailHelp" class="form-text">Pastikan Nomor Telfon Ini Aktif</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="edit-tanggal-lahir" name="tanggal_lahir">
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Alamat Lengkap Karyawan" id="edit-alamat" style="height: 100px" name="alamat_lengkap"></textarea>
                            <label for="floatingTextarea2">Alamat Lengkap Karyawan</label>
                        </div>
                    </div>
                    <div class="mb-3 d-flex gap-3">
                        <div class="form-check ">
                            <input required class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="Laki-laki" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input required class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios2" value="Perempuan">
                            <label class="form-check-label" for="exampleRadios2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <select required class="form-select" aria-label="Default select example" name="role_id" id="update-karyawan-role">
                            <option selected value="">pilih Role untuk Karyawan</option>
                            @foreach($datarole as $data)
                            <option value="{{$data->id}}">{{$data->role_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <select required class="form-select" aria-label="Default select example" name="division_id" id="update-karyawan-divisi">
                            <option selected value="">pilih Divsi untuk Karyawan </option>
                            @foreach($datadivisi as $data)
                            @if($data->nama_divisi==="hr")
                            continue;
                            @endif
                            <option value="{{$data->id}}">{{$data->nama_divisi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Upload Foto Karyawan</label>
                            <input required type="file" class="form-control" id="inputGroupFile01" name="foto_profile">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update data Karyawan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
        @if(request()->routeIs('Task'))
        <form id="form-update-task" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Update Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input required type="hidden" name="id" id="edit-id">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Judul Tugas</label>
                    <input required type="text" class="form-control" id="edit-judul" aria-describedby="emailHelp" name="judul">
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Jelaskan Deskripsi Tugas Anda" id="edit-deskripsi" style="height: 100px" name="deskripsi"></textarea>
                        <label for="floatingTextarea2">Deskripsi Tugas</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Deadline Tugas</label>
                    <input required type="date" class="form-control" id="edit-deadline" aria-describedby="emailHelp" name="deadline">
                </div>
                <div class="mb-3">
                    <select required class="form-select" aria-label="Default select example" name="status_task">
                        <option selected value="">Status Tugas</option>
                        <option value="On Progres">On Progres</option>
                        <option value="In Revision">In Revision</option>
                        <option value="On Review">On Review</option>
                        <option value="Done">Done</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Upload</label>
                    <input required type="file" class="form-control" id="inputGroupFile01" name="file_tugas">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Task</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
        @endif
        @if(request()->routeIs('Managedivisi') && Auth::user()->role->role_name==="admin")
        <form id="form-update-divisi" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Update Divisi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input required type="hidden" name="id" id="edit-id">
                <div class="mb-3">
                    <label class="form-label">Nama Divisi</label>
                    <input required type="text" class="form-control" name="nama_divisi" id="edit-nama-divisi">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
        @endif
        @if(request()->routeIs('Managerole') && Auth::user()->role->role_name==="admin")
        <form id="form-update-role" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Update Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input required type="hidden" name="id" id="edit-id">
                <div class="mb-3">
                    <label class="form-label">Role Name</label>
                    <input required type="text" class="form-control" name="role_name" id="edit-nama-role">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
        @endif

    </div>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttonsdivisi = document.querySelectorAll('.btn-edit-divisi');
        buttonsdivisi.forEach(button => {
            button.addEventListener('click', async () => {
                const id = button.getAttribute('data-id');
                try {
                    const response = await fetch(`/divisi/${id}`);
                    const result = await response.json();

                    if (result.success) {
                        document.getElementById('edit-id').value = id;
                        document.getElementById('edit-nama-divisi').value = result.data.nama_divisi;
                        document.getElementById('form-update-divisi').action = `/divisi/update/${id}`;
                        const modal = new bootstrap.Modal(document.getElementById('editModal'));
                        modal.show();
                    } else {
                        alert(result.message || 'Gagal mengambil data.');
                    }
                } catch (error) {
                    console.error(error);
                    alert('Terjadi kesalahan saat mengambil data.');
                }
            });
        });
        //role
        const buttonsrole = document.querySelectorAll('.btn-edit-role');
        buttonsrole.forEach(button => {
            button.addEventListener('click', async () => {
                const id = button.getAttribute('data-id');
                try {
                    const response = await fetch(`/role/${id}`);
                    const result = await response.json();

                    if (result.success) {
                        document.getElementById('edit-id').value = id;
                        document.getElementById('edit-nama-role').value = result.data.role_name;
                        document.getElementById('form-update-role').action = `/role/update/${id}`;
                        const modal = new bootstrap.Modal(document.getElementById('editModal'));
                        modal.show();
                    } else {
                        alert(result.message || 'Gagal mengambil data.');
                    }
                } catch (error) {
                    console.error(error);
                    alert('Terjadi kesalahan saat mengambil data.');
                }
            });
        });
        //task
        const buttonstask = document.querySelectorAll('.btn-edit-task');
        buttonstask.forEach(button => {
            button.addEventListener('click', async () => {
                const id = button.getAttribute('data-id');
                try {
                    const response = await fetch(`/task/${id}`);
                    const result = await response.json();

                    if (result.success) {
                        document.getElementById('edit-id').value = id;
                        document.getElementById('edit-judul').value = result.data.judul;
                        document.getElementById('edit-deskripsi').value = result.data.deskripsi;
                        document.getElementById('edit-deadline').value = result.data.tanggal_deadline;
                        document.getElementById('form-update-task').action = `/task/update/${id}`;
                        const modal = new bootstrap.Modal(document.getElementById('editModal'));
                        modal.show();
                    } else {
                        alert(result.message || 'Gagal mengambil data.');
                    }
                } catch (error) {
                    console.error(error);
                    alert('Terjadi kesalahan saat mengambil data.');
                }
            });
        });
        const buttonskaryawan = document.querySelectorAll('.btn-edit-karyawan');
        const editrole = document.getElementById('update-karyawan-role');
        const editdivisi = document.getElementById('update-karyawan-divisi');

        buttonskaryawan.forEach(button => {
            button.addEventListener('click', async () => {
                const id = button.getAttribute('data-id');
                const userrole = button.getAttribute('data-user-role')
                const userdivisi = button.getAttribute('data-user-divisi')
                const useronlinerole = button.getAttribute('data-role-online')
                if (userrole === useronlinerole) {
                    editrole.classList.add('d-none');
                    editdivisi.classList.add('d-none');
                    editrole.value = userrole
                    editdivisi.value = userdivisi
                }
                try {
                    const response = await fetch(`/karyawan/${id}`);
                    const result = await response.json();

                    if (result.success) {
                        document.getElementById('edit-id').value = id;
                        document.getElementById('edit-nama-karyawan').value = result.data.nama;
                        document.getElementById('edit-email-karyawan').value = result.data.email;
                        document.getElementById('edit-alamat').value = result.data.detail?.[0]?.alamat_lengkap ?? '';
                        document.getElementById('edit-tanggal-lahir').value = result.data.detail?.[0]?.tanggal_lahir ?? '';
                        document.getElementById('edit-nomorhp').value = result.data.detail?.[0]?.no_hp ?? '';
                        document.getElementById('form-update-karyawan').action = `/karyawan/update/${id}`;
                        const modal = new bootstrap.Modal(document.getElementById('editModal'));
                        modal.show();
                    } else {
                        alert(result.message || 'Gagal mengambil data.');
                    }
                } catch (error) {
                    console.error(error);
                    alert('Terjadi kesalahan saat mengambil data.');
                }
            });
        });
    });
</script>