<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriTempat;
use App\Models\User;
use App\Models\Place;

class Admin extends BaseController
{
    protected $place;
    protected $user;
    protected $kategori_tempat;
    public function __construct()
    {
        $this->place = new Place();
        $this->user = new User();
        $this->kategori_tempat = new KategoriTempat();
    }
    public function index()
    {
        return view('template/template2');
    }


    public function tambah_data()
    {
        $data = [
            "data_place" => $this->place->join('kategori', 'place.tipe = kategori.id_kategori')->findAll(),
            "kategori" => $this->kategori_tempat->findAll()
        ];
        return view('admin/tambah_data', $data);
    }
    private function tambah_data_proses($data = [])
    {
        return $this->place->save($data);
    }

    public function add_data()
    {
        $gambarData = [];  // inisialisasi array gambarData
        foreach ($this->request->getFiles() as $gambar) {
            if ($gambar->isValid() && !$gambar->hasMoved()) {
                $namaGambar = $gambar->getName() . rand();
                $pathGambar = 'img/foto_tempat/' . $namaGambar;
                $gambar->move(ROOTPATH . 'public/' . $pathGambar);
                $gambarData[] = [
                    'nama' => $namaGambar,
                ];
            }
        }

        $data = [
            "nama" => $this->request->getVar('nama_tempat'),
            "deskripsi" => $this->request->getVar('deskripsi'),
            "harga" => $this->request->getVar('harga'),
            "foto" => $gambarData,
            "jumlah_unit" => $this->request->getVar('jml'),
            "tipe" => intval($this->request->getVar('tipe'))
        ];
        $result = $this->tambah_data_proses($data);

        if ($result) {
            echo "Data berhasil ditambahkan!";
        } else {
            echo "Gagal menambahkan data.";
        }
    }
}
