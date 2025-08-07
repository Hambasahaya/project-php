<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\kategoriProduct;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $dataCategory = kategoriProduct::all();
        return view('Pages.Akategori', compact('dataCategory'));
    }
    public function Addkategori(Request $request)
    {
        $request->validate([
            'kategori_prd' => 'required|string|max:255',
        ]);
        kategoriProduct::create([
            'kategori_prd' => $request->kategori_prd,
        ]);

        return redirect()->route('adminkategori')->with('success', 'kaategori berhasil ditambahkan.');
    }
    public function showkategori($id)
    {
        $product = kategoriProduct::findOrFail($id);
        return response()->json($product);
    }
    public function edit($id)
    {
        $product = kategoriProduct::findOrFail($id);
        return view('products.edit', compact('product'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'kategori_prd' => 'required|string|max:255',
        ]);
        $product = kategoriProduct::findOrFail($request->id);
        $product->update([
            'kategori_prd' => $request->kategori_prd
        ]);

        return redirect()->route('adminkategori')->with('success', 'kaategori berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $product = kategoriProduct::findOrFail($id);
        $product->delete();

        return redirect()->route('adminkategori')->with('success', 'kaategori berhasil dihapus.');
    }
}
