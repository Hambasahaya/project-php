<link rel="stylesheet" href="../asset/css/css1.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<div class="login-page">
    <div class="form-login">
        <?php if (isset($_SESSION["flash"])) : ?>
            <div class="alert-flash" id="flash">
                <div class="pesan-alert">
                    <h4><?= $_SESSION["flash"]; ?></h4>
                    <?php unset($_SESSION["flash"]); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="header-login-page">
            <h4>LOGIN </h4>
        </div>
        <form action="../proses/login.php" method="post">
            <div class="input-l">
                <label for="">Username</label>
                <input type="text" name="username" id="">
            </div>
            <div class="input-l">
                <label for="">Password</label>
                <input type="password" name="pw" id="pw">
            </div>
            <div class="input-c">
                <label for="">tampikan password</label>
                <input id="pass" type="checkbox" onclick="show()">
            </div>
            <div class="btn-login">
                <button type="submit" name="login">Login</button>
            </div>
        </form>
    </div>
</div>

<script src="../asset/js/script.js"></script>