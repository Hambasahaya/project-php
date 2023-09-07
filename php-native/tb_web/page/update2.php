<?php

require_once '../core/function.php';
require_once '../core/authlogin.php';
// memanggil file fungsi
$id = (int)$_POST['update'];
$data_prd = [];
$data = [
    "produk_update" => get_data("SELECT * FROM keranjang INNER JOIN produk ON produk.id_produk=keranjang.id_produk WHERE id_pesanan=" . $id),
    "judul" => "Update data Produk"
];
View("template/header", $data);
View("template/update_pesanan", $data);
View("template/footer");
