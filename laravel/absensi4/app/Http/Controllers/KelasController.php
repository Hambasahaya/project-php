<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('dosen')->latest()->get();
        return view('kelas.index', compact('kelas'));
    }
    public function create()
    {
        return view('kelas.create');
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'kode_kelas'     => 'required|string|unique:kelas,kode_kelas',
                'mata_kuliah'    => 'required|exists:matakuliahs,id',
                'ruangan'        => 'required|string|max:10',
                'jam_mulai'      => 'required|date_format:H:i',
                'jam_selesai'    => 'required|date_format:H:i|after_or_equal:jam_mulai',
                'hari'           => 'required|string',
                'dosen_pengampu' => 'required|exists:users,id',
            ]);


            $kelasSama = Kelas::where('hari', $request->hari)
                ->where('ruangan', $request->ruangan)
                ->whereTime('jam_mulai', $request->jam_mulai)
                ->whereTime('jam_selesai', $request->jam_selesai)
                ->exists();

            if ($kelasSama) {
                return redirect()->back()
                    ->with('kelas_fail', 'Kelas pada jam dan hari yang sama sudah tersedia.');
            }
            $uuid = Str::uuid()->toString();
            $qrFileName = 'qrcode_' . time() . '.png';
            $builder = new Builder(
                writer: new PngWriter(),
                writerOptions: [],
                data: $uuid,
                size: 300,
                margin: 10
            );
            $qrResult = $builder->build();
            Storage::disk('public')->put('qrcodes/' . $qrFileName, $qrResult->getString());

            Kelas::create([
                'kode_kelas'     => $request->kode_kelas,
                'mata_kuliah'    => $request->mata_kuliah,
                'ruangan'        => $request->ruangan,
                'jam_mulai'      => $request->jam_mulai,
                'jam_selesai'    => $request->jam_selesai,
                'hari'           => $request->hari,
                'dosen_pengampu' => $request->dosen_pengampu,
                'qrcode'         => $qrFileName,
                'uuid'           => $uuid,
            ]);

            return redirect()->route('adminkelas')->with('success_kelas', 'Data kelas berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('kelas_fail', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'kode_kelas'     => 'required|string|unique:kelas,kode_kelas,' . $id,
                'mata_kuliah'    => 'required|exists:matakuliahs,id',
                'ruangan'        => 'required|string|max:10',
                'jam_mulai'      => 'required|date_format:H:i',
                'jam_selesai'    => 'required|date_format:H:i|after_or_equal:jam_mulai',
                'hari'           => 'required|string',
                'dosen_pengampu' => 'required|exists:users,id',
            ]);
            $kelasSama = Kelas::where('hari', $request->hari)
                ->where('ruangan', $request->ruangan)
                ->whereTime('jam_mulai', $request->jam_mulai)
                ->whereTime('jam_selesai', $request->jam_selesai)
                ->exists();

            if ($kelasSama) {
                return redirect()->back()
                    ->with('kelas_fail', 'Kelas pada jam dan hari yang sama sudah tersedia.');
            }
            $kelas = Kelas::findOrFail($id);

            $kelas->update($request->all());

            return redirect()->route('adminkelas')->with('success_kelas', 'Data kelas berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('kelas_fail', $e->getMessage());
        }
    }



    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('adminkelas')->with('success_kelas', 'Data kelas berhasil dihapus.');
    }



    public function plotingview(Kelas $kelas)
    {
        $mahasiswa = User::where('role', 'mahasiswa')->get();

        $selected = $kelas->mahasiswa->pluck('id')->toArray();

        return view('Pages.Admin.Ploting', compact('kelas', 'mahasiswa', 'selected'));
    }
    public function ploting(Request $request, Kelas $kelas)
    {
        $request->validate([
            'mahasiswa' => 'array',
            'mahasiswa.*' => 'exists:users,id'
        ]);

        $kelas->mahasiswa()->sync($request->mahasiswa);

        return redirect()->route('adminkelas')->with('success_kelas', 'Plotting mahasiswa berhasil disimpan.');
    }

    public function showmhskelas($id)
    {
        $kelas = Kelas::with('mahasiswa')->findOrFail($id);
        return view('Pages.Admin.mhskelas', compact('kelas'));
    }
    public function regenerateQrCode($id)
    {
        try {
            $kelas = Kelas::findOrFail($id);
            if ($kelas->qrcode && Storage::disk('public')->exists('qrcodes/' . $kelas->qrcode)) {
                Storage::disk('public')->delete('qrcodes/' . $kelas->qrcode);
            }
            $uuid = Str::uuid()->toString();
            $qrFileName = 'qrcode_' . time() . '.png';

            $builder = new Builder(
                writer: new PngWriter(),
                writerOptions: [],
                data: $uuid,
                size: 300,
                margin: 10
            );

            $qrResult = $builder->build();
            Storage::disk('public')->put('qrcodes/' . $qrFileName, $qrResult->getString());
            $kelas->uuid = $uuid;
            $kelas->qrcode = $qrFileName;
            $kelas->save();
            return back()->with('success_kelas', 'QR Code berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('fail_kelas', 'Gagal memperbarui QR Code: ' . $e->getMessage());
        }
    }
}
