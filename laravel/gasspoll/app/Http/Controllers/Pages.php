<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Produks;
use App\Models\kategoriProduk;
use App\Models\Carts;
use App\Models\Transaksi;
use App\Models\UsersModel;
use PhpParser\Builder\Function_;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;


class Pages extends Controller
{
    public function index()
    {
        $data = [
            "data_prd" => Produks::with('kategori')
                ->where('created_at', '>=', Carbon::now()->subDays(7))
                ->get(),
            "kategori" => kategoriProduk::get()
        ];
        return view('pages.Home', $data);
    }

    public function cart()
    {
        $data = [
            "cartdata" => Carts::with("Produk")->get()
        ];
        return view("pages.carts", $data);
    }
    public function delete(Request $request)
    {
        $cartId = $request->input('cart_id');
        Carts::destroy($cartId);
        return redirect('/cart')->with('success', 'Item keranjang berhasil dihapus');
    }
    public function user()
    {
        return view('pages.users');
    }
    public function Productpage()
    {
        $data = [
            "data_prd" => Produks::with('kategori')->get()
        ];
        return view('pages.Product', $data);
    }
    public function Singgleproduct(Request $request)
    {
        $data = [
            "data_prd" => Produks::with('kategori', 'galeri')->where("id_produk", $request->id_produk)->get()
        ];
        return view('Pages.SingglePage', $data);
    }
    public function KategoryProduct(Request $request)
    {
        $data = [
            "data_prd" => Produks::with('kategori')->where("kategori_produk", $request->id_kategori)->get()
        ];
        return view('Pages.Kategoryproduk', $data);
    }
    public function Pembelian()
    {
        $userId = session()->get("user_id");

        $transactions = Transaksi::where('id_user', $userId)
            ->with('Produk')
            ->with("Detail_transaksi")
            ->get()
            ->groupBy('no_transaksi');

        $data = [
            'transactions' => $transactions
        ];

        return view('pages.Pembelian', $data);
    }
    public function cetak(Request $request)
    {

        $transactions = Transaksi::where('no_transaksi', $request->no_transaksi)
            ->with('Produk')
            ->with("Detail_transaksi")
            ->get()
            ->groupBy('no_transaksi');

        $data = [
            'transactions' => $transactions
        ];
        $html = view("layout.Receipt", $data)->render();
        $pdf = PDF::loadHTML($html);
        $pdfFilename = 'receipt_' . now()->format('YmdHis') . '.pdf';
        return $pdf->download($pdfFilename);
    }
    public function detail_user()
    {
        return view('pages.Userupdate');
    }
}
