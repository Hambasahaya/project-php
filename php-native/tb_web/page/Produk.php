<?php
require_once '../core/function.php';
require_once '../core/authlogin.php';
if (cek_login() == true) {

    $data = [
        "judul" => "produk",
        "data_produk" => get_data("SELECT * FROM produk")
    ];
    View('template/header', $data);
    View("template/produk", $data);
    View('template/footer');
} else {
    redirect("http://localhost/tb_web/page/login.php");
}
