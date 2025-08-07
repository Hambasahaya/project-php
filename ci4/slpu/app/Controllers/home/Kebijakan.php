<?php

namespace App\Controllers\Home;

use CodeIgniter\Controller;

class Kebijakan extends Controller
{
    public function index()
    {
        return view('home/kebijakan');
    }
}