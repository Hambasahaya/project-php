<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use Myth\Auth\Models\UserModel;

class DataUsers extends Controller
{
    public function index()
    {
        $data['title'] = 'Data User';
        $users = new UserModel();
        $data['users'] = $users->findAll();

        return view('admin/data-users', $data);
    }
}