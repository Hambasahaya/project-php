<?php
require_once '../core/function.php';
require_once '../core/authlogin.php';
// memanggil file fungsi
$id = (int)$_POST['id'];
$data = [
    "data_pegawai" => get_data("SELECT * FROM users WHERE id_user=" . $id),
    "judul" => "Update data Produk"
];
View("template/header", $data);
View("template/Form_update1", $data);
View("template/footer");
