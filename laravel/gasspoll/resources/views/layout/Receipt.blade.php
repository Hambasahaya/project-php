<!DOCTYPE html>
<html>

<head>
    <style>
        h4 {
            text-align: right;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <h4>PT.GASSPOLL</h4>
    @foreach($transactions as $no_transaksi => $transaksiGroup)
    <h5>Nomor Transaksi: {{ $no_transaksi }}</h5>
    <table id="customers">
        <tr>
            <th>Nama Produk</th>
            <th>Harga Beli</th>
            <th>Jumlah Beli</th>
            <th>Subtotal</th>
        </tr>
        @foreach($transaksiGroup as $transaksi)
        <tr>
            <td>{{ $transaksi->produk->nama_produk }}</td>
            <td>{{ number_format($transaksi->harga) }}</td>
            <td>{{ $transaksi->qty }}</td>
            <td>Rp. {{ number_format($transaksi->subtotal) }}</td>
        </tr>
        @endforeach
    </table>
    <p>Tanggal Transaksi: {{ $transaksiGroup->first()->detail_transaksi->tgl_transaksi }}</p>
    <p>Alamat Pengiriman Barang: {{ $transaksiGroup->first()->detail_transaksi->alamat_pengiriman }}</p>
    <p>Layanan Pengiriman: {{ $transaksiGroup->first()->detail_transaksi->layanan_pengiriman }}</p>
    <p>Ongkir: Rp. {{ number_format($transaksiGroup->first()->detail_transaksi->biaya_pengiriman) }}</p>
    <p>Total Belanja: Rp. {{ number_format($transaksiGroup->first()->detail_transaksi->total) }}</p>
    <p>Status Pembayaran: {{ $transaksiGroup->first()->detail_transaksi->status_pembayaran }}</p>
    <p>Status Pengiriman: {{ $transaksiGroup->first()->detail_transaksi->status_pengriman }}</p>
    @endforeach

</body>

</html>