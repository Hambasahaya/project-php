<?php
require_once '../vendor/autoload.php';
require_once '../core/function.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mpdf = new \Mpdf\Mpdf();
$mail = new PHPMailer();
// konfigurasi email
$mail->SMTPDebug = SMTP::DEBUG_OFF;
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'tokosupersemar1998@gmail.com';
$mail->Password   = 'sdbqamgeihrwaysf';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;
date_default_timezone_set("Asia/Bangkok");
//menjalankan untuk simpan data pesanan sementara
if (isset($_POST["simpan_pesanan"])) {
    $id_petugas = $_POST['id_petugas'];
    $subtod = 0;
    $id_prd = $_POST['produk'];
    $jml = $_POST['jml'];
    $data_prd = get_data("SELECT harga_produk,jml_stok,nama_produk FROM produk WHERE id_produk=" . $id_prd);
    foreach ($data_prd as $data_p) {
        $subtod = $jml * $data_p['harga_produk'];
        $stok = $data_p["jml_stok"];
        $nama_produk = $data_p["nama_produk"];
    }
    if ($jml > $stok) {
        set_flashdata("Jumlah stok produk  "  . $nama_produk . "  yang tersdia hanya:" . $stok);
        redirect("http://localhost/tb_web/page/kasir.php");
        exit;
    } else {
        $query = "INSERT INTO keranjang VALUES('','$id_petugas','$id_prd','$jml','$subtod')";
        if (query($query) > 0) {
            redirect('http://localhost/tb_web/page/kasir.php');
        } else {
            echo "gagal";
        }
    }
}
if (isset($_GET['hapus_psn'])) {
    $id_pesanan = $_GET['hapus_psn'];
    if (query("DELETE FROM keranjang WHERE id_pesanan=" . $id_pesanan) > 0) {
        redirect('http://localhost/tb_web/page/kasir.php');
    }
}
if (isset($_POST['update'])) {
    $id_pesanan = $_POST['id_pesanan'];
    $subtod = 0;
    $jml = (int)$_POST['jml'];
    $harga = (int)$_POST['harga'];
    $subtod += $jml * $harga;
    $data_stok = get_data("SELECT produk.jml_stok,produk.nama_produk FROM keranjang INNER JOIN produk ON produk.id_produk = keranjang.id_produk WHERE id_pesanan =" . $id_pesanan);
    foreach ($data_stok as $data_p) {
        $stok = intval($data_p["jml_stok"]);
        $nama_produk = $data_p["nama_produk"];
    }

    if ($jml > $stok) {
        set_flashdata("Jumlah stok produk  "  . $nama_produk . "  yang tersdia hanya:" . $stok);
        redirect("http://localhost/tb_web/page/kasir.php");
        exit();
    } else {
        $query = "UPDATE keranjang SET keranjang.jumlah_beli = '$jml',keranjang.subtotal ='$subtod' WHERE keranjang.id_pesanan=" . $id_pesanan;
        if (query($query) > 0) {
            set_flashdata("pesanan berhasil di update!");
            redirect('http://localhost/tb_web/page/kasir.php');
        } else {
            set_flashdata("gagal update pesanan!");
            redirect('http://localhost/tb_web/page/kasir.php');
        }
    }
}
if (isset($_POST['chekout'])) {
    if ((int)$_POST["total"] > 0) {
        $id_ptgs = $_POST["id_ptgs"];
        $total = intval($_POST['total']);
        $data = [
            "judul" => "cetak struk",
            "total_b" => $total,
            "data_pesanan" => get_data("SELECT * FROM keranjang INNER JOIN produk ON produk.id_produk=keranjang.id_produk WHERE id_petugas=" . $id_ptgs)
        ];
        View('template/header', $data);
        View('template/struk', $data);
        View('template/footer');
    } else {
        redirect("http://localhost/tb_web/page/kasir.php");
    }
}

// transaksi finis_1
if (isset($_POST['cetak_s'])) {
    if (isset($_POST['cetak_s'])) {
        $id_petugas = (int)$_POST["petugas"];
        $id_trs = (int)$_POST["nomor_t"];
        $total = (int)$_POST["total"];
        $tanggal_tr = date('Y-m-d-H:i:s');
        $nama_file = "struk Transaksi" . $id_trs . ".pdf";
        global $conn;
        mysqli_autocommit($conn, FALSE);
        $chek = true;
        $data = get_data("SELECT * FROM keranjang WHERE id_petugas=" . $id_petugas);
        foreach ($data as $trs) {
            if (
                query("INSERT INTO penjualan VALUES('', '$id_trs', '{$trs["id_petugas"]}', '{$trs["id_produk"]}', '{$trs["qty"]}','{$trs["subtot"]}', '$total', '$tanggal_tr')") > 0 &&
                query("UPDATE produk SET jml_stok = jml_stok - {$trs["qty"]} WHERE id_produk = " . $trs["id_produk"]) > 0
            ) {
                query("DELETE FROM keranjang WHERE id_petugas=" . $trs['id_petugas']);
                query("COMMIT");
            } else {
                query("ROLLBACK");
                $chek = false;
                break;
            }
        }
        if ($chek) {
            ob_start();
            $data = [
                "total_b" => $total,

                "data_pesanan" => get_data("SELECT produk.nama_produk,produk.harga_produk,penjualan.qty,penjualan.subtot FROM penjualan INNER JOIN produk ON produk.id_produk=penjualan.id_produk WHERE penjualan.nomor_transaksi=" . $id_trs)
            ];
            View('template/struk', $data);
            $print = ob_get_clean();
            $css = file_get_contents('../asset/css/css1.css');

            $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
            $mpdf->WriteHTML($print);
            $mpdf->Output('../asset/struk/' . $nama_file, \Mpdf\Output\Destination::FILE);
            if (file_exists('../asset/struk/' . $nama_file)) {
                set_flashdata("transaksi berhasil!");
                redirect("http://localhost/tb_web/page/kasir.php");
            } else {
                set_flashdata("struk gagal di buat,transaksi berhasil!");
                redirect("http://localhost/tb_web/page/kasir.php");
            }
        } else {
            set_flashdata("transaksi gagal!");
            redirect("http://localhost/tb_web/page/kasir.php");
        }
    }
}


if (isset($_POST["kirim"])) {
    $id_petugas = (int)$_POST["petugas"];
    $id_trs = (int)$_POST["nomor_t"];
    $total = (int)$_POST["total"];
    $tanggal_tr = date('Y-m-d-H:i:s');
    $email_to = $_POST["email"];
    $nama_file = "struk Transaksi" . $id_trs . ".pdf";
    $data = [
        "total_b" => $total,
        "data_pesanan" => get_data("SELECT * FROM keranjang INNER JOIN produk ON produk.id_produk=keranjang.id_produk WHERE id_petugas=" . $id_petugas)
    ];
    ob_start();
    View('template/struk', $data);
    $print = ob_get_clean();
    $css = file_get_contents('../asset/css/css1.css');
    $html = ob_get_contents();
    ob_end_clean();
    $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($print);
    $mpdf->Output('../asset/struk/' . $nama_file, \Mpdf\Output\Destination::FILE);
    // end cetak pdf
    if (file_exists('../asset/struk/' . $nama_file)) {
        global $conn;
        mysqli_autocommit($conn, FALSE);
        $data = get_data("SELECT * FROM keranjang  WHERE id_petugas=" . $id_petugas);
        $chek = true;
        foreach ($data as $trs) {
            if (
                query("INSERT INTO penjualan VALUES('','$id_trs', '{$trs["id_petugas"]}','{$trs["id_produk"]}','{$trs["jumlah_beli"]}','$total','$tanggal_tr')") > 0 &&
                query("UPDATE produk SET jml_stok = jml_stok - {$trs["jumlah_beli"]} WHERE id_produk = " . $trs["id_produk"]) > 0  &&
                query("DELETE FROM keranjang WHERE id_pesanan=" . $trs["id_pesanan"]) > 0
            ) {
                query("COMMIT");
            } else {
                $chek = false;
                query("ROLLBACK");
                break;
            }
        }

        if ($chek == true) {
            // kirim data struk ke email
            $mail->setFrom('zaldyramlan24@gmail.com', 'toko super semar');
            $mail->addAddress($email_to);
            $mail->Subject = 'struk Transaksi';
            $mail->Body    = 'file bukti transaksi';
            $mail->addAttachment('../asset/struk/' . $nama_file, $nama_file);
            if (!$mail->send()) {
                set_flashdata("email gagal terkirim");
                redirect("http://localhost/tb_web/page/kasir.php");
            } else {
                set_flashdata("sukses mengrim email struk!,transaksi sukses!");
                redirect("http://localhost/tb_web/page/kasir.php");
            }
            // end send email
        } else {
            set_flashdata("transaksi gagal!");
            redirect("http://localhost/tb_web/page/kasir.php");
        }
    } else {
        set_flashdata("transaksi gagal!");
        redirect("http://localhost/tb_web/page/kasir.php");
    }
}
