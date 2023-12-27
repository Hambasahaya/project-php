<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class LoginRegister extends BaseController
{
    protected $user;
    protected $google;
    public function __construct()
    {
        $this->user = new User();
        $this->google = new Googleclient;
    }
    public function pagelogin()
    {
        $data = [
            "link" => $this->google->getlink()
        ];
        return view("page/login", $data);
    }
    public function pageregister()
    {
        return view("page/register");
    }
    public function outhGooggel()
    {
        $this->google->login_proses();
    }
}
