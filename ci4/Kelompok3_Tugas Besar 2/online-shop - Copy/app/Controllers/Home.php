<?php

namespace App\Controllers;

use App\Models\Product;

class Home extends BaseController
{
    protected $produk;
    public function __construct()
    {
        $this->produk = new Product();
    }
    public function index()
    {
        $data = [
            "new_produk" => $this->produk->where('created_at >=', date('Y-m-d', strtotime('-7 days')))->findAll(),
            "new_produk_sum" => $this->produk->where('created_at >=', date('Y-m-d', strtotime('-7 days')))
                ->countAllResults(),
            "kategori_sum" => $this->produk->select('product_category, COUNT(*) as total_kategori')
                ->where('created_at >=', date('Y-m-d', strtotime('-7 days')))
                ->groupBy('product_category')
                ->get()
                ->getRow()
        ];

        return view('page/home', $data);
    }
    // protected $filters = ['auth'];
}
