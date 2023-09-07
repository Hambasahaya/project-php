<?php

require_once '../core/function.php';
if (isset($_POST['login'])) {
    $username = $_POST["username"];
    $pw = $_POST["pw"];
    $cek = "SELECT * FROM users WHERE username='$username' AND password='$pw'";
    if (query($cek) > 0) {
        $data_us = get_data("SELECT * FROM users WHERE users.username='$username'");
        foreach ($data_us as $key) {
            $_SESSION['login'] = true;
            $_SESSION['id_user'] = $key['id_user'];
            $_SESSION['nama_user'] = $key['nama_user'];
            if ($key["role"] == "admin") {
                $_SESSION["role"] = "admin";
            } else {
                $_SESSION["role"] = "kasir";
            }
            redirect('http://localhost/tb_web/page/index.php');
        }
    } else {
        set_flashdata("username atau password anda salah!");
        redirect('http://localhost/tb_web/page/login.php');
    }
}
if (isset($_GET['out']) == 1) {
    session_destroy();
    redirect('http://localhost/tb_web/page/login.php');
}
