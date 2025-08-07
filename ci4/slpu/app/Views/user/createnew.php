<?= $this->extend('admin/layouts/sidebar'); ?>

<?= $this->section('content'); ?>

<header class="masthead">

    <div class="container position-relative">
        <div class="row justify-content-center">

            <form id="shortenForm" action="<?= base_url('/shortener/shorten'); ?>" method="post" class="links">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="url" class="form-label">Masukkan Original Url</label>
                    <input type="url" class="form-control form-control-xl" id="original_url" name="original_url"
                        placeholder="https://puprtes-my.sharepoint.com/....." required pattern="https?://.+"
                        autocomplete="off">
                </div>

                <br>

                <div class="form-group">
                    <label for="alias_url" class="form-label">Customize URL</label>
                    <small class="form-text text-dark">(https://pupr.ai/Pertemuan1)</small>
                    <div class="input-group">
                        <span class="input-group-text">pupr.ai/</span>
                        <input type="text" class="form-control form-control-xl" id="alias_url" name="alias_url"
                            placeholder="Opsional" oninput="checkInput()">
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <label for="encryption" class="form-label">Enkripsi URL</label>
                    <input type="checkbox" id="encryption" name="encryption" value="1">
                </div>
                <div class="form-group" id="passwordField" style="display:none;">
                    <input type="password"
                        class="form-control form-control-lg <?php if (session('errors.password')): ?>is-invalid<?php endif ?>"
                        id="password" name="password_hash" placeholder="Masukkan password untuk enkripsi URL">
                </div>

                <br>

                <label class="form-label">Shortlink</label>
                <div class="input-group mb-3 w-100">
                    <span class="input-group-text">pupr.ai/</span>
                    <div class="form-floating flex-grow-1">
                        <input type="text" class="form-control form-control-xl" id="shortened_url"
                            name="shortenedLinkInput" readonly>
                        <label for="shortened_url">Shortlink</label>
                    </div>
                    <button type="button" id="copyBtn" class="btn btn-secondary">
                        <i class="bi bi-clipboard" aria-hidden="true"></i>
                    </button>
                </div>

                <br>

                <div class="form-group">
                    <div class="col">
                        <button type="button" style="background-color: #00215E;" id="createBtn"
                            class="btn btn-primary btn-lg">Create</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</header>

<div class="modal fade" id="urlModal" tabindex="-1" aria-labelledby="urlModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="urlModalLabel">Shortlink</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="modalUrl" readonly>
                    <button type="button" id="modalCopyBtn" class="btn btn-secondary">
                        <i class="bi bi-clipboard" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="input-group mb-3" id="passwordGroup" style="display:none;">
                    <input type="text" class="form-control" id="modalPassword" readonly>
                    <button type="button" id="modalPasswordCopyBtn" class="btn btn-secondary">
                        <i class="bi bi-clipboard" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>