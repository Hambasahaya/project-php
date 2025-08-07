<?php

namespace App\Http\Controllers\Admin;

use App\Models\Artikels;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ArtikelsController extends Controller
{
    public function View()
    {
        $dataview = [
            "title" => "artikel tabel",
            "dataArtikel" => Artikels::all(),
            "category" => Category::all()
        ];
        return view("components.AdminTables", $dataview);
    }
    public function viewUpd($id)
    {
        $dataview = [
            "title" => "artikel tabel",
            "artikelupd" => Artikels::find($id),
            "category" => Category::all()
        ];
        return view("components.updateArtikel", $dataview);
    }
    public function save(Request $request)
    {
        $validated = $request->validate([
            'title_artikel' => 'required|unique:artikels,title_artikel|max:200',
            'sub_heading' => 'required|unique:artikels,sub_heading|max:200',
            'body_artikel' => 'required',
            'img_artikel' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_category' => 'required'
        ]);
        if ($request->hasFile('img_artikel')) {
            $imagePath = $request->file('img_artikel')->store('images', 'public');
            $validated['img_artikel'] = $imagePath;
        }
        try {
            if (Artikels::create($validated)) {
                return back()->with('success', 'Berhasil post artikel');
            }

            return back()->with('error_artikel', 'Gagal menyimpan artikel');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title_artikel' => 'required|unique:artikels,title_artikel|max:200',
            'sub_heading' => 'required|unique:artikels,sub_heading|max:200',
            'body_artikel' => 'required',
            'img_artikel' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_category' => 'required'
        ]);

        $artikel = Artikels::findOrFail($request->id);
        if ($request->hasFile('img_artikel')) {
            $imagePath = $request->file('img_artikel')->store('images', 'public');
            $validated['img_artikel'] = $imagePath;
        }
        try {
            if ($artikel->update($validated)) {
                return redirect()->to(route('adminpages.article'))->with('success', 'Artikel berhasil diperbarui');
            }

            return back()->with('error_artikel', 'Gagal memperbarui artikel');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }
    public function delete(Request $request)
    {
        $artikel = Artikels::findOrFail($request->id);

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
        $dataArtikel = Artikels::all();
        $pdf = Pdf::loadView('Layouts.pdf', compact('dataArtikel'));

        return $pdf->download('artikel.pdf');
    }
}
