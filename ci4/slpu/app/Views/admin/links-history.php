<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>

<div class="page-heading">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Links History</h3>
                <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Links History</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Links History
            </div>
            <div class="card-body">
                <table class="table table-striped" id="tableLinksHistory">

                    <thead>
                        <tr>
                            <th>user_id</th>
                            <th>Original Url</th>
                            <th>Alias Url</th>
                            <th>Shortened Url</th>
                            <th>Enkripsi</th>
                            <th>Created At</th>
                            <!-- <th>updated_at</th>
                            <th>deleted_at</th> -->

                            <!-- <th>user_image</th>
                            <th>password_hash</th>
                            <th>reset_hash</th>
                            <th>reset_at</th>
                            <th>reset_expires</th>
                            <th>active_hash</th>
                            <th>status_message</th>
                            <th>active</th>
                            <th>force_pass_reset</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>deleted_at</th> -->
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (isset($links)): ?>
                            <?php foreach ($links as $link): ?>
                                <tr>
                                    <td><?= esc($link['user_id']) ?></td>
                                    <td><?= esc($link['original_url']) ?></td>
                                    <td><?= esc($link['alias_url']) ?></td>
                                    <td><?= esc($link['shortened_url']) ?></td>
                                    <td><?= esc($link['is_encrypted']) ?></td>
                                    <td><?= esc($link['created_at']) ?></td>
                                    <td><?= esc($link['updated_at']) ?></td>
                                    <td><?= esc($link['deleted_at']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">No users found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
            </div>
        </div>

    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>

<script>
    let tableLinksHistory = document.querySelector('#tableLinksHistory');
    let dataTable = new simpleDatatables.DataTable(tableLinksHistory);
</script>

<?= $this->endSection() ?>