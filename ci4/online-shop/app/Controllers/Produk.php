<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;
use App\Models\User;

class Produk extends BaseController
{
    protected $produk_models;
    protected $user;
    public function __construct()
    {
        $this->produk_models = new Product;
        $this->user = new User();
    }
    public function index()
    {
    }
    public function singgel_view($id)
    {
        $produk_data = [
            "produk" => $this->produk_models->getdata($id)
        ];
        return view('page/singgle_page', $produk_data);
    }
}
