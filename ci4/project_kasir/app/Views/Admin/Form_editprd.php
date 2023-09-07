<div class="container">
    <form action="/Admin/updateprd/<?= $dataprd["id_produk"] ?>" method="post" enctype="multipart/form-data">
        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama produk</label>
            <input type="text" class="form-control" required name="nama" value="<?= $dataprd["nama_prd"] ?>">
        </div>

        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" required value="<?= $dataprd["harga_prd"] ?>">
        </div>
        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah Stok</label>
            <input type="number" class="form-control" name="stok" required value="<?= $dataprd["stok"] ?>">
        </div>
        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label">supelier:</label>
            <input type="text" class="form-control" required name="supel" value="<?= $dataprd["supel"] ?>">
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