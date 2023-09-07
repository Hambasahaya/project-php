<?php

namespace App\Models;

use CodeIgniter\Model;

class Penjualan extends Model
{
    protected $table      = 'penjualan_barang';
    protected $primaryKey = 'id_penjualan';
    protected $useAutoIncrement = true;
    protected $allowedFields = ["id_pesanan", "nama_brg", "harga_barang", "jml", "subtotal", "total", "tanggal_pemesanan", "nama_staf"];

    public function hitung()
    {
        return $this->db->query("SELECT SUM(total) FROM penjualan_barang")->getResultArray();
    }
}
