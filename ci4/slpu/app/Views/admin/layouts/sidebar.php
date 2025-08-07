<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="assets2/pupr.ico" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">

    <?= $this->renderSection('styles') ?>

    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">

    <style>
        .masthead {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 70vh;
            padding-top: 50px;
        }
    </style>
</head>

<body>
    <?php
    $uri = service('uri')->getSegments();
    $uri1 = $uri[0] ?? 'index';
    $uri2 = $uri[1] ?? '';
    $uri3 = $uri[2] ?? '';
    ?>

    <header class="mb-3">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item <?= ($uri1 == 'dashboard') ? 'active' : '' ?>">
                            <a class='sidebar-link' href="<?= base_url('dashboard') ?>">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <hr>

                        <li class="sidebar-item <?= ($uri1 == 'user') ? 'active' : '' ?>">
                            <a class='sidebar-link' href="<?= base_url('user/index'); ?>">
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Shortlink</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= ($uri1 == 'datausers') ? 'active' : '' ?>">
                            <a class='sidebar-link' href="<?= base_url('datausers'); ?>">
                                <i class="bi bi-list-ul"></i>
                                <span>Data Users</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= ($uri1 == 'linkshistory') ? 'active' : '' ?>">
                            <a class='sidebar-link' href="<?= base_url('linkshistory'); ?>">
                                <i class="bi bi-link"></i>
                                <span>Links History</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= ($uri1 == 'createnew') ? 'active' : '' ?>">
                            <a class='sidebar-link' href="<?= base_url('createnew'); ?>">
                                <i class="bi bi-plus-circle-fill"></i>
                                <span>Create New</span>
                            </a>
                        </li>

                        <hr>

                        <li class="sidebar-item <?= ($uri1 == 'homepage') ? 'active' : '' ?>">
                            <a class='sidebar-link' href="<?= base_url('homepage'); ?>">
                                <i class="bi bi-house-door-fill"></i>
                                <span>Home</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= ($uri1 == 'myurl') ? 'active' : '' ?>">
                            <a class='sidebar-link' href="<?= base_url('myurl'); ?>">
                                <i class="bi bi-textarea"></i>
                                <span>My Url</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= ($uri1 == 'profile') ? 'active' : '' ?>">
                            <a class='sidebar-link' href="<?= base_url('profile'); ?>">
                                <i class="bi bi-person-square"></i>
                                <span>Profile</span>
                            </a>
                        </li>

                        <hr>

                        <li class="sidebar-item <?= ($uri1 == 'logout') ? 'active' : '' ?>">
                            <a class='sidebar-link' href="<?= base_url('logout'); ?>">
                                <i class="bi bi-arrow-left-square-fill"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>

                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>

            </div>
        </div>
    </header>

    <?= $this->renderSection('content') ?>

    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <?= $this->renderSection('javascript') ?>

    <script src="/assets/js/main.js"></script>

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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("createBtn").addEventListener("click", function () {
                var original_url = document.getElementById("original_url").value;
                var alias_url = document.getElementById("alias_url").value;
                var shortenedLinkInput = document.getElementById("shortened_url");

                if (original_url.trim() === "") {
                    alert("Long URL harus diisi!");
                    return;
                }

                if (!isValidUrl(original_url)) {
                    alert("URL invalid");
                    return;
                }

                if (shortenedLinkInput.value !== "") {
                    alert("Anda sudah membuat URL.");
                    return;
                }

                if (/\s/.test(alias_url)) {
                    alert("Customize URL tidak boleh mengandung spasi.");
                    return;
                }

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "/shortener/shorten", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        shortenedLinkInput.value = response.shortened_url;
                        document.getElementById('modalUrl').value = response.shortened_url;

                        new bootstrap.Modal(document.getElementById('urlModal')).show();
                    } else if (xhr.readyState == 4) {
                        alert("Gagal. Mohon dicoba lagi");
                    }
                };
                xhr.send("original_url=" + encodeURIComponent(original_url) + "&alias_url=" + encodeURIComponent(alias_url));
            });

            document.getElementById("copyBtn").addEventListener("click", function () {
                var shortenedLinkInput = document.getElementById("shortened_url");
                shortenedLinkInput.select();
                document.execCommand("copy");
                alert("Short URL: " + shortenedLinkInput.value);
            });

            document.getElementById('modalCopyBtn').addEventListener('click', function () {
                const modalUrl = document.getElementById('modalUrl');
                modalUrl.select();
                modalUrl.setSelectionRange(0, 99999); // For mobile devices
                document.execCommand('copy');
                alert('URL copied: ' + modalUrl.value);
            });
        });

        function isValidUrl(url) {
            var pattern = /^https?:\/\/.+/;
            return pattern.test(url);
        }

        function generateShortCode() {
            return Math.random().toString(36).substring(2, 8);
        }
    </script>

    <script>
        function showCopyModal(shortenedUrl) {
            document.getElementById('copyTextInput').value = shortenedUrl;
            var copyModal = new bootstrap.Modal(document.getElementById('copyTextModal'));
            copyModal.show();

            document.getElementById('copyButton').onclick = function () {
                var copyText = document.getElementById('copyTextInput');
                copyText.select();
                document.execCommand('copy');

                alert('URL copied to clipboard');
            };
        }
        function deleteLink(linkId) {
            if (confirm('Are you sure you want to delete this link?')) {
                fetch(`/shortener/delete/${linkId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                    }
                })
                    .then(response => {
                        if (response.ok) {
                            var card = document.getElementById(`card-${linkId}`);
                            card.remove();
                            alert('Link deleted successfully');
                        } else {
                            alert('Failed to delete the link');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while deleting the link');
                    });
            }
        }
        function showPasswordModal(password) {
            document.getElementById('passwordInput').value = password;
            var passwordModal = new bootstrap.Modal(document.getElementById('passwordModal'));
            passwordModal.show();

            document.getElementById('copyPasswordButton').onclick = function () {
                var passwordInput = document.getElementById('passwordInput');
                passwordInput.select();
                document.execCommand('copy');

                alert('Password copied to clipboard');
            };
        }
    </script>

</body>

</html>