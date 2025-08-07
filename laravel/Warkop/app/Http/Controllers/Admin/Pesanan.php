<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoretransaksiRequest;
use App\Http\Requests\UpdatetransaksiRequest;
use Illuminate\Support\Facades\DB;

class Pesanan extends Controller
{

    public function index()
    {
        // Ambil data pesanan beserta cart dan user
        $orders = DB::table('pesanan')
            ->join('carts', 'pesanan.id_cart', '=', 'carts.id_cart')
            ->join('users', 'carts.id_user', '=', 'users.id_user')
            ->join('products', 'carts.id_product', '=', 'products.id_product')
            ->select(
                'pesanan.no_pesanan',
                'users.nama as nama_pemesan',
                'pesanan.notes',
                'pesanan.status_pesanan',
                'products.nama_product',
                'carts.qty',
                'carts.sub_total'
            )
            ->get();

        // Mengelompokkan berdasarkan no_pesanan
        $groupedOrders = $orders->groupBy('no_pesanan');

        return view('Pages.AdetailPesanan', compact('groupedOrders'));
    }
}
