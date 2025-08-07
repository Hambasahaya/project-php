<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\kategoriProduct;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::with('kategoriprd')->get();
        $kategori = kategoriProduct::all();
        return view('Pages.AdetailProduct', compact('products', 'kategori'));
    }
    public function Addprd(Request $request)
    {
        $request->validate([
            'nama_product' => 'required|string|max:255',
            'img_product' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer|min:0',
            'id_kategori' => 'required',
            'price' => 'required|numeric|min:0',
            'desc' => 'required|string',
        ]);
        $imageName = time() . '.' . $request->img_product->extension();
        $request->img_product->move(public_path('images'), $imageName);
        Products::create([
            'nama_product' => $request->nama_product,
            'img_product' => $imageName,
            'stock' => $request->stock,
            'id_kategori' => $request->id_kategori,
            'price' => $request->price,
            'desc' => $request->desc,
        ]);

        return redirect()->route('adminprd')->with('success', 'Produk berhasil ditambahkan.');
    }
    public function show($id)
    {
        $product = Products::findOrFail($id);
        return response()->json($product);
    }
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('products.edit', compact('product'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'nama_product' => 'required|string|max:255',
            'img_product' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer|min:0',
            'id_kategori' => 'required',
            'price' => 'required|numeric|min:0',
            'desc' => 'required|string',
        ]);
        $product = Products::findOrFail($request->id);
        if ($request->hasFile('img_product')) {
            $imageName = time() . '.' . $request->img_product->extension();
            $request->img_product->move(public_path('images'), $imageName);
            $product->img_product = $imageName;
        }
        $product->update([
            'nama_product' => $request->nama_product,
            'stock' => $request->stock,
            'id_kategori' => $request->id_kategori,
            'price' => $request->price,
            'desc' => $request->desc,
        ]);

        return redirect()->route('adminprd')->with('success', 'Produk berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('adminprd')->with('success', 'Produk berhasil dihapus.');
    }
}
