<?php

namespace App\Controllers;

use App\Models\Karyawan_data;
use App\Models\produk;
use Dompdf\Dompdf;
use PhpParser\Node\Stmt\Echo_;

class Admin extends BaseController
{
    private $data_karyawan;
    private $data_prd;
    private $pdf;
    private $penjulan;
    public function __construct()
    {
        $this->data_karyawan = new \App\Models\Karyawan_data();
        $this->data_prd = new \App\Models\Produk();
        $this->pdf = new Dompdf();
        $this->penjulan = new \App\Models\Penjualan();
    }
    public function index()
    {
        $data = [
            "judul" => "Admin"
        ];
        $admin = [
            "total_pendapatan" => $this->penjulan->hitung()
        ];
        echo view("Admin/header", $data);
        echo view("Admin/index", $admin);
        echo view("Admin/footer");
    }

    public function Karyawan()
    {
        $datakaryawan = $this->data_karyawan->join("jabatan", "jabatan.id_jabatan=karyawan.jabtaan", "inner")->where("jabtaan >", 1)->findAll();
        $data = [
            "judul" => "Daftar Karyawan",
            "dataker" => $datakaryawan
        ];
        echo view("Admin/header", $data);
        echo view("Admin/table_karyawan", $data);
        echo view("Admin/footer");
    }
    public function Hapus($id)
    {
        $data = $this->data_karyawan->find($id);
        if ($data["foto"] != "icond.png") {
            unlink('img/userIMG/' . $data["foto"]);
        }
        $this->data_karyawan->delete($id);
        session()->setFlashdata("hapus", "data sudah di hapus");
        return redirect()->to("/Admin/Karyawan");
    }
    public function tambahdata()
    {
        if (!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,10284]'
            ]
        ]));

        $datagambar = $this->request->getFile('foto');
        if ($datagambar->getError() == 4) {
            $nama_file = "icond.png";
        } else {
            $datagambar->move("img/userIMG/");
            $nama_file = $datagambar->getName();
        }
        $this->data_karyawan->save([
            "nama_karyawan" => htmlspecialchars($this->request->getVar('nama')),
            "alamat" => htmlspecialchars($this->request->getVar('alamat')),
            "username" => htmlspecialchars($this->request->getVar('username')),
            "password" => htmlspecialchars($this->request->getVar('pass')),
            "no_tlp" => $this->request->getVar('no'),
            "jabtaan" => $this->request->getVar('jabatan'),
            "foto" => $nama_file
        ]);
        session()->setFlashdata("tambah", "data karyawan behasil di tambahkan");
        return redirect()->to("/Admin/Karyawan");
    }
    public function edit($id)
    {
        $datay = $this->data_karyawan->join("jabatan", "jabatan.id_jabatan=karyawan.jabtaan", "inner")->where("id_karyawan", $id)->first();
        $data = [
            "judul" => "Edit data",
            "dataker" => $datay
        ];
        echo view("Admin/header", $data);
        echo view("Admin/Form_edit", $data);
        echo view("Admin/footer");
    }
    public function update($id)
    {
        $datagambar = $this->request->getFile('foto');
        if ($datagambar->getError() == 4) {
            $nama_file = $this->request->getVar("foto");
        } else {
            $datagambar->move("img/userIMG");
            $nama_file = $datagambar->getName();
        }
        $this->data_karyawan->save([
            "id_karyawan" => $id,
            "nama_karyawan" => $this->request->getVar('nama'),
            "alamat" => $this->request->getVar('alamat'),
            "username" => $this->request->getVar('username'),
            "password" => $this->request->getVar('pass'),
            "no_tlp" => $this->request->getVar('no'),
            "jabtaan" => $this->request->getVar('jabatan'),
            "foto" => $nama_file
        ]);
        session()->setFlashdata("update", "data karyawan behasil di ubah");
        return redirect()->to("/Admin/Karyawan");
    }
    // produk

    public function Produk()
    {
        $data = [
            "judul" => "produk",
            "dataprd" => $this->data_prd->findAll()
        ];
        echo view("Admin/header", $data);
        echo view("Admin/table_produk", $data);
        echo view("Admin/footer");
    }
    public function addprd()
    {
        $this->data_prd->save([
            "nama_prd" => $this->request->getVar('nama'),
            "harga_prd" => $this->request->getVar('harga'),
            "harga_beli" => $this->request->getVar('beli'),
            "stok" => $this->request->getVar('stok'),
            "supel" => $this->request->getVar('supel'),
        ]);
        session()->setFlashdata("addprd", "produk baru behasil ditambahkan!");
        return redirect()->to("/Admin/Produk");
    }
    public function del($id)
    {
        $this->data_prd->delete($id);
        session()->setFlashdata("delprd", "produk behasil dihapus!");
        return redirect()->to("/Admin/Produk");
    }
    public function updateprd($id)
    {
        $data = [
            "judul" => "update",
            "dataprd" => $this->data_prd->find($id)
        ];
        echo view("Admin/header", $data);
        echo view("Admin/form_editprd", $data);
        echo view("Admin/footer");
    }
    public function editprd($id)
    {
        $this->data_prd->save([
            "id_produk" => $id,
            "nama_prd" => $this->request->getVar('nama'),
            "harga_prd" => $this->request->getVar('harga'),
            "stok" => $this->request->getVar('stok'),
            "supel" => $this->request->getVar('supel'),
        ]);
        session()->setFlashdata("editprd", "produk baru behasil ditambahkan!");
        return redirect()->to("/Admin/Produk");
    }
    public function cetakprdview()
    {
        $data = [
            "judul" => "data prodak",
            "dataprd" => $this->data_prd->join("kategori_produk", "kategori_produk.id_kategory=produk.kategory", "inner")->findAll()

        ];
        echo view("Admin/cetak_prd", $data);
    }
    // cetak data()
    public function cetakPrd()
    {
        $filename = date('y-m-d') . '-Data Produk-Toko Faedah Usaha';

        $data = [
            "judul" => "data prodak",
            "dataprd" => $this->data_prd->findAll()

        ];
        $this->pdf->loadHtml(view("Admin/cetak_prd", $data));

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->render();
        $this->pdf->stream($filename);
    }
}
