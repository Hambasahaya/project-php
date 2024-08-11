<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produks;
use App\Models\Transaksi;
use App\Models\Detail_transaksi;
use App\Models\Carts;
use DateTime;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class Checkout extends Controller
{
    protected $cartid;
    public function checkout(Request $request)
    {
        $cartdata = json_decode($request->input('selectedProducts'));
        $request->session()->put('cartdata', $cartdata);
        return response()->json(['message' => ''], 200);
    }
    public function chview(Request $request)
    {
        $data_cart = [];
        if ($request->session()->has('cartdata') != null && session('cartdata')) {
            $cartdata = session('cartdata');
            foreach ($cartdata as $item) {
                $data_cart[] = Carts::with('Produk')->where('id_keranjang', intval($item->cartId))->first();
            }
            $data = [
                'data_cart' => $data_cart,
                "totals" => 0
            ];
            if ($data_cart) {
                return view('pages.out', $data);
            }
        } else {
            return redirect()->to('/');
        }
    }

    protected function struksend($adShipping, $total, $priceship, $no_transaksi, $data_beli)
    {
        $dataproduk = [
            "dataprd" => $data_beli,
            "shipping_address" => $adShipping,
            "total" => $total,
            "priceship" => $priceship,
            "no_transaksi" => $no_transaksi
        ];
        $html = view("layout.Receipt", $dataproduk)->render();
        $pdf = PDF::loadHTML($html);
        $pdfPath = 'receipts/receipt_' . $no_transaksi . '.pdf';
        Storage::put('public/' . $pdfPath, $pdf->output());
        return Storage::url($pdfPath);
    }
    private function GetPaymentToken($no_transaksi, $total)
    {
        try {
            \Midtrans\Config::$serverKey = 'SB-Mid-server-3lb5WZJrPb1e9RjBPoNoxc8v';
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;
            $params = array(
                'transaction_details' => array(
                    'order_id' => $no_transaksi,
                    'gross_amount' => $total,
                ),
            );
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return $snapToken;
        } catch (\Exception $e) {
            return false;
        }
    }
    private function generateTransactionNumber()
    {
        return rand();
    }

    public function checkout_proses(Request $request)
    {
        $no_transaksi = $this->generateTransactionNumber();
        $tgl_transaksi = now();
        $cartdata = session('cartdata');

        if (empty($cartdata)) {
            return response()->json(['error' => 'Cart is empty.'], 400);
        }

        $data_cart = [];
        foreach ($cartdata as $item) {
            $data_cart[] = Carts::with('Produk')->where('id_keranjang', intval($item->cartId))->first();
        }

        $kodebayar = $this->GetPaymentToken($no_transaksi, intval($request->total));
        if ($kodebayar !== false) {
            $detail_transaksi = [
                "no_transaksi" => $no_transaksi,
                "tgl_transaksi" => $tgl_transaksi,
                "total" => $request->total,
                "status_pembayaran" => 1,
                "layanan_pengiriman" => $request->shipping,
                "biaya_pengiriman" => $request->shippingv,
                "status_pengiriman" => 1,
                "alamat_pengiriman" => $request->province . ',' . $request->city . ',' . $request->address,
                "link_pembayaran" => $kodebayar
            ];

            DB::beginTransaction();
            try {
                $transaksi_detail = Detail_transaksi::create($detail_transaksi);
                if ($transaksi_detail) {
                    foreach ($data_cart as $chek) {
                        $transaksi = [
                            "no_transaksi" => $no_transaksi,
                            "id_user" => session("user_id"),
                            "id_produk" => $chek->produk->id_produk,
                            "qty" => $chek->qty,
                            "harga" => $chek->produk->harga,
                            "subtotal" => $chek->produk->harga * $chek->qty
                        ];

                        $produk = Produks::where('id_produk', $chek->produk->id_produk)->first();
                        if ($produk) {
                            $produk->stok -= $chek->qty;
                            $produk->save();
                        } else {
                            continue;
                        }

                        if (Carts::destroy($chek->id_keranjang)) {
                            Transaksi::create($transaksi);
                        }
                    }

                    DB::commit();
                    session()->forget("cartdata");
                    $redirectScript = "<script>window.location.href = 'https://app.sandbox.midtrans.com/snap/v2/vtweb/{$kodebayar}';</script>";
                    return response()->json(['redirect' => $redirectScript]);
                } else {
                    dd('Failed to create detail transaksi', $detail_transaksi);
                }
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Transaction failed', ['exception' => $e->getMessage()]);
                dd('Transaction failed', $e->getMessage());
                return response()->json(['error' => 'Transaction failed.'], 500);
            }
        } else {
            return response()->json(['error' => 'Payment token generation failed.'], 500);
        }
    }
}
