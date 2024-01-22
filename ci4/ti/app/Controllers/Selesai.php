<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Selesai extends BaseController
{
    public function index()
    {
        return view('page/selesai');
    }
}
