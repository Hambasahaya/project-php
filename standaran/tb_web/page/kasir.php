<?php
require_once '../core/function.php';
require_once '../core/authlogin.php';
if (cek_login() == true) {
    $user = (int)$_SESSION["id_user"];
    $data = [
        "judul" => "Kasir App",
        "data_produk" => get_data("SELECT * FROM produk WHERE jml_stok > 0"),
        "data_pesanan" => get_data("SELECT produk.nama_produk,produk.harga_produk,keranjang.qty,keranjang.subtot,keranjang.id_pesanan FROM keranjang INNER JOIN produk ON produk.id_produk=keranjang.id_produk WHERE id_petugas=" . $user)
    ];

    View('template/header', $data);
    View('template/Kasir', $data);
    View('template/footer');
} else {
    redirect("http://localhost/tb_web/page/login.php");
}
