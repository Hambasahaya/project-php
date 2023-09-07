<?php
require_once '../core/function.php';
require_once '../core/authlogin.php';
// memanggil file fungsi
$id = (int)$_POST['id'];
$data = [
    "data_prd" => get_data("SELECT * FROM produk WHERE id_produk=" . $id),
    "judul" => "Update data Produk"
];
View("template/header", $data);
View("template/Form_update", $data);
View("template/footer");
