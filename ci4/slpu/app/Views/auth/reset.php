<?= $this->extend('auth/layouts/index'); ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card mx-auto">
                <div class="card-header">
                    <?= lang('Auth.resetYourPassword') ?>
                </div>
                <div class="card-body">
                    <br>
                    <p class="text-center"><?= lang('Auth.enterCodeEmailPassword') ?></p>

                    <!-- <?= view('Myth\Auth\Views\_message_block') ?> -->
                    <br>
                    <form action="<?= url_to('reset-password') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-group mb-4">
                            <label for="token"><?= lang('Auth.token') ?></label>
                            <input type="text"
                                class="form-control form-control-lg<?php if (session('errors.token')): ?>is-invalid<?php endif ?>"
                                name="token" value="<?= old('token', $token ?? '') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.token') ?>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="email"><?= lang('Auth.email') ?></label>
                            <input type="email"
                                class="form-control form-control-lg <?php if (session('errors.email')): ?>is-invalid<?php endif ?>"
                                name="email" aria-describedby="emailHelp" value="<?= old('email') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="password"><?= lang('Auth.newPassword') ?></label>
                            <input type="password"
                                class="form-control form-control-lg <?php if (session('errors.password')): ?>is-invalid<?php endif ?>"
                                name="password">
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="pass_confirm"><?= lang('Auth.newPasswordRepeat') ?></label>
                            <input type="password"
                                class="form-control form-control-lg <?php if (session('errors.pass_confirm')): ?>is-invalid<?php endif ?>"
                                name="pass_confirm">
                            <div class="invalid-feedback">
                                <?= session('errors.pass_confirm') ?>
                            </div>
                        </div>

                        <button type="submit"
                            class="btn btn-primary btn-block mb-3"><?= lang('Auth.resetPassword') ?></button>
                        <a href="<?= url_to('login') ?>" class="btn btn-secondary btn-block">Back to Login</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>