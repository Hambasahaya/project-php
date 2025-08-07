<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>

<div class="page-heading">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Users</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Users</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                Daftar Users
            </div>
            <div class="card-body">
                <table class="table table-striped" id="tableDataUsers">

                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Unit Organisasi</th>
                            <th>Unit Kerja</th>
                            <th>Edit</th>
                            <!-- <th>Created At</th> -->
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (isset($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= esc($user->id) ?></td>
                                    <td><?= esc($user->email) ?></td>
                                    <td><?= esc($user->username) ?></td>
                                    <td><?= esc($user->fullname) ?></td>
                                    <td><?= esc($user->unit_organisasi) ?></td>
                                    <td><?= esc($user->unit_kerja) ?></td>
                                    <td>
                                        <?= esc($user->edit) ?>
                                        <!-- <button class="btn btn-info btn-sm"
                                            onclick="showUserDetails(<?= $user->id ?>)">Detail</button> -->
                                        <button class="btn btn-primary"
                                            onclick="confirmRoleAddition(this, <?= $user->id ?>)">Add Role</button>
                                        <button class="btn btn-danger"
                                            onclick="confirmUserDeletion(this, <?= $user->id ?>)">Delete</button>
                                    </td>
                                    <!-- <td><?= esc($user->created_at) ?></td> -->
                                    <td>
                                        <?php
                                        if ($user->last_login) {
                                            $lastLoginDate = new DateTime($user->last_login);
                                            $currentDate = new DateTime();
                                            $interval = $lastLoginDate->diff($currentDate);

                                            if ($interval->days <= 31): ?>
                                                <button class="btn btn-success">Active</button>
                                            <?php else: ?>
                                                <button class="btn btn-warning">Inactive</button>
                                            <?php endif;
                                        } else {
                                            echo '<button class="btn btn-secondary">No Data</button>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        <?php else: ?>
                            <tr>
                                <td colspan="7">No users found.</td>
                            </tr>
                        <?php endif; ?>

                        <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addRoleModalLabel">Add Role</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Pilih role:
                                        <select class="form-select" id="roleSelection">
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" onclick="addRoleToUser()">Add
                                            Role</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="deleteUserModal" tabindex="-1"
                            aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Anda yakin ingin menghapus User ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="deleteUser()">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    function confirmRoleAddition(button, userId) {
        window.userIdToAddRole = userId; // Store user ID in global scope
        new bootstrap.Modal(document.getElementById('addRoleModal')).show();
    }

    function addRoleToUser() {
        const selectedRole = document.getElementById('roleSelection').value;
        fetch('/admin/add_role', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ userId: window.userIdToAddRole, role: selectedRole })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                } else {
                    alert('Failed to add role to user');
                }
            })
            .catch(error => console.error('Error:', error));
        $('#addRoleModal').modal('hide');
    }

    function confirmUserDeletion(button, userId) {
        window.userIdToDelete = userId;
        new bootstrap.Modal(document.getElementById('deleteUserModal')).show();
    }
    function deleteUser() {
        fetch('/admin/delete_user', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: window.userIdToDelete })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                } else {
                    alert('Gagal menghapus pengguna');
                }
            })
            .catch(error => console.error('Error:', error));
        $('#deleteUserModal').modal('hide');
    }
</script>

<script>
    let tableDataUsers = document.querySelector('#tableDataUsers');
    let dataTable = new simpleDatatables.DataTable(tableDataUsers);
</script>

<?= $this->endSection() ?>