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
        $getdat1 = Http::timeout(380)->get('http://127.0.0.1:5000/predict_3_days');
        $getdata2 = Http::timeout(380)->get('http://127.0.0.1:5000/predict_7_days');
        $data_prediksi3 = $getdat1->json();
        $data_prediksi7 = $getdata2->json();
        $data = [
            'title' => 'Harga SLTM',
            'prediksidata3' => $data_prediksi3,
            'prediksi_data_7' => $data_prediksi7,
        ];
        return view('pages.sltm', $data);
    }

    public function regresi()
    {
        ini_set('max_execution_time', 380);
        $getdat1 = Http::timeout(380)->get('http://127.0.0.1:5000/predict_3_days_linier');
        $getdata2 = Http::timeout(380)->get('http://127.0.0.1:5000/predict_7_days_linier');
        $data_prediksi3 = $getdat1->json();
        $data_prediksi7 = $getdata2->json();
        $data = [
            'title' => 'Harga SLTM',
            'prediksidata3' => $data_prediksi3,
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
