@extends('Layouts.AdminTemplate')
@section('contentAdmin')
<div class="card mb-4">
    <div class="card-header d-flex flex-row align-items-center">
        <i class="fas fa-table me-2"></i> Daftar Pesanan
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Nama pemesan</th>
                    <th>Nama Poduct</th>
                    <th>Nomor Pemesan</th>
                    <th>Notes</th>
                    <th>Total Pembalian</th>
                    <th>Status Pesanan</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama pemesan</th>
                    <th>Nama Poduct</th>
                    <th>Nomor Pemesan</th>
                    <th>Notes</th>
                    <th>Total Pembalian</th>
                    <th>Status Pesanan</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($groupedOrders as $noPesanan => $group)
                <tr>
                    <td>{{ $noPesanan }}</td>
                    <td>{{ $group[0]->nama_pemesan }}</td> <!-- Mengakses nama pemesan dengan indeks 0 -->
                    <td>
                        @foreach($group as $order)
                        {{ $order->nama_product }} ({{ $order->qty }})<br>
                        @endforeach
                    </td>
                    <td>{{ $group[0]->notes }}</td> <!-- Mengakses notes dengan indeks 0 -->
                    <td>{{ $group[0]->status_pesanan }}</td> <!-- Mengakses status pesanan dengan indeks 0 -->
                    <td>Rp. {{ number_format($group->sum('sub_total')) }}</td> <!-- Total Pembayaran -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endSection