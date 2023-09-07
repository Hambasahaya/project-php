<?php

namespace App\Controllers;

use App\Models\Karyawan_data;
use App\Models\produk;

class kasir extends BaseController
{
    private $penjualan;
    private $data_produk;
    private $cart;
    public function __construct()
    {
        $this->penjualan = new \App\Models\Penjualan();
        $this->data_produk =  new \App\Models\Produk();
        $this->cart = \Config\Services::cart();
    }

    public function index()
    {
        $data = [
            "judul" => "Kasir",
            "dataprd" => $this->data_produk->findAll(),
            "datadibeli" => $this->cart->contents(),
            "total" => $this->cart->total(),
        ];
        echo view("Admin/header", $data);
        echo view("Admin/kasir", $data);
        echo view("Admin/footer");
    }

    public function pesananin()
    {
        date_default_timezone_set("Asia/Jakarta");
        $databarang = $this->request->getVar("prd");
        $jml = $this->request->getVar("jml");
        $nomorpesanan = $this->request->getVar("nomorpesanan");
        //ambil data barang di db berdsarkan idnya
        $data_brg = $this->data_produk->where("id_produk", $databarang)->first();
        //ngakalin

        $this->cart->insert(array(
            'rowid' => $nomorpesanan,
            'id' => $data_brg["id_produk"],
            'qty' => $jml,
            'price' => $data_brg["harga_prd"],
            'name' => $data_brg["nama_prd"],
            'tanggal_pembelian' => date("d-m-Y h:i:sa")

        ));
        session()->setFlashdata("pesanan", "pesanan berhasil ditambahkan");
        return redirect()->to("/Kasir");
    }
    public function clear()
    {
        $this->cart->destroy();
        session()->setFlashdata("kosong", "keranjang telah kosong!");
        return redirect()->to("/Kasir");
    }
    public function hapus()
    {
        $nomorpesanan = $this->request->getVar("row");
        $this->cart->remove($nomorpesanan);
        session()->setFlashdata("hapus", "Data pesanan telah di hapus");
        return redirect()->to("/Kasir");
    }
    public function end()
    {

        $nama_karyawan = $this->request->getVar("nama_karyawan");
        $data = $this->cart->contents();

        foreach ($data as $dataaa) {
            $databeli = array(
                "id_pesanan" => $dataaa["id"],
                "nama_brg" => $dataaa["name"],
                "harga_barang" => $dataaa["price"],
                "jml" => $dataaa["qty"],
                "subtotal" => $dataaa["qty"] * $dataaa["price"],
                "total" => $this->cart->total(),
                "tanggal_pemesanan" => $dataaa["tanggal_pembelian"],
                "nama_staf" => session()->get('nama_karyawan')
            );
            $this->penjualan->save($databeli);
        }
        session()->setFlashdata("end", "Data pesanan telah di proses");
        $this->cart->destroy();
        return redirect()->to("/Kasir");
    }
}
