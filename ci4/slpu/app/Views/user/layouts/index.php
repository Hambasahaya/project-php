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
        .nav {
            margin-top: 30px;
        }

        .nav-item {
            margin-right: 70px;
        }

        .nav-item:last-child {
            margin-right: 0;
        }

        .footer-center {
            text-align: center;
            width: 100%;
            display: block;
            margin: auto;
        }

        .container {
            margin-top: 80px;
            margin-left: 0;
            padding-left: 0;
        }

        ::placeholder {
            font-size: 0.7em;
        }

        .nav-link {
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
            border-radius: 15px;
        }

        .nav-link:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 255, 0.4);
            background-color: #00215E;
            color: white;
        }

        .accordion-button {
            background-color: transparent;
            color: #FFA62F;
            border: none;
            box-shadow: none;
        }

        .accordion-button:not(.collapsed) {
            background-color: transparent;
            color: #0056b3;
        }

        .accordion-button:focus {
            box-shadow: none;
            outline: none;
        }
    </style>
</head>

<body>
    <div id="app">

        <?= $this->include('user/layouts/navbar') ?>

        <div id="main">
            <!-- <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header> -->

            <?= $this->renderSection('content') ?>

        </div>

        <?= $this->include('user/layouts/footer') ?>

    </div>

    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <?= $this->renderSection('javascript') ?>

    <script src="/assets/js/main.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("encryption").addEventListener("change", function () {
                var passwordField = document.getElementById("passwordField");
                passwordField.style.display = this.checked ? "block" : "none";
            });

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

                var encryption = document.getElementById("encryption").checked;
                var password = document.getElementById("password").value;

                if (encryption && password.trim() === "") {
                    alert("Password harus diisi jika memilih enkripsi.");
                    return;
                }

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "/shortener/shorten", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            var response = JSON.parse(xhr.responseText);
                            if (response.error) {
                                if (response.unsafe) {
                                    const virusTotalModal = new bootstrap.Modal(document.getElementById('virusTotalModal'));
                                    virusTotalModal.show();
                                }
                            } else {
                                shortenedLinkInput.value = response.shortened_url;
                                document.getElementById('modalUrl').value = response.shortened_url;
                                if (encryption) {
                                    document.getElementById('passwordGroup').style.display = 'block';
                                    document.getElementById('modalPassword').value = response.password || password;
                                }
                                new bootstrap.Modal(document.getElementById('urlModal')).show();
                            }
                        } else {
                            alert("Gagal. Mohon dicoba lagi");
                        }
                    }
                };

                var params = "original_url=" + encodeURIComponent(original_url) +
                    "&alias_url=" + encodeURIComponent(alias_url) +
                    "&encryption=" + (encryption ? 1 : 0) +
                    "&password=" + encodeURIComponent(password);
                xhr.send(params);
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
                modalUrl.setSelectionRange(0, 99999);
                document.execCommand('copy');
                alert('URL copied: ' + modalUrl.value);
            });

            document.getElementById('modalPasswordCopyBtn').addEventListener('click', function () {
                const modalPassword = document.getElementById('modalPassword');
                modalPassword.select();
                modalPassword.setSelectionRange(0, 99999);
                document.execCommand('copy');
                alert('Password copied: ' + modalPassword.value);
            });
        });

        function isValidUrl(url) {
            var pattern = /^https?:\/\/.+/;
            return pattern.test(url);
        }
    </script>

    <!-- <script>
        document.getElementById('createBtn').addEventListener('click', function () {
            const form = document.getElementById('shortenForm');
            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.unsafe) {
                        const virusTotalModal = new bootstrap.Modal(document.getElementById('virusTotalModal'));
                        virusTotalModal.show();
                    } else if (data.shortened_url) {
                        document.getElementById('shortened_url').value = data.shortened_url;
                        const urlModal = new bootstrap.Modal(document.getElementById('urlModal'));
                        urlModal.show();
                    } else if (data.error) {
                        // alert(data.error); // Commented out alert
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script> -->

</body>

</html>