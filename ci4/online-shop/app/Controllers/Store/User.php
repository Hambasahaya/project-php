<?php

namespace App\Controllers\Store;

use App\Controllers\BaseController;
use App\Models\User as user_login;

class User extends BaseController
{
    protected $user;
    public function __construct()
    {
        $this->user = new user_login();
    }
    public function index()
    {
        return view('page/login');
    }
}
