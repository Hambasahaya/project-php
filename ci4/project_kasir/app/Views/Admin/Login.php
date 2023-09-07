<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<style>
    body {
        background: rgb(9, 155, 231);
        background: -moz-linear-gradient(338deg, rgba(9, 155, 231, 1) 12%, rgba(27, 27, 103, 1) 34%, rgba(8, 119, 242, 1) 57%);
        background: -webkit-linear-gradient(338deg, rgba(9, 155, 231, 1) 12%, rgba(27, 27, 103, 1) 34%, rgba(8, 119, 242, 1) 57%);
        background: linear-gradient(338deg, rgba(9, 155, 231, 1) 12%, rgba(27, 27, 103, 1) 34%, rgba(8, 119, 242, 1) 57%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#099be7", endColorstr="#0877f2", GradientType=1);
    }

    .form {
        background-color: white;
        z-index: 1px;
        margin-top: 50px;
        box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: 10px 10px 5px 0px r gb a(0, 0, 0, 0.75);
        -moz-box-shadow: 10px 10px 5px 0px r gb a(0, 0, 0, 0.75);
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .ikan {
        padding: 8px 8px;
        background-color: aliceblue;
    }
</style>

<body>
    <div class="container">
        <?php if (session()->getFlashdata("datano")) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= session()->getFlashdata("datano"); ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <!-- hapus alert -->
        <?php if (session()->getFlashdata("username")) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?= session()->getFlashdata("username"); ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <!-- hapus alert -->
        <?php if (session()->getFlashdata("password")) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= session()->getFlashdata("password"); ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="row form justify-content-center">
            <h4 class="text-center">Welcome!</h4>
            <div class="col-12 ikan">
                <form action="/login" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Usename</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
                        <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pass" name="password">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-outline-secondary mt-2" type="button" id="btnn"><img src="/img/show.png" alt="" srcset="" width="15px" height="15px" id="iconn"></button>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <br>
                <div class="mb-3">
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Forgot Your password?
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        const btn = document.getElementById('btnn');
        const pw = document.getElementById("pass");
        const icon = document.getElementById('iconn');
        btn.addEventListener('click', function() {
            if (pw.type === "password") {
                pw.type = "text";
                icon.src = "/img/hide.png";
            } else {
                pw.type = "password";
                icon.src = "/img/show.png"
            }
        });
    </script>
</body>

</html>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Forgot Your Password?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/Login/fr" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Masukan username Anda:</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user">
                        <div id="emailHelp" class="form-text">username yang anda gunakan untuk login</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Proses Akun</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>