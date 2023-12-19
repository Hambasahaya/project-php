<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $getcuaca;
    protected $zonawaktu;
    public function __construct()
    {
        $this->getcuaca = new Apicuacaconfigure();
    }


    public function getZonaWaktu()
    {
        // Mendapatkan data JSON yang dikirimkan oleh fetch
        $postData = $this->request->getJSON();

        // Mendapatkan nilai timeZone dari data JSON
        $timeZone = $postData->timeZone;

        // Lakukan apa pun yang Anda inginkan dengan $timeZone di sini
        // Sebagai contoh, simpan di session atau database
        $this->session->set('userTimeZone', $timeZone);

        // Anda dapat merespon sesuatu jika diperlukan
        return $this->response->setJSON(['message' => 'Zona waktu telah disimpan: ' . $timeZone]);
    }

    public function index()
    {
        $data_cuaca = [
            "perdays" => $this->getcuaca->getweatherdays(),
            "time" => $this->getcuaca->getWeatherTime(),
            "zona_waktu" => $this->session->userTimeZone
        ];
        return view('page/main', $data_cuaca);
    }
}
