<?php

namespace App\Controllers;

use Myth\Auth\Config\Auth as AuthConfig;

class Home extends BaseController
{
    // public function index()
    // {
    //     return view('welcome_message');
    // }
    public function index()
    {
        session()->set('isLoggedIn', true);

        return view('home/beranda');
    }
}