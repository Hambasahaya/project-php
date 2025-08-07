<?php

namespace App\Controllers;

class User extends BaseController
{
    public function homepage()
    {
        return view('user/homepage');
    }
}