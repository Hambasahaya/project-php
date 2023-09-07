<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul ?></title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 2px solid black;
            padding: 8px;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: blue;
            color: white;
        }

        .header h3 {
            text-align: center;
            font-size: 28px;
        }

        .header h4 {
            text-align: center;
            margin-top: -30px;
            font-size: 20px;
        }

        .header p {
            text-align: left;
            font-weight: bold;
        }

        .header {
            background-color: cornflowerblue;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            margin-bottom: -15px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h3>Toko Faedah Usaha</h3>
        <br>
        <h4>Daftar Produk</h4>
        <p>Per Tanggal/Bulan/Tahun: <?= date('d-m-Y') ?></p>
    </div>

    <table id="customers">

        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Kategori Produk</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Sisa Stok</th>
        </tr>
        <?php
        $no = 1;
        foreach ($dataprd as $dataprd) : ?>
            <tr>
                <th><?= $no++ ?></th>
                <td><?= $dataprd["nama_prd"] ?></td>
                <td><?= $dataprd["kategori_prd"] ?></td>
                <td>Rp.<?= number_format($dataprd["harga_prd"]) ?></td>
                <td>Rp.<?= number_format($dataprd["harga_beli"]) ?></td>
                <td><?= $dataprd["stok"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>