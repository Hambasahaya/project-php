@extends("layout.Adminlayout")
@section("contentadmin")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nomor Transaksi</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Alamat Pengiriman</th>
                            <th scope="col">Layanan Pengiriman</th>
                            <th scope="col">biaya Pengiriman</th>
                            <th scope="col">Status Pengiriman</th>
                            <th scope="col">Total Belanja</th>
                            <th scope="col">Status Pembayaran</th>
                            <th scope="col">Detail Penjualan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detail_transaksi as $transaksi)
                        <tr>
                            <td>{{ $transaksi->No_transaksi }}</td>
                            <td>{{ $transaksi->tgl_transaksi}}</td>
                            <td>{{ $transaksi->alamat_pengiriman}}</td>
                            <td>{{ $transaksi->layanan_pengiriman}}</td>
                            <td>Rp.{{ number_format($transaksi->biaya_pengiriman)}}</td>
                            <td>{{ $transaksi->status_pengriman }}</td>
                            <td>Rp.{{number_format ($transaksi->total) }}</td>
                            <td>{{ $transaksi->status_pembayaran }}</td>
                            <td> <a href="/Detail_transaksi?no_transaksi={{ $transaksi->No_transaksi }}" class="btn btn-primary">Lihat Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<!-- /.container-fluid -->
@endsection