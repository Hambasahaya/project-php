<?php


namespace App\Controllers\Store;


use App\Controllers\BaseController;

use App\Models\Produk_Model;

class Produk extends BaseController
{
    protected $produk;
    public function __construct()
    {

        $this->produk = new Produk_Model();
    }

    public function index()
    {
        $data = [
            "title" => "produk",
            "data_produk" => $this->produk->findAll()
        ];
        return view('page/produk', $data);
    }
    public function detail_produk()
    {
    }
}
