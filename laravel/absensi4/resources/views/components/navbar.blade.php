@if(Auth::user()->role==="mahasiswa")
<div class="d-flex justify-content-between align-items-center navbar">
    <div class="nav nav-pills">
        <a class="nav-link {{request()->routeIs('home')?'active':''}}" href="/">Home</a>
        <a class="nav-link {{request()->routeIs('grade')?'active':''}}" href="{{route('grade')}}">Grades</a>
        <a class="nav-link {{request()->routeIs('absen')?'active':''}} " href="{{route('absen')}}">Attendance</a>
    </div>
    <div class="profile-info">
        <span>Hi {{Auth::user()->nama}}, Welcome back</span>
        <a href="/editprofile"><img src="/img/mutiara.png" alt="profile"></a>
    </div>
</div>
@endif

@if(Auth::user()->role==="admin"|| Auth::user()->role==="dosen")
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <form class="form-inline">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
    </form>
    <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                    @if(Auth::user()->role==="admin")
                    Pak/Bu Admin {{Auth::user()->nama}}
                    @endif
                    @if(Auth::user()->role==="dosen")
                    Pak/buk Dosen {{Auth::user()->nama}}
                    @endif
                </span>
                <img src="{{ Auth::user()->detail?->foto 
    ? asset('storage/' . Auth::user()->detail->foto) 
    : asset('img/default.png') }}"
                    alt="Foto Pengguna" class="img-profile rounded-circle">

            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
@endif