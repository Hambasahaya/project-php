<?= $this->extend('auth/layouts/index') ?>

<?= $this->section('content') ?>

<title>Sign Up</title>

<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">

            <h1 class="auth-title">Sign Up</h1>
            <br>

            <!-- <?= view('Myth\Auth\Views\_message_block') ?> -->

            <form action="<?= route_to('register') ?>" method="post" class="users">
                <?= csrf_field() ?>

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text"
                        class="form-control form-control-xl <?php if (session('errors.fullname')): ?>is-invalid<?php endif ?>"
                        name="fullname" placeholder="Fullname" value="<?= old('fullname') ?>">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text"
                        class="form-control form-control-xl <?php if (session('errors.username')): ?>is-invalid<?php endif ?>"
                        name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email"
                        class="form-control form-control-xl <?php if (session('errors.email')): ?>is-invalid<?php endif ?>"
                        name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>"
                        value="<?= old('email') ?>">
                    <p>Harus menggunakan email @pu.go.id</p>
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>

                <div class="form-group position-relative has-icon-left mb-4">
                    <select class="form-control form-control-xl bg-light" name="unit_organisasi">
                        <option value="" class="text-muted" disabled selected>Pilih Unit Organisasi</option>
                        <option value="Setjen">Sekretariat Jenderal</option>
                        <option value="Itjen">Inspektorat Jenderal</option>
                        <option value="Ditjen Sumber Daya Air">Direktorat Jenderal Sumber Daya Air</option>
                        <option value="Ditjen Bina Marga">Direktorat Jenderal Bina Marga</option>
                        <option value="Ditjen Cipta Karya">Direktorat Jenderal Cipta Karya</option>
                        <option value="Ditjen Perumahan">Direktorat Jenderal Perumahan</option>
                        <option value="Ditjen Bina Konstruksi">Direktorat Jenderal Bina Konstruksi</option>
                        <option value="Ditjen Pembiayaan Infrastruktur Pekerjaan Umum dan Perumahan">Direktorat
                            Jenderal Pembiayaan Infrastruktur Pekerjaan Umum dan
                            Perumahan</option>
                        <option value="BPIW">Badan Pengembangan Infrastruktur Wilayah</option>
                        <option value="BPSDM">Badan Pengembangan Sumber Daya Manusia</option>
                        <option value="BPJT">Badan Pengatur Jalan Tol</option>
                    </select>
                    <div class="form-control-icon">
                        <i class="bi bi-card-list"></i>
                    </div>
                </div>

                <div class="form-group position-relative has-icon-left mb-4">
                    <select class="form-control form-control-xl bg-light" name="unit_kerja">
                    </select>
                    <div class="form-control-icon">
                        <i class="bi bi-list-nested"></i>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password"
                                class="form-control form-control-xl <?php if (session('errors.password')): ?>is-invalid<?php endif ?>"
                                name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password"
                                class="form-control form-control-xl <?php if (session('errors.pass_confirm')): ?>is-invalid<?php endif ?>"
                                name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <button type="submit"
                    class="btn btn-primary btn-block btn-xl shadow-lg mt-5"><?= lang('Auth.register') ?></button>
            </form>

            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Already have an account? <a
                        href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
            </div>

        </div>
    </div>

    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right" style="background: url('images/e.jpg'); background-size: cover;">
        </div>
    </div>

</div>

<?= $this->endSection() ?>