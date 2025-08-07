<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WiniCodeIndonesia</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="/css/style.css">

    <style>
        .sidebar {
            height: 100vh;
            position: sticky;
            top: 0;
        }

        @media (max-width: 768px) {
            .sidebar {
                height: auto;
                position: relative;
            }
        }

        .sidebar .nav-link.active {
            background-color: #ffc107;
            color: #000;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar p-3">
                <div class="text-center mb-4">
                    <h4 class="text-white">WiniCode</h4>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <span class="fw-bold">Halo, {{ Auth::user()->nama }}</span>
                    </li>
                    @if(Auth::user()->level==="Staff")
                    <li class="nav-item">
                        <button class="btn btn-outline-light w-100 text-start mb-2" data-bs-toggle="modal" data-bs-target="#izinModal">
                            <i class="bi bi-send-plus me-2"></i>Leave Application
                        </button>
                    </li>
                    <li class="nav-item">
                        <a href="#histori" class="btn btn-outline-warning w-100 text-start mb-2">
                            <i class="bi bi-clock-history me-2"></i>Histori
                        </a>
                    </li>
                    @endif

                    @if(Auth::user()->level==="HR")
                    <li class="nav-item">
                        <button class="btn btn-outline-light w-100 text-start mb-2" data-bs-toggle="modal" data-bs-target="#izinModal">
                            <i class="bi bi-person-plus me-2"></i>Add Pegawai
                        </button>
                    </li>
                    @endif

                    <li class="nav-item">
                        <button class="btn btn-outline-light w-100 text-start mb-2" data-bs-toggle="modal" data-bs-target="#statusmodal">
                            <i class="bi bi-clipboard-plus me-2"></i>Pengajuan Status
                        </button>
                    </li>

                    <li class="nav-item mt-auto">
                        <a href="{{ route('logout') }}" class="btn btn-outline-secondary w-100 text-start">
                            <i class="bi bi-box-arrow-right me-2"></i>Keluar
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
                <x-modals />

            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>