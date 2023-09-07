<div class="container">
    <figure class="figure">
        <img src="/img/userIMG/<?= $dataker["foto"]; ?>" class="figure-img img-fluid rounded" alt="..." id="pr">
        <figcaption class="figure-caption"></figcaption>
    </figure>
    <form action="/Admin/update/<?= $dataker["id_karyawan"] ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?= $dataker["foto"] ?>">
        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Karyawan</label>
            <input type="text" class="form-control" required name="nama" value="<?= $dataker["nama_karyawan"] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Alamat Karyawan</label>
            <input type="text" class="form-control" name="alamat" required value="<?= $dataker["alamat"] ?>">
        </div>
        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label">Nomor Hp</label>
            <input type="number" class="form-control" name="no" required value="<?= $dataker["no_tlp"] ?>">
        </div>
        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" value="<?= $dataker["username"] ?>">
            <div id=" emailHelp" class="form-text">Digunakan Pada saat Karyawan login
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="password" class="form-control" name="pass" id="pass" value="<?= $dataker["password"] ?>">
            <button class=" btn btn-outline-secondary mt-2" type="button" id="showing"><img src="/img/show.png" alt="" srcset="" width="15px" height="15px" id="iconn"></button>
        </div>
        <div class="mb-3">
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="jabatan" required>
                <option selected value="<?= $dataker["jabtaan"] ?>"><?= $dataker["nama_jabatan"]; ?></option>
                <?php if ($dataker["jabtaan"] == 2) : ?>
                    <option value="3">Pengantar/Kurir</option>
                <?php endif; ?>
                <?php if ($dataker["jabtaan"] == 3) : ?>
                    <option value="2">Admin/Kasir</option>
                <?php endif; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Foto Karyawan</label>
            <input class="form-control" type="file" id="file" accept="image/*" onchange="upload(event)" name="foto">
        </div>
        <button type="submit" class="btn btn-primary">Proses Data!</button>
    </form>
</div>

<script>
    const pr = document.getElementById("pr");
    const upload = function(event) {
        pr.src = URL.createObjectURL(event.target.files[0]);
    };
    const btn = document.getElementById('showing');
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