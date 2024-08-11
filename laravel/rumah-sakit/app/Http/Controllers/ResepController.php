<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Detail_Resep;
use App\Models\DosisObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getresep(Request $request, $id)
    {
        try {
            $getnomorresep = Resep::where("id_user", $id)->first();
            $pasient = Detail_Resep::with("obat")->where("id_resep", $getnomorresep->id)->get();
            if (!$pasient) {
                return response()->json(['error' => 'Pasient not found'], 404);
            }
            return response()->json(["sukses", $pasient], 200);
        } catch (\Exception $e) {
            Log::error('An error occurred in getPasientById method', ['exception' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
