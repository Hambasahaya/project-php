<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\pesanan;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        try {

            $product = Products::findOrFail($request->id_produk);
            if ($product->stock <= 0) {
                return response()->json(['message' => 'Stok Kosong!'], 400);
            }
            $cart = Cart::firstOrNew(
                ['id_user' => Auth::user()->id_user, 'id_product' => $request->id_produk]
            );

            $cart->status_pesanan = "cart";
            $cart->qty += 1;
            $cart->sub_total = $cart->qty * $product->price;
            $cart->save();
            $message = $cart->wasRecentlyCreated
                ? 'Data berhasil ditambahkan ke keranjang.'
                : 'Barang berhasil diupdate';

            return response()->json(['message' => $message]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan.', 'error' => $e->getMessage()], 500);
        }
    }
    public function cartview()
    {
        $cart = Cart::with("product")->get();
        return view('pages.Carts', compact('cart'));
    }
    public function updateCart(Request $request)
    {
        // Cari item keranjang berdasarkan user dan produk
        $cartItem = Cart::where('id_user', Auth::user()->id_user)
            ->where('id_product', $request->product_id)
            ->first();

        if ($cartItem) {
            // Perbarui kuantitas dan subtotal
            $cartItem->qty = max($request->quantity, 1); // Pastikan minimal 1
            $cartItem->sub_total = $cartItem->qty * $cartItem->product->price;
            $cartItem->save();

            // Hitung ulang total items dan total price
            $cartItems = Cart::where('id_user', Auth::user()->id_user)->get();
            $totalItems = $cartItems->sum('qty');
            $totalPrice = $cartItems->sum('sub_total');

            return response()->json([
                'success' => true,
                'message' => 'Cart updated successfully',
                'total_items' => $totalItems,
                'total_price' => $totalPrice
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Cart item not found']);
    }
    public function checkout(Request $request)
    {
        // Validasi input dari request
        $validatedData = $request->validate([
            'selected_products' => 'required|array',
            'notes' => 'required|string|max:255',
        ]);

        // Generate nomor pesanan yang unik untuk satu transaksi
        $nomor_pesanan = rand();  // Bisa diganti dengan metode lain untuk hasil lebih unik
        $tanggalPesanan = now();
        $statusPesanan = 'dibuat';
        $notes = $request->notes;
        foreach ($validatedData['selected_products'] as $productId) {
            pesanan::create([
                'id_cart' => $productId,
                'no_pesanan' => $nomor_pesanan,
                'notes' => $notes,
                'tgl_pesanan' => $tanggalPesanan,
                'status_pesanan' => $statusPesanan,
            ]);

            DB::table('carts')
                ->where('id_cart', $productId)
                ->update(['status_pesanan' => 'proses']);
        }
        return response()->json(['success' => true]);
    }
}
