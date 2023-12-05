<?php

namespace App\Controllers;

use App\Models\Fakultas;
use App\Models\Jurusan;

class Pages extends BaseController
{
    protected $fakultasModel;
    protected $jurusanModel;
    public function __construct()
    {
        $this->fakultasModel = new Fakultas();
        $this->jurusanModel = new Jurusan();
    }

    public function Getdata($fakultasId)
    {
        try {
            $jurusanData = $this->jurusanModel->where('fakultas', $fakultasId)->findAll();
            return $this->response->setJSON($jurusanData);
        } catch (\Exception $e) {
            log_message('error', 'Pesan kesalahan: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Terjadi kesalahan internal.']);
        }
    }


    public function index()
    {

        $data = [
            "nama_fakultas" => $this->fakultasModel->findAll(),
            "validation" => \Config\Services::validation()
        ];
        return view('page/page', $data);
    }
}
