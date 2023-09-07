<?php
require_once '../core/function.php';
require_once '../core/authlogin.php';
if (cek_login() == true) {
    $data = [];
    $data_user = get_data("SELECT * FROM users WHERE id_user=" . (int)$_SESSION['id_user']);
    foreach ($data_user as $get_data) {
        $data["nama_user"] = $get_data['nama_user'];
        $data['id_user'] = (int)$get_data['id_user'];
        $data["foto"] = $get_data["foto"];
        $data["role"] = $get_data["role"];
    }
    View('template/user', $data);
} else {
    redirect("http://localhost/tb_web/page/login.php");
}
