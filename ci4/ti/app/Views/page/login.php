<?= $this->extend("Template/template"); ?>
<?= $this->Section('content') ?>
<div class="login">
    <form action="/login" method="post" class="login_form">
        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" class="form-control" name="nim">
            <div id="emailHelp" class="form-text">Masukin NIM-nya dong pe!</div>
        </div>
        <button type="submit" class="btn btn-outline-info">Login-in</button>
    </form>
</div>
<?= $this->endSection() ?>