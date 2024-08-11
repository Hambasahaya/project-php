@extends("layout.header")
@section("content")
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="pembelian d-flex flex-column">
    <h5>History Pembelian Barang</h5>
    @foreach($transactions as $no_transaksi => $transaksiGroup)
    <div class="card_pembelian d-flex flex-column">
        <div class="header-page d-flex justify-content-between">
            <h5>Nomor Transaksi: {{ $no_transaksi }}</h5>
        </div>
        <div class="tabel-histori">
            <table class="table">
                <tbody>
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga Beli</th>
                            <th scope="col">Jumlah Beli</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    @foreach($transaksiGroup as $transaksi)
                    <tr>
                        <td><img src="{{ asset('storage/imgPrd/' . $transaksi->produk->foto) }}" alt="Produk" width="50"></td>
                        <td>{{ $transaksi->produk->nama_produk}}</td>
                        <td>{{ number_format($transaksi->harga) }}</td>
                        <td>{{ $transaksi->qty }}</td>
                        <td>Rp.{{ number_format($transaksi->subtotal) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="detail_trk">
                <p>Tanggal Transaksi: {{ $transaksiGroup->first()->detail_transaksi->tgl_transaksi }}</p>
                <p>Alamat Pengiriman Barang: {{ $transaksiGroup->first()->detail_transaksi->alamat_pengiriman }}</p>
                <p>Layanan Pengiriman: {{ $transaksiGroup->first()->detail_transaksi->layanan_pengiriman }}</p>
                <p>Ongkir:Rp. {{ number_format($transaksiGroup->first()->detail_transaksi->biaya_pengiriman) }}</p>
                <p>Total Belanja:Rp. {{ number_format($transaksiGroup->first()->detail_transaksi->total) }}</p>
                <p>Status Pembayaran: {{ $transaksiGroup->first()->detail_transaksi->status_pembayaran }}</p>
                <p>Status Pengiriman: {{ $transaksiGroup->first()->detail_transaksi->status_pengriman }}</p>
            </div>
            <div class="btn-detail d-flex justify-content-between">
                @if($transaksiGroup->first()->detail_transaksi->status_pembayaran=="belum dibayar")
                <a href="https://app.sandbox.midtrans.com/snap/v2/vtweb/{{$transaksiGroup->first()->detail_transaksi->link_pembayaran}}" class="btn btn-success">Bayar Pesanan</a>
                @endif
                <a href="/cetak_struk/{{$no_transaksi}}" class="btn btn-secondary">cetak struk</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection