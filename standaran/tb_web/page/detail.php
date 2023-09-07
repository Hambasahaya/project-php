<?php
require_once '../core/function.php';
require_once '../core/authlogin.php';
if (cek_login() == true) {

    $nomor_transaksi = (int)$_POST['detail'];
    $data = [
        "judul" => "detail pembelian",
        "data_pembelian" => get_data("SELECT * FROM penjualan INNER JOIN produk ON produk.id_produk=penjualan.id_produk WHERE penjualan.nomor_transaksi=" . $nomor_transaksi)
    ];
    View("template/header", $data);
    View("template/detail", $data);
    View("template/footer");
} else {
    redirect("http://localhost/tb_web/page/login.php");
}
