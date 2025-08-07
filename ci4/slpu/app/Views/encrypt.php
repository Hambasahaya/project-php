<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Enter Password</title>
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
</head>

<body>
    <header>
        <div class="main-container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card text-center">

                        <div class="card-header">
                            <h5 class="card-title"><i
                                    class="bi bi-lock-fill"></i><?= 'http://pupr.ai/s/' . $shortened_url; ?></h5>
                        </div>

                        <div class="card-body">
                            <p class="text-muted">Please enter the password</p>

                            <?php if (session()->getFlashdata('error')): ?>
                                <p style="color:red;"><?php echo session()->getFlashdata('error'); ?></p>
                            <?php endif; ?>

                            <form action="<?= base_url('shortener/decrypt') ?>" method="post">
                                <input type="hidden" name="shortened_url" value="<?= esc($shortened_url); ?>">

                                <div class="form-group">
                                    <label for="password_hash">Password:</label>
                                    <input type="password" class="form-control border-primary" name="password" required>
                                </div>

                                <button class="btn btn-primary mt-3" type="submit">Submit</button>
                            </form>

                        </div>

                        <div class="card-footer text-muted">
                            <p>Pusat Data dan Teknologi Informasi</p>
                            <p>2024 &copy; Kementerian Pekerjaan Umum dan Perumahan Rakyat</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
</body>

</html>