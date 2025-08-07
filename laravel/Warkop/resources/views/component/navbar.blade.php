<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
            <img src="/assets/img/logo1.png" alt="">
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home<br></a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#contact">Contact</a></li>
                @if(Auth::user())
                <li><a href="/userpages"><i class="bi bi-person-check" style="font-size: 1.5rem;"></i></a></li>
                <li><a href="/carts">Cart</a></li>
                @else
                <li><a href="{{route('login')}}">Login!</a></li>
                @endif
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </div>
</header>