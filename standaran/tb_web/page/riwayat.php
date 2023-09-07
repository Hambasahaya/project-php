<?php
require_once '../core/function.php';
require_once '../core/authlogin.php';

if (cek_login() == true) {
    $usr = $_SESSION["id_user"];
    $data = [
        "judul" => "Riwayat Transaksi",
        "data_transaksi" => get_data("SELECT * FROM penjualan  INNER JOIN users ON users.id_user = penjualan.id_user
        WHERE penjualan.id_user = $usr
        GROUP BY(nomor_transaksi)")
    ];
    View("template/header", $data);
    View("template/riwayat", $data);
    View("template/footer");
}
