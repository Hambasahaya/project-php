<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\Produks;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
{

    public function addToCart(Request $request)
    {
        try {
            $product = Produks::findOrFail($request->id_produk);
            if ($product) {
                if ($product->stok <= 0) {
                    return response()->json(['message' => 'Stok Kosong!'], 400);
                }
                $cart = Carts::firstOrNew(
                    ['id_user' => session("user_id"), 'id_produk' => $request->id_produk]
                );

                $cart->qty += 1;
                $cart->subtotal = $cart->qty * $product->harga;
                $cart->save();

                $message = $cart->wasRecentlyCreated
                    ? 'Data berhasil ditambahkan ke keranjang.'
                    : 'Barang berhasil diupdate';
            }
            return response()->json(['message' => $message]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan.', 'error' => $e->getMessage()], 500);
        }
    }

    public function updateQty(Request $request)
    {
        $id_produk = $request->id_produk;
        $qty = $request->qty;
        $cartItem = Carts::with("Produk")->where("id_keranjang", $id_produk)->first();

        if ($cartItem) {
            $cartItem->qty = $qty;
            $cartItem->subtotal = $qty * $cartItem->produk->harga;
            $cartItem->save();

            return response()->json([
                'id_produk' => $id_produk,
                'qty' => $qty,
                'message' => 'Qty berhasil diperbarui.'
            ]);
        } else {
            return response()->json([
                'message' => 'Data keranjang tidak ditemukan.'
            ], 404); // Atau respons lainnya sesuai kebutuhan Anda
        }
    }
}
