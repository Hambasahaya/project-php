<?= $this->extend('auth/layouts/index') ?>

<?= $this->section('content') ?>

<title>Login</title>

<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">

            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

            <form action="<?= route_to('login') ?>" method="post" class="users">
                <?= csrf_field() ?>

                <?php if ($config->validFields === ['email']): ?>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email"
                            class="form-control form-control-xl <?php if (session('errors.login')): ?>is-invalid<?php endif ?>"
                            name="login" placeholder="<?= lang('Auth.email') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text"
                            class="form-control form-control-xl <?php if (session('errors.login')): ?>is-invalid<?php endif ?>"
                            name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" name="password"
                        class="form-control form-control-xl <?php if (session('errors.password')): ?>is-invalid<?php endif ?>"
                        placeholder="<?= lang('Auth.password') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                    </div>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>

                <?php if ($config->allowRemembering): ?>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')): ?>
                                    checked <?php endif ?>>
                            <?= lang('Auth.rememberMe') ?>
                        </label>
                    </div>
                <?php endif; ?>

                <button type="submit"
                    class="btn btn-primary btn-block btn-xl shadow-lg mt-5"><?= lang('Auth.loginAction') ?></button>

                <?php if ($config->activeResetter): ?>
                    <div class="text-center mt-5 text-lg fe-4">
                        <a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                    </div>
                <?php endif; ?>
            </form>

            <?php if ($config->allowRegistration): ?>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">Don't have an account? <a
                            href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right" style="background: url('images/g2.jpg'); background-size: cover;">
        </div>
    </div>

</div>

<?= $this->endSection() ?>