<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;

class Singgle extends BaseController
{
    protected $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    public function index($id)
    {
        $data_prdd[] = $this->product->find($id);
        $data = [
            "data_prd" => $data_prdd
        ];
        return view('page/singgle_page', $data);
    }
}
