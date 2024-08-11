@extends("layout.Adminlayout")
@section("contentadmin")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Penjualan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nomor Transaksi</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">No.phone Pembeli</th>
                            <th scope="col">email Pembeli</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Harga Beli</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detail_transaksi as $transaksi)
                        <tr>
                            <td>{{ $transaksi->no_transaksi }}</td>
                            <td>{{ $transaksi->user->Nama_lengkap}}</td>
                            <td>{{ $transaksi->user->email}}</td>
                            <td>{{ $transaksi->user->phone}}</td>
                            <td>{{ $transaksi->produk->nama_produk}}</td>
                            <td>{{ $transaksi->qty}}</td>
                            <td>Rp.{{ number_format($transaksi->harga) }}</td>
                            <td>Rp.{{number_format ($transaksi->subtotal) }}</td>
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