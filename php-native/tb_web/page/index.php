<?php

require_once '../core/function.php';
require_once '../core/authlogin.php';
if (cek_login() == true) {
    $data = [
        "judul" => "Dasbord Admin",
        "tod_p" => get_data("SELECT * FROM penjualan GROUP BY(nomor_transaksi);"),
        "tod_ps" => get_data("SELECT * FROM penjualan"),
        "tod_b" => get_data("SELECT * FROM produk")
    ];
    View('template/header', $data);
    View('template/home', $data);
    View('template/footer');
} else {
    redirect('http://localhost/tb_web/page/login.php');
}
