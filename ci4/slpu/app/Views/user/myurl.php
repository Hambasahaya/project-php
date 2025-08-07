<?= $this->extend('admin/layouts/sidebar'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>

    <h2 class="my-4"><b>My Url</b></h2>
    <p>Shortlink / Original URL</p>

    <form method="GET" action="<?= base_url('myurl') ?>">
        <div class="row mb-4 align-items-end">
            <div class="col-md-4">
                <label for="start_date" class="form-label">Start Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date"
                    value="<?= esc($start_date ?? '') ?>">
            </div>
            <div class="col-md-4">
                <label for="end_date" class="form-label">End Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date"
                    value="<?= esc($end_date ?? '') ?>">
            </div>
            <div class="col-md-3">
                <label for="encryption" class="form-label">Filter by:</label>
                <select class="form-control" id="encryption" name="encryption" onchange="this.form.submit()">
                    <option value="general" <?= (isset($_GET['encryption']) && $_GET['encryption'] == 'general') ? 'selected' : '' ?>>Semua</option>
                    <option value="encrypted" <?= (isset($_GET['encryption']) && $_GET['encryption'] == 'encrypted') ? 'selected' : '' ?>>Encryption</option>
                </select>
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <?php if (!empty($links)): ?>
        <?php foreach ($links as $link): ?>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card mb-3" id="card-<?= esc($link['id']) ?>">
                        <div class="row g-0">
                            <div class="col-md-2 d-flex align-items-center justify-content-center">

                                <img src="https://www.google.com/s2/favicons?domain=<?= esc(parse_url($link['original_url'], PHP_URL_HOST)) ?>&sz=64"
                                    class="img-fluid rounded-circle logo-image-large" alt="Logo">

                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="<?= esc($link['shortened_url']) ?>" target="_blank"
                                            id="shortened-url-<?= esc($link['id']) ?>"><?= esc($link['shortened_url']) ?></a>
                                    </h5>
                                    <p>Original URL: <a href="<?= esc($link['original_url']) ?>"
                                            target="_blank"><?= esc($link['original_url']) ?></a></p>
                                    <hr>
                                    <p>Created: <?= date('j F Y, H.i', strtotime($link['created_at'])) ?></p>
                                    <button class="btn btn-secondary"
                                        onclick="showCopyModal('<?= esc($link['shortened_url']) ?>')">Copy</button>
                                    <button class="btn btn-danger" onclick="deleteLink(<?= esc($link['id']) ?>)">Delete</button>

                                    <?php if (!empty($link['password'])): ?>
                                        <?php
                                        $config = new \Config\Encryption();
                                        $config->key = 'Pupr#book.2024';
                                        $config->driver = 'OpenSSL';
                                        $encrypter = \Config\Services::encrypter($config);
                                        try {
                                            $decrypted_password = $encrypter->decrypt(base64_decode($link['password']));
                                        } catch (\CodeIgniter\Encryption\Exceptions\EncryptionException $e) {
                                            $decrypted_password = 'Decryption failed';
                                        }
                                        ?>
                                        <button class="btn btn-outline-success"
                                            onclick="showPasswordModal('<?= esc($decrypted_password) ?>')">Show Password</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No links found.</p>
    <?php endif; ?>

    <div class="orb-infinite-scroll">
        <div class="results-end">
            <hr>
            <p class="orb-typography p stripped center text-center">You've reached the end of your links</p>
            <hr>
        </div>
    </div>

</div>

<div class="modal fade" id="copyTextModal" tabindex="-1" aria-labelledby="copyTextModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="copyTextModalLabel">Shortlink</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" id="copyTextInput" readonly>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="copyButton">Copy</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordModalLabel">Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" id="passwordInput" readonly>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="copyPasswordButton">Copy</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>