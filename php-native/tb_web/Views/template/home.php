<?php
$totalp = 0;
$totalb = 0;
$totalps = 0;
foreach ($data["tod_p"] as $datas) {
    $totalp += (int)$datas["total_belanja"];
}
foreach ($data["tod_ps"] as $ps) {
    $totalps += (int)$ps["qty"];
}
foreach ($data["tod_b"] as $b) {
    $totalb += $b["jml_stok"];
}
?>
<?php
if ($_SESSION['role'] == "admin") : ?>
    <div class="kotak-laporan">
        <div class="kotak-uang">
            <h4 id="uang">Total Pendapatan</h4>
            <p><i class="bi bi-currency-dollar"></i>Rp.<?= number_format($totalp) ?></p>
        </div>
        <div class="kotak-stok">
            <h4 id="stok">Total Barang Tersedia</h4>
            <p><i class="bi bi-basket2"></i><?= $totalb ?></p>
        </div>
        <div class="kotak-pesanan">
            <h4>Jumlah Pesanan Sukses</h4>
            <p>Total:<?= $totalps ?></p>
        </div>
    </div>
<?php endif ?>