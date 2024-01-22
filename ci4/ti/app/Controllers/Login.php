<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    protected $data_user = [];
    protected $session;
    protected $usersModels;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->usersModels = new Users();
    }

    public function index()
    {
        if (!isset($this->session->nim)) {
            return view("page/login");
        } else {
            return redirect()->to('/vote');
        }
    }
    protected function fetchDataFromApi($url)
    {
        // Gunakan file_get_contents untuk mengambil data dari API
        $response = @file_get_contents($url);

        if ($response === FALSE) {
            // Tangani kesalahan jika file_get_contents gagal
            return null;
        }

        return $response;
    }

    public function login_proses()
    {
        $nim = $this->request->getPost("nim");
        $apiUrl = 'https://api-frontend.kemdikbud.go.id/hit_mhs/' . $nim;
        $response = $this->fetchDataFromApi($apiUrl);
        $dataArray = json_decode($response, true);
        $data = $this->usersModels->where("nim", $nim)->first();

        if (isset($dataArray["mahasiswa"][0]["text"])) {
            $fix_data = $dataArray["mahasiswa"][0]["text"];
            if (stripos($fix_data, "UNIVERSITAS MERCU BUANA") !== false && stripos($fix_data, "TEKNIK INFORMATIKA") !== false) {
                if (preg_match('/^(.*?)\((\d+)\),.*?Prodi: (.*?)$/', $fix_data, $matches)) {
                    $this->data_user["nim"] = $matches[2];
                    $this->data_user["nama"] = $matches[1];
                    $this->data_user["prodi"] = $matches[3];

                    if ($data !== null) {
                        // Redirect dan hentikan eksekusi selanjutnya
                        return redirect()->to('/selesai');
                    } else {
                        // Insert data dan handle keberhasilan atau kegagalan
                        if ($this->usersModels->insert($this->data_user)) {
                            // Pesan yang memberitahu bahwa insert berhasil
                            echo "Insert berhasil";
                        } else {
                            // Pesan yang memberitahu bahwa insert gagal
                            echo "Insert gagal";
                        }

                        // Setelah insert, jika berhasil, redirect
                        $this->session->set("nim", $matches[2]);
                        return redirect()->to("/vote");
                    }
                }
            } else {
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('/');
        }
    }
}
