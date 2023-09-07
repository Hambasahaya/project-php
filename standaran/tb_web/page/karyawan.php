<?php
require_once '../core/function.php';
require_once '../core/authlogin.php';
if (cek_login() == true) {

    $data = [
        "judul" => 'karyawan',
        "karyawan" => get_data("SELECT * FROM users")
    ];
    View("template/header", $data);
    View("template/karyawan", $data);
    View("template/footer");
} else {
    redirect("http://localhost/tb_web/page/login.php");
}
