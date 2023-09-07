<link rel="stylesheet" href="../asset/css/css1.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<div class="user11">
    <div class="user-profile-page">
        <img src="../asset/img/fk/<?= $data["foto"] ?>" alt="" srcset="">
        <h4><?= $data["nama_user"]; ?> | <?= $data["role"] ?></h4>
    </div>
    <div class="menu-user-page">
        <ul>
            <li> <span><i class="bi bi-key-fill"></i></span><button id="btn-modal">Ubah Password</button></li>
            <li> <span><i class="bi bi-box-arrow-in-left"></i></span><a href="../proses/login.php?out=0">Log Out</a></li>
        </ul>
    </div>
</div>

<div id="modal" class="modal">
    <div class="modal-box">
        <div class="judul-modal">
            <h2>Ubah Password</h2>
        </div>
        <div class="modal-conten">
            <form action="../proses/karyawan.php" method="POST" class="form-m" enctype="multipart/form-data">
                <input type="hidden" value="" name="id_produk">
                <div class="label">
                    <label for="">Ubah Password</label>
                </div>
                <div class="input">
                    <input type="password" name="newpw" id="pw">
                </div>
                <div class="input">
                    <input type="checkbox" onclick="show()"> Show Password
                </div>
                <button name="updatepw">Ubah Passoword</button>
            </form>
        </div>
        <button id="batal">Batal</button>
    </div>
</div>
<script>
    const pw = document.getElementById('pw');

    function show() {
        if (pw.type === "password") {
            pw.type = "text";
        } else {
            pw.type = "password";
        }

    }
</script>
<script src="../asset/js/script.js"></script>