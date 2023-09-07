<?php
require_once '../vendor/autoload.php';
require_once '../core/function.php';
$mpdf = new \Mpdf\Mpdf();
$nama_file = "daftar penjualan.pdf";
$data = [

    "judul" => "data penjualan",
    "data_penjualan" => get_data("SELECT * FROM penjualan INNER JOIN users ON users.id_user=penjualan.id_user  GROUP BY(nomor_transaksi);")
];
ob_start();
View('template/penjualan', $data);
$print = ob_get_clean();
$css = file_get_contents('../asset/css/css1.css');
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($print);
$mpdf->Output($nama_file, \Mpdf\Output\Destination::DOWNLOAD);
