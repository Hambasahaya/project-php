<?= $this->extend('auth/layouts/index'); ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card mx-auto">
                <div class="card-header">
                    Forgot Password
                </div>
                <div class="card-body">
                    <br>
                    <p class="text-center"><?= lang('Auth.enterEmailForInstructions') ?></p>

                    <br>
                    <form action="<?= url_to('forgot') ?>" method="post" class="user">
                        <?= csrf_field() ?>

                        <div class="form-group mb-4">
                            <label for="email"><?= lang('Auth.emailAddress') ?></label>
                            <input type="email"
                                class="form-control <?php if (session('errors.email')): ?>is-invalid<?php endif ?>"
                                name="email" aria-describedby="emailHelp">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <button type="submit"
                            class="btn btn-primary btn-block mb-3"><?= lang('Auth.sendInstructions') ?></button>
                        <a href="<?= url_to('login') ?>" class="btn btn-secondary btn-block">Back to Login</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>