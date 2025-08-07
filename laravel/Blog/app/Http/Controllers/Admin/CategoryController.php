<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category as ModelsCategory;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CategoryController extends Controller
{
    public function View()
    {
        $dataview = [
            "title" => "Category tabel",
            "dataCategory" => ModelsCategory::all()
        ];
        return view("components.AdminTables", $dataview);
    }
    public function viewUpd($id)
    {
        $dataview = [
            "title" => "Category update",
            "categoryupd" =>  ModelsCategory::find($id)
        ];
        return view("components.updateArtikel", $dataview);
    }
    public function save(Request $request)
    {
        $validated = $request->validate([
            'Category_name' => 'required|unique:artikels,title_artikel|max:200',
        ]);
        try {
            if (ModelsCategory::create($validated)) {
                return back()->with('success', 'Berhasil post artikel');
            }

            return back()->with('error_artikel', 'Gagal menyimpan artikel');
        } catch (\Throwable $e) {
            // return back()->with('error', $e->getMessage());
            dd($e->getMessage());
        }
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'Category_name' => 'required|unique:artikels,title_artikel|max:200',
        ]);

        $artikel =  ModelsCategory::findOrFail($request->id);
        try {
            if ($artikel->update($validated)) {
                return redirect()->to(route('adminpages.article'))->with('success', 'Artikel berhasil diperbarui');
            }
            return back()->with('error_artikel', 'Gagal memperbarui artikel');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function delete(Request $request)
    {
        $artikel =  ModelsCategory::findOrFail($request->id);

        try {
            if ($artikel->delete()) {
                return redirect()->to(route('adminpages.article'))->with('success', 'Artikel berhasil dihapus');
            }
            return back()->with('error_artikel', 'Gagal menghapus artikel');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function artikeldownload()
    {
        $dataArtikel = ModelsCategory::all();
        $pdf = Pdf::loadView('Layouts.pdf', compact('dataArtikel'));

        return $pdf->download('artikel.pdf');
    }
}
