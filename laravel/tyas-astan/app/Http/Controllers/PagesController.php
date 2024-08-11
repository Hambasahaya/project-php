<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class PagesController extends Controller
{
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('pages.dashboard', $data);
    }

    public function sltm()
    {
        ini_set('max_execution_time', 380);
        $getdata2 = Http::timeout(380)->get('https://ml-tyas-iy4tceycdq-uc.a.run.app/predict_7_days');
        $data_prediksi7 = $getdata2->json();
        $data = [
            'title' => 'Harga prediksi saham dengan mode LSTM',
            'prediksi_data_7' => $data_prediksi7,
        ];
        return view('pages.sltm', $data);
    }

    public function regresi()
    {
        ini_set('max_execution_time', 380);
        $getdata2 = Http::timeout(380)->get('https://ml-tyas-iy4tceycdq-uc.a.run.app/predict_7_days_linier');
        $data_prediksi7 = $getdata2->json();
        $data = [
            'title' => 'Harga prediksi saham dengan model linier regresion',
            'prediksi_data_7' => $data_prediksi7,
        ];
        return view('pages.regresi', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile',
        ];
        return view('pages.profile', $data);
    }

    public function setting()
    {
    }

    public function support()
    {
    }
    public function test()
    {
    }
}
