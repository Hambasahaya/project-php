<?php

namespace App\Controllers\User;

use CodeIgniter\Controller;

class Homepage extends Controller
{
    public function index()
    {
        return view('user/homepage');
    }
}
