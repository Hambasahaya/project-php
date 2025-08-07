<style>
    #icon {
        color: white
    }

    .nav-link:hover span,
    .nav-link:hover #icon {
        color: #012970;
        transition: 0.3s;
    }

    .nav-item.active .nav-link #icon,
    .nav-item.active .nav-link span {
        color: #012970;
    }
</style>

<aside id="sidebar" class="sidebar" style="background-color:#FF6347">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-heading text-white">Menu</li>

        <li class="nav-item shadow-sm {{ Str::startsWith(request()->route()->getName(), 'dashboard') ? 'active' : '' }}">
            <a class="nav-link active text-white" href="/" style="background-color:#f75c41">
                <i class="bi bi-grid" id="icon" id="icon"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item shadow-sm {{ Str::startsWith(request()->route()->getName(), 'sltm') ? 'active' : '' }}">
            <a class="nav-link active text-white" href="/sltm" style="background-color:#f75c41">
                <i class="bx bx-money" id="icon"></i>
                <span>Prediksi Saham LSTM</span>
            </a>
        </li>

        <li class="nav-item shadow-sm {{ Str::startsWith(request()->route()->getName(), 'regresi') ? 'active' : '' }}">
            <a class="nav-link active text-white" href="/regresi" style="background-color:#f75c41">
                <i class="bx bxs-bell" id="icon"></i>
                <span>Prediksi Saham Regresi Linier</span>
            </a>
        </li>

        <li class="nav-heading text-white mt-4">Preferences</li>

        <li class="nav-item shadow-sm {{ Str::startsWith(request()->route()->getName(), 'profile') ? 'active' : '' }}">
            <a class="nav-link active text-white" href="/profile" style="background-color:#f75c41">
                <i class="bi bi-person" id="icon"></i>
                <span>My Profile</span>
            </a>
        </li>

        <li class="nav-item shadow-sm {{ Str::startsWith(request()->route()->getName(), 'setting') ? 'active' : '' }}">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <div class="d-grid gap-2">
                    <button class="nav-link active text-white border-0" style="background-color:#f75c41">
                        <i class="bx bx-cog" id="icon"></i>
                        <span>Sign Out</span>
                    </button>
                </div>
            </form>
        </li>

        <li class="nav-heading text-white mt-4">Support</li>

        <li class="nav-item shadow-sm {{ Str::startsWith(request()->route()->getName(), 'support') ? 'active' : '' }}">
            <a class="nav-link active text-white"
                href="https://api.whatsapp.com/send?phone=6281339999352&amp;text=Halo,%20saya%20butuh%20bantuan"
                style="background-color:#f75c41" target="_blank">
                <i class="bi bi-question-circle" id="icon"></i>
                <span>Help & Support</span>
            </a>
        </li>

    </ul>

</aside>
