<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Katgori_laporans;
use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {}

    public function StatusPengaduan()
    {
        return view('pages.user.StatusPengaduan',);
    }

    public function addNewLaporan(Request $request)
    {
        $validated = $request->validate([
            'kategori_laporan' => 'required',
            'bukti_pendukung' => 'nullable|file',
            'link_bukti_pendukung' => 'nullable|regex:/^(https?:\/\/)?(www\.)?(drive\.google\.com)\/[^\s]+$/',
            'deskripsi_laporan' => 'required|string',
            'lokasi_kejadian' => 'required|string',
            'saksi' => 'required|boolean',
            'tanggal_kejadian' => 'required',
        ]);
        try {
            if ($validated) {
                if (empty($request->link_bukti_pendukung) && !$request->hasFile('bukti_pendukung')) {
                    return redirect()->back()->with("laporan_gagal", "Terjadi kesalahan, laporan gagal diajukan! Bukti harus diisi.");
                }
                if ($request->hasFile('bukti_pendukung')) {
                    $filename = time() . '_' . $request->file('bukti_pendukung')->getClientOriginalName();
                    $request->file('bukti_pendukung')->storeAs('Bukti', $filename, 'public');
                    $validated['bukti_laporan'] = $filename;
                }
                if ($request->link_bukti_pendukung != null && !$request->hasFile('bukti_pendukung')) {
                    $validated["bukti_laporan"] = $request->link_bukti_pendukung;
                }
                $validated["id_users"] = Auth::user()->id;
                $validated["tanggal_laporan"] = now();
                $validated["nomor_laporan"] = rand(1000, 9999);
            }
            Laporan::create($validated);
            return redirect()->back()->with("laporan_sukses", "Laporan sukses di ajukan!");
        } catch (\Exception $e) {
            return redirect()->back()->with("laporan_gagal", "Terjadi kesalahan,Laporan gagal di ajukan!");
        }
    }
    public function showUpdate(Request $request)
    {
        $data = Laporan::with('user')->with('kategori')->where('id', $request->query('id'))->first('statusLaporan');
        if ($data->statusLaporan === "diterima") {
            $data = Laporan::with('user')->with('kategori')->where('id', $request->query('id'))->get();
            $kategori = Katgori_laporans::all();
            return view('pages.user.FormLaporan', ['laporans' => $data, 'kategori' => $kategori]);
        }
        return back()->with('update_laporan_gagal', `laporan ini sedang masuk tahap $data`);
    }
    public function UpdateLaporan(Request $request)
    {
        $id_laporan = $request->id_laporan;
        $validated = $request->validate([
            'kategori_laporan' => 'required',
            'bukti_pendukung' => 'nullable|file',
            'link_bukti_pendukung' => 'nullable|regex:/^(https?:\/\/)?(www\.)?(drive\.google\.com)\/[^\s]+$/',
            'deskripsi_laporan' => 'required|string',
            'lokasi_kejadian' => 'required|string',
            'saksi' => 'required|boolean',
            'tanggal_kejadian' => 'required',
        ]);
        try {
            $laporan = Laporan::where('id', $id_laporan)
                ->where('id_users', Auth::user()->id)
                ->firstOrFail();
            if ($laporan) {
                if ($validated) {
                    if (empty($request->link_bukti_pendukung) && !$request->hasFile('bukti_pendukung')) {
                        return redirect()->to(route('statuspengaduan'))->with("update_laporan_gagal", "Terjadi kesalahan, laporan gagal diajukan! Bukti harus diisi.");
                    }
                    if ($request->hasFile('bukti_pendukung')) {
                        $filename = time() . '_' . $request->file('bukti_pendukung')->getClientOriginalName();
                        $request->file('bukti_pendukung')->storeAs('Bukti', $filename, 'public');
                        $validated['bukti_laporan'] = $filename;
                    }
                    if ($request->link_bukti_pendukung != null && !$request->hasFile('bukti_pendukung')) {
                        $validated["bukti_laporan"] = $request->link_bukti_pendukung;
                    }
                    $laporan->update($validated);
                    return redirect()->to(route('statuspengaduan'))->with('success_update_laporan', 'Laporan berhasil diubah');
                }
            }
        } catch (\Exception $e) {
            return redirect()->to(route('update_laporan_gagal'))->with('update_laporan_gagal', 'Laporan gagal diubah');
        }
    }
    public function DeleteLaporan(Request $request)
    {
        $laporan = Laporan::where('id', $request->query('id'))
            ->where('id_users', Auth::user()->id)
            ->firstOrFail();
        $laporan->delete();
        return redirect()->back()->with('success_hapus_laporan', 'Laporan berhasil dihapus');
    }

    public function FormLaporan()
    {
        $data = Katgori_laporans::all();
        return view('pages.user.FormLaporan', ['kategori' => $data]);
    }
}
