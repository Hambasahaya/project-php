<nav class="navbar navbar-expand-lg bg-body-white">
    <div class="container">
        <a href="/perusahaan"><img src="{{ asset('images/wnn3.png') }}" alt="" width="180" height="50"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-3">
               
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('listlowongan') ? 'active' : '' }}" href="listlowongan" id="listlowongan">List Lowongan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('listperusahaan') ? 'active' : '' }}" href="/listperusahaan">Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('perusahaan-tentangkami') ? 'active' : '' }}" href="/perusahaan-tentangkami">Tentang Kami</a>
                    </li>
                
            </ul>
            <ul class="navbar-nav navbar-right-section">
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bahasa
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Indonesia</a></li>
                        <li><a class="dropdown-item" href="#">Bahasa Inggris</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown ms-3">
                   
                        <img class="nav-link dropdown-toggle rounded-circle  " style="height: 50px; width: 50px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" src="{{ asset('images/foto.png') }}" alt=""  >
                  
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/editprofil-perusahaan">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Keluar</a></li>
                    </ul>
                </li>
                
                    <li class="nav-item mt-1"><a href="/pelamar" class="btn btn-perusahaan ms-3">Untuk Pelamar</a></li>
                
            </ul>
        </div>
    </div>

   
</nav>