@php
$isAdmin = auth()->user()->role === 'admin';
$isHR = auth()->user()->role === 'HR';

$formAction =
($isAdmin && Route::is('CreateHr')) ? route('CreateHr') :
(($isAdmin && Route::is('CreateDivisi')) ? route('CreateDivisi') :
(($isAdmin && Route::is('UpdateDivisi')) ? route('UpdateDivisi') :
(($isAdmin && Route::is('CreateRole')) ? route('CreateRole') :
(($isAdmin && Route::is('updateRole')) ? route('updateRole') :
(($isHR && Route::is('CreateEmployee')) ? route('CreateEmployee') :
(($isHR && Route::is('UpdateEmployee')) ? route('UpdateEmployee') : '#'))))));
@endphp

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Horizontal Form</h4>
            <p class="card-description"> Horizontal form layout </p>

            <form class="forms-sample" method="POST" action="{{ $formAction }}">
                @csrf
                @if($isAdmin && Route::is('CreateHr'))
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="nama">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" id="nama" class="form-control"
                            placeholder="Nama" value="{{ old('nama') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="email">Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Email" value="{{ old('email') }}">
                    </div>
                </div>

                @elseif($isAdmin && (Route::is('CreateDivisi') || Route::is('UpdateDivisi')))
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="nama_divisi">Nama Divisi</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_divisi" id="nama_divisi" class="form-control"
                            placeholder="Nama Divisi"
                            value="{{ old('nama_divisi', $data->nama_divisi ?? '') }}">
                    </div>
                </div>

                @elseif($isAdmin && (Route::is('CreateRole') || Route::is('updateRole')))
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="role_name">Role Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="role_name" id="role_name" class="form-control"
                            placeholder="Role Name"
                            value="{{ old('role_name', $data->role_name ?? '') }}">
                    </div>
                </div>

                @elseif($isHR && (Route::is('CreateEmployee') || Route::is('UpdateEmployee')))
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="nama">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" id="nama" class="form-control"
                            placeholder="Nama"
                            value="{{ old('nama', $data->nama ?? '') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="email">Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Email"
                            value="{{ old('email', $data->email ?? '') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="role_id">Role</label>
                    <div class="col-sm-9">
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ old('role_id', $data->role_id ?? '') == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="division_id">Division</label>
                    <div class="col-sm-9">
                        <select name="division_id" id="division_id" class="form-control">
                            @foreach($divisions as $division)
                            <option value="{{ $division->id }}"
                                {{ old('division_id', $data->division_id ?? '') == $division->id ? 'selected' : '' }}>
                                {{ $division->nama_divisi }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                <button type="reset" class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>