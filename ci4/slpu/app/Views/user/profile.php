<?= $this->extend('admin/layouts/sidebar'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>

    <h2 class="my-4"><b>My Profile</b></h2>
    <p>Update / Edit Profile</p>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="width: 80rem;">
                <div class="card-body">
                    <small>Full Name</small>
                    <h5 class="card-title"><?= $users->fullname ?></h5>
                    <small>Email</small>
                    <p class="card-text text-dark"><?= $users->email ?></p>
                    <small>Username</small>
                    <p class="card-text text-dark"><?= $users->username ?></p>
                    <hr>
                    <p class="card-text"><?= $users->unit_organisasi ?></p>
                    <p class="card-text"><?= $users->unit_kerja ?></p>

                    <hr>
                    <br>

                    <form action="<?= base_url('profile/resetPassword'); ?>" method="post">
                        <?= csrf_field() ?>
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= is_array(session()->getFlashdata('error')) ? implode('<br>', session()->getFlashdata('error')) : session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="old_password">Current Password</label>
                            <input type="password" class="form-control" id="old_password" name="old_password" required>
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                required>
                        </div>

                        <button type="submit" class="btn btn-warning">Reset Password</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>