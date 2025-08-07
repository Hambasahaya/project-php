<nav class="navbar navbar-expand-lg bg-body-white">
    <div class="container">
        <a href="{{ route($navbarType . '.home') }}" id="homelink">
            <img src="{{ asset('images/wnn3.png') }}" alt="" width="180" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-3">

                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('lowongan') ? 'active' : '' }}"
                        href="{{route('lowongan')}}" id="lowonganlink">Lowongan Kerja</a>
                </li>

                @if(Auth::check() && Auth::user()->role==="perusahaan")
                <a class="nav-link {{ request()->is('/listpelamar') ? 'active' : '' }}"
                    href="{{ route($navbarType . '.listPelamar') }}" id="lowonganlink">List Pelamar</a>
                @endif
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs($navbarType . '.listPerusahaan') ? 'active' : '' }}"
                        href="{{ route($navbarType . '.listPerusahaan') }}">
                        Perusahaan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs($navbarType . '.tentangkami') ? 'active' : '' }}"
                        href="{{ route($navbarType . '.tentangkami') }}">
                        Tentang Kami
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right-section">
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Bahasa
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Indonesia</a></li>
                        <li><a class="dropdown-item" href="#">Bahasa Inggris</a></li>
                    </ul>
                </li>

                @if(!Auth::check())
                <div style="display: flex; gap: 2px;">
                    <li class="nav-item"><a href="/login" class="btn btn-masuk ms-3">Masuk</a></li>
                    <li class="nav-item"><a href="/register" class="btn btn-perusahaan ms-2">Daftar</a></li>
                </div>
                @endif
                @if(Auth::check())
                <li class="nav-item dropdown ms-3">
                    <img class="nav-link dropdown-toggle rounded-circle  " style="height: 50px; width: 50px;"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                        src="{{asset('storage/foto_user/'.Auth::user()->foto)}}" alt="">

                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="{{ Auth::user()->role === 'pelamar' ? '/profilPelamar' : '/about-perusahaan' }}">Profile</a>
                        <li><a class="dropdown-item" href="/logout">Keluar</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>