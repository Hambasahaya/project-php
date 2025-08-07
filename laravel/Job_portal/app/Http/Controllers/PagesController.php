<?php

namespace App\Http\Controllers;

use App\Models\lowongan_applys;
use App\Models\lowongans;



class PagesController extends Controller
{
    public function kategori($kategori)
    {
        $lowongans = lowongans::whereJsonContains('kategori_lowongan', $kategori)->with('perusahaan')->get();

        return view('pages.jobkategori', ["data_lowongan" => $lowongans]);
    }
}
