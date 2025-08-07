<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MatakuliahController extends Controller
{
    public function addMatakuliah(Request $request)
    {
        try {
            $validation = $request->validate([
                "nama_matakuliah" => 'required|string',
                "semester" => 'required',
                "foto_matakuliah" => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $path = null;
            if ($request->hasFile('foto_matakuliah')) {
                $path = $request->file('foto_matakuliah')->store('matakuliah', 'public');
            }

            Matakuliah::create([
                "nama_matakuliah" => $validation["nama_matakuliah"],
                "semester" => $validation["semester"],
                "foto_matakuliah" => $path
            ]);

            return back()->with("succes_matakuliah", "Mata Kuliah Berhasil ditambahkan");
        } catch (\Exception $e) {
            return back()->with('fail_matakuliah', $e->getMessage());
        }
    }
    public function updateMatakuliah($id, Request $request)
    {
        try {
            $matakuliah = Matakuliah::find($id);
            if (!$matakuliah) {
                return back()->with("fail_matakuliah", "Data mata kuliah tidak ditemukan");
            }

            $validation = $request->validate([
                "nama_matakuliah" => 'required|string',
                "semester" => 'required',
                "foto_matakuliah" => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            if ($request->hasFile('foto_matakuliah')) {
                if ($matakuliah->foto_matakuliah && Storage::disk('public')->exists($matakuliah->foto_matakuliah)) {
                    Storage::disk('public')->delete($matakuliah->foto_matakuliah);
                }
                $matakuliah->foto_matakuliah = $request->file('foto_matakuliah')->store('matakuliah', 'public');
            }

            $matakuliah->nama_matakuliah = $validation['nama_matakuliah'];
            $matakuliah->semester = $validation["semester"];
            $matakuliah->save();

            return back()->with("succes_matakuliah", "Mata kuliah berhasil diperbarui");
        } catch (\Exception $e) {
            return back()->with("fail_matakuliah", $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $matakuliah = Matakuliah::find($id);
            if (!$matakuliah) {
                return back()->with("fail_matakuliah", "Data mata kuliah tidak ditemukan");
            }

            $kelasTerkait = Kelas::where('mata_kuliah', $id)->exists();
            if ($kelasTerkait) {
                return back()->with("fail_matakuliah", "Tidak bisa menghapus: Mata kuliah sedang digunakan oleh salah satu kelas.");
            }

            if ($matakuliah->foto_matakuliah && Storage::disk('public')->exists($matakuliah->foto_matakuliah)) {
                Storage::disk('public')->delete($matakuliah->foto_matakuliah);
            }

            $matakuliah->delete();
            return back()->with("succes_matakuliah", "Mata kuliah berhasil dihapus.");
        } catch (\Exception $e) {
            return back()->with("fail_matakuliah", $e->getMessage());
        }
    }
}
