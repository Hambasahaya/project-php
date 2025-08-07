<?php

namespace App\Controllers;

class Beranda extends BaseController
{
    public function __construct()
    {
        helper('auth');
    }
    public function index()
    {
        return view('home/beranda');
    }
    // public function encrypt()
    // {
    //     $message = "Please meet me";
    //     $config = new \Config\Encryption();

    //     $config->key = "pqlamznx";
    //     $config->driver = "OpenSSL";

    //     $encrypter = service("encrypter", $config);

    //     $encStringValue = $encrypter->encrypt($message);

    //     echo $encrypter->decrypt($encStringValue);
    // }
}