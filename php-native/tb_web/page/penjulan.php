 <?php
    require_once '../core/function.php';
    require_once '../core/authlogin.php';
    if (cek_login() == true) {
        $data = [

            "judul" => "data penjualan",
            "data_penjualan" => get_data("SELECT * FROM penjualan INNER JOIN users ON users.id_user=penjualan.id_user  GROUP BY(nomor_transaksi);")
        ];
        View('template/header', $data);
        View("template/penjualan", $data);
        View('template/footer');
    } else {
        redirect("http://localhost/tb_web/page/login.php");
    }
