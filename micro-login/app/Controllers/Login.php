<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

use App\Models\Login_model;

use CodeIgniter\API\ResponseTrait;

class Login extends BaseController
{
    use ResponseTrait;

    protected $user;
    public function __construct()
    {
        $this->user = new Login_model();
    }
    public function Ceklogin()
    {
        $nama_user = $this->request->getPost('nama_user');
        $password = $this->request->getPost('password');

        $user = $this->user->where('nama_user', $nama_user)->where('password', $password)->first();
        if ($user) {
            return $this->respond([
                'message' => 'true'
            ], 200);
        } else {
            return $this->respond([
                'message' => 'Data not found!'
            ], 404);
        }
    }
}
