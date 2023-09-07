<?php

namespace App\Controllers\Store;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "home"
        ];
        return view("page/home", $data);
    }
}
