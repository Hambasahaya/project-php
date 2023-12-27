<?= $this->extend('template/template1'); ?>


<?= $this->section('content') ?>;
<div class="booking-page">
  <div class="booking-data">
    <h4 class="text-center mb-3">Data Pesanan</h4>
    <form class="booking-infomation-data" action="/psck" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama penerima</label>
        <input type="text" class="form-control" name="nama_penerima">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Metode pengriman</label>
        <select class="form-select form-select-sm" aria-label="Small select example" name="mtd_pengriman">
          <option>Open this select menu</option>
          <option value="tiki">TIKI</option>
          <option value="jne">JNE</option>
          <option value="pos">POS INDONESIA</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">provinsi</label>
        <select class="form-select form-select-sm" aria-label="Small select example" name="province" id="provinceSelect">
          <option selected>Open this select menu</option>
          <?php foreach ($prov as $prov_data) : ?>
            <option value="<?= $prov_data['id_province'] ?>"><?= $prov_data['province'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kota</label>
        <select class="form-select form-select-sm" aria-label="Small select example" name="kota" id="citySelect">
          <option selected>Open this select menu</option>
        </select>
      </div>
      <div class="mb-3">
        <div class="form-floating">
          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="alamat"></textarea>
          <label for="floatingTextarea2">Alamat Pengriman</label>
        </div>
      </div>
      <div class="mb-3">
        <h5 class="text-center">TOTAL:RP.<?= number_format($total) ?></h5>
      </div>
      <input type="hidden" value="<?= $total ?>" name="total">
      <button type="submit" class="btn btn-primary">chekout!</button>
    </form>
  </div>
  <div class="booking-infomation">
    <?php foreach ($data_prd as $prd_data) : ?>
      <div class="card mb-3" style="width: 90%;padding:20px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="<?= $data_prd[0]['photo_prd'] ?>" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $prd_data['name_product'] ?></h5>
              <p class="card-text"><?= $prd_data['description'] ?></p>
              <p class="card-text">Stock: <?= $prd_data['stok'] ?></p>
              <p class="card-text">Price: Rp.<?= number_format($prd_data['price']) ?></p>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var citySelect = document.getElementById('citySelect');
    document.getElementById('provinceSelect').addEventListener('change', function() {
      var selectedProvinceId = document.getElementById('provinceSelect').value;
      var xhr = new XMLHttpRequest();
      xhr.open('POST', '/getcity', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          updateCityDropdown(xhr.responseText);
        }
      };
      xhr.send('provinceId=' + selectedProvinceId);
    });

    // Fungsi untuk memperbarui dropdown kota
    function updateCityDropdown(data) {
      // Parse data JSON yang diterima dari controller
      var cities = JSON.parse(data);

      // Bersihkan opsi-opsi yang ada di dropdown kota
      citySelect.innerHTML = '<option selected>Open this select menu</option>';

      // Tambahkan opsi-opsi baru ke dropdown kota berdasarkan data yang diterima
      cities.forEach(function(city) {
        var option = document.createElement('option');
        option.value = city.name;
        option.text = city.name;
        citySelect.appendChild(option);
      });
    }
  });
</script>
<?= $this->endSection(); ?>