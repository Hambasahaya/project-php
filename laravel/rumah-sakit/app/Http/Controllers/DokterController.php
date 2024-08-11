<?php

namespace App\Http\Controllers;

use App\Models\Detail_Resep;
use App\Models\Fasyankes;
use App\Models\Pendaftaranpasient;
use App\Models\Spesialis;
use App\Models\Dokter;
use App\Models\Obat;
use App\Models\RekamMedis;
use App\Models\Resep;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dokterpasient()
    {
        $getdatadokter = Dokter::where("id_user", Auth::user()->id)->first();
        $getdatafasyankes = Fasyankes::where("id", $getdatadokter->id_fasyankes)->first();
        $data = [
            "pasient" => Pendaftaranpasient::with("fasyankes")->with("user")->with('spesialis')->where("id_fasyankes", $getdatafasyankes->id)->get(),
            "rumahsakit" => $getdatafasyankes->id,
            "spesialist" => Spesialis::where("id_rumah_sakit", $getdatafasyankes->id)->get()
        ];
        return view("pages.AdminPasient", $data);
    }
    public function dokteresep()
    {
        $getdatadokter = Dokter::where("id_user", Auth::user()->id)->first();
        $getdatafasyankes = Fasyankes::where("id", $getdatadokter->id_fasyankes)->first();
        $data = [
            "pasient" => Pendaftaranpasient::with("fasyankes")->with("user")->with('spesialis')->where("id_fasyankes", $getdatafasyankes->id)->where("status", "selesai")->get(),
            "rumahsakit" => $getdatafasyankes->id,
            "obat" => Obat::where("id_rumah_sakit", $getdatafasyankes->id)->get()
        ];
        return view("pages.Dokterresepobat", $data);
    }
    public function dokterekam()
    {
        $getdatadokter = Dokter::where("id_user", Auth::user()->id)->first();
        $getdatafasyankes = Fasyankes::where("id", $getdatadokter->id_fasyankes)->first();
        $data = [
            "pasient" => Pendaftaranpasient::with("fasyankes")->with("user")->with('spesialis')->where("id_fasyankes", $getdatafasyankes->id)->where("status", "selesai")->get(),
            "rumahsakit" => $getdatafasyankes->id,
        ];
        return view("pages.Rekammedis", $data);
    }

    public function Addresepobat(Request $request)
    {
        DB::beginTransaction();
        $validate = $request->validate([
            "diagnosa" => "required|min:10",
            "notes" => "required|min:10",
        ]);
        $user = Pendaftaranpasient::where('id_user', $request->id_pasient)->firstOrFail();
        try {
            $resepobat = new Resep();
            $resepobat->id_pendaftaran = $request->id_daftar;
            $resepobat->id_user = $request->id_pasient;
            $resepobat->id_dokter = Auth::user()->id;
            $resepobat->diagnosa = $validate["diagnosa"];
            $resepobat->notes = $validate["notes"];

            if ($resepobat->save()) {
                for ($i = 0; $i < count($request->data_obat); $i++) {
                    $detail_resep = new Detail_Resep();
                    $detail_resep->id_resep = $resepobat->id;
                    $detail_resep->id_obat = $request->data_obat[$i];
                    $detail_resep->save();
                }
                $user->resep = "sudah dibuat";
                $user->save();
                DB::commit();
                return back()->with("sukes_obat", "berhasil membuat resep obat untuk pasient");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("gagal_obat", "gagal membuat resep obat untuk pasient");
        }
    }


    public function updresepobat(Request $request)
    {
        DB::beginTransaction();
        $validate = $request->validate([
            "diagnosa" => "required|min:10",
            "notes" => "required|min:10",
        ]);

        try {
            $resepobat = Resep::where('id_user', $request->id_pasient)->firstOrFail();
            $resepobat->id_pendaftaran = $request->id_daftar;
            $resepobat->id_user = $request->id_pasient;
            $resepobat->id_dokter = Auth::user()->id;
            $resepobat->diagnosa = $validate["diagnosa"];
            $resepobat->notes = $validate["notes"];

            if ($resepobat->save()) {
                Detail_Resep::where('id_resep', $resepobat->id)->delete();
                for ($i = 0; $i < count($request->data_obat); $i++) {
                    $detail_resep = new Detail_Resep();
                    $detail_resep->id_resep = $resepobat->id;
                    $detail_resep->id_obat = $request->data_obat[$i];
                    $detail_resep->save();
                }
                DB::commit();
                return back()->with("sukes_obat", "berhasil update data resep obat untuk pasient");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("gagal_obat", "gagal udpate data resep obat untuk pasient");
        }
    }

    public function Addrekamedis(Request $request)
    {
        DB::beginTransaction();
        $validate = $request->validate([
            "diagnosa_awal" => "required|min:10",
            "diagnosa_akhir" => "required|min:10",
            "pengobatan_dijalani" => "required|min:10",
        ]);
        $user = Pendaftaranpasient::where('id_user', $request->id_pasient)->firstOrFail();
        try {
            $resepobat = new RekamMedis();
            $resepobat->id_paseint = $request->id_pasient;
            $resepobat->dokter = Auth::user()->id;
            $resepobat->fasyankes = $user->id_fasyankes;
            $resepobat->diagnosa_awal = $validate["diagnosa_awal"];
            $resepobat->diagnosa_akhir = $validate["diagnosa_akhir"];
            $resepobat->pengobatan_dijalani = $validate["pengobatan_dijalani"];
            if ($resepobat->save()) {
                $user->rekam_medis = "rekam_medis_dibuat";
                $user->save();
                DB::commit();
                return back()->with("sukes_rekam", "berhasil membuat rekam medis untuk pasient");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            // return back()->with("gagal_rekam", "gagal membuat rekam_medis untuk pasient");
            dd($e->getMessage());
        }
    }
}
