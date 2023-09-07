<?php
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="Daftar_produk"');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=Base_url?>css/Style.css">
</head>
<body>
<div class="tabel-kasir">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Foto</th>
                    <th>Harga Produk</th>
                    <th>Jumlah Stok</th>
                </tr>
                <!--  -->
            </table>
        </div>
</body>
</html>