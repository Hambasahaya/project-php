<?php

use Mpdf\Mpdf;

require_once '../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
require_once '../core/function.php';
if (isset($_POST['tambah_k'])) {
    $nama = $_POST["nama_karyawan"];
    $jk = $_POST["jk"];
    $alamat = $_POST["alamat"];
    $role = $_POST["Role"];
    $no = $_POST["no"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $foto = $_FILES['foto']['error'];
    if ($foto === 4) {
        $nama_foto = "karyawan.png";
    } else {
        $nama_foto = $_FILES['foto']['name'];
        move_uploaded_file($tmp_name, '../asset/img/fk/' . $nama_foto);
    }
    if (query("INSERT INTO users VALUES('','$nama','$jk','$alamat','$nama_foto','$no','$role','$username','$password')") > 0) {
        set_flashdata("karyawan baru selesai di tambahkan!");
        redirect("http://localhost/tb_web/page/karyawan.php");
    } else {
        set_flashdata("gagal menambahkan karyawan baru!");
        redirect("http://localhost/tb_web/page/karyawan.php");
    }
}
if (isset($_GET['hapus'])) {
    $id_user = (int)$_GET['hapus'];
    if (query("DELETE FROM users WHERE id_user=" . $id_user) == 1) {
        redirect("http://localhost/tb_web/page/karyawan.php");
    } else {
        echo "gagal hapus";
    }
}
if (isset($_GET['pdf']) == 1) {
    $data = [
        "karyawan" => get_data("SELECT * FROM users")
    ];
    ob_start();
    View('template/karyawan', $data);
    $print = ob_get_clean();
    $css = file_get_contents('../asset/css/css1.css');
    $html = ob_get_contents();
    ob_end_clean();
    $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($print);
    $mpdf->Output("data_karyawan.pdf", "I");
}

if (isset($_POST['update_k'])) {
    $id = (int)$_POST["id_karyawan"];
    $nama = $_POST["nama_karyawan"];
    $jk = $_POST["jk"];
    $alamat = $_POST["alamat"];
    $role = $_POST["Role"];
    $no = $_POST["no"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $foto = $_FILES['foto']['error'];
    if ($foto === 4) {
        $nama_foto = "karyawan.png";
    } else {
        $nama_foto = $_FILES['foto']['name'];
    }

    if (query("UPDATE users SET nama_user='$nama',jenis_kelamin='$jk',alamat='$alamat',foto='$nama_foto',no_tlp='$no',role='$role',username='$username',password='$password' WHERE users.id_user=$id") > 0) {
        echo "selesai";
    }
} elseif (isset($_POST["updatepw"])) {
    $pwbaru = $_POST["newpw"];
    if (query("UPDATE users SET password='$pwbaru' WHERE id_user=" . intval($_SESSION['id_user'])) > 0) {
        set_flashdata("Ubah password berhasil!");
        redirect("http://localhost/tb_web/page/users.php");
    }
}
