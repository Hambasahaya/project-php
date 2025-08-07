<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Katgori_laporans;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', compact('laporans'));
    }
    public function AddNewKategory(Request $request)
    {
        $validate = $request->validate([
            "kategori_laporan" => 'required|string'
        ]);
        try {
            if ($validate) {
                Katgori_laporans::create($validate);
                return redirect()->back()->with("sukses_category_add", "Data kategori berhasil ditambahkan");
            }
        } catch (\Exception $e) {
            return redirect()->back()->with("error_category", "Terjadi Kesalahan,Category gagal ditambahkan!");
        }
    }
    public function updStatus(Request $request, $id)
    {
        $status = $request->get('statusLaporan');
        try {
            $updStatus = Laporan::where('id', $id)
                ->first();
            $updStatus->statusLaporan = $status;
            $updStatus->save();
            return response()->json(['sukses' => 'sukses'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
    public function showUpdate(Request $request, $id)
    {
        $data = Katgori_laporans::where('id', $id)->first();
        if ($data) {
            return response()->json([
                'success' => true,
                'kategori' => $data,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ], 404);
        }
    }
    public function updateKategori(Request $request)
    {
        $validate = $request->validate([
            "kategori_laporan" => 'required|string'
        ]);
        if ($validate) {
            try {
                $newKategori = Katgori_laporans::find($request->id);
                $newKategori->kategori_laporan = $validate['kategori_laporan'];
                $newKategori->save();
                return redirect()->back()->with("sukses_kategori", "Sukses Update Data Kategori");
            } catch (\Exception $e) {
                return redirect()->back()->with("gagal_kategori", "Sukses Update Data Kategori");
            }
        }
    }
    public function hapusKategori(Request $request, $id)
    {
        try {
            $datakategori = Katgori_laporans::find($id);
            $datakategori->delete();
            return redirect()->back()->with("sukses_kategori", "Data kataegori berhasil di hapus");
        } catch (\Exception $e) {
            return redirect()->back()->with("gagal_kategori", "Data kataegori gagal di hapus");
        }
    }
}
