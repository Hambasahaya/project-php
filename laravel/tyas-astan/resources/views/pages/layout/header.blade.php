<header id="header" class="header fixed-top d-flex align-items-center" style="background-color:#FF6347">

    <div class="d-flex align-items-center
    justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block fw-bold text-white">ASTANTYAS</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn text-white"></i>
    </div>

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link nav-icon text-white" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 mt-1 bg-danger rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="notification-item">
                        <div>
                            <h4>Message</h4>
                            <p>4 hrs. ago</p>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link nav-icon text-white" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-chat-left-text"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 mt-1 bg-danger rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="message-item">
                        <a href="#">
                            <div>
                                <h4>Message</h4>
                                <p>4 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <span
                        class="d-none d-md-block dropdown-toggle text-white">{{ Str::ucfirst(auth()->user()->name) }}</span>
                    <img src="{{ auth()->user()->avatar == null ? asset('avatar/default.jpg') : asset('storage/avatar/' . auth()->user()->avatar) }}"
                        alt="Profile" class="rounded-circle ps-2">
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Str::upper(auth()->user()->name) }}</h6>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item d-flex align-items-center">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>

</header>
