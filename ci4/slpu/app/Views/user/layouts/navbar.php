<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="<?= base_url('beranda'); ?>">Beranda</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="<?= base_url('myurl'); ?>">MyUrl</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('profile'); ?>">Profile</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout'); ?>" data-bs-toggle="modal"
            data-bs-target="#logoutModal">Logout</a>
    </li>
</ul>

<hr>

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a class="btn btn-danger" href="<?= base_url('logout'); ?>">Ya</a>
            </div>
        </div>
    </div>
</div>