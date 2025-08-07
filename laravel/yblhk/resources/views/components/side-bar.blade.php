<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="/dasboard" class="b-brand text-primary">
                <img src="/Assets/img/logo2.png" class="img-fluid logo-lg" alt="logo" width="50" height="50"> YBLHK-DKI
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="/dasboard" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="pc-item pc-caption">
                    <label>Menu</label>
                    <i class="ti ti-dashboard"></i>
                </li>
                @if(Auth::user()->level=="admin")
                <li class="pc-item">
                    <a href="{{route('DaftarPengaduan')}}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-typography"></i></span>
                        <span class="pc-mtext">Daftar Laporan Pengaduan</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{route('KategoriLaporan')}}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-typography"></i></span>
                        <span class="pc-mtext">Kategori Pelaporan</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->level=="user")
                <li class="pc-item">
                    <a href="{{route('AddLaporan')}}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-typography"></i></span>
                        <span class="pc-mtext">Lapor Pengaduan</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{route('statuspengaduan')}}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
                        <span class="pc-mtext">Cek Status Pengaduan</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>