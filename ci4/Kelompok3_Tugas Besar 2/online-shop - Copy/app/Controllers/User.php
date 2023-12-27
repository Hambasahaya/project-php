<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User as ModelsUser;
use Google\Service\CloudDeploy\Retry;
use PhpParser\Node\Stmt\Return_;

class User extends BaseController
{
    protected $user;
    public function __construct()
    {
        $this->user = new ModelsUser();
    }
    public function index()
    {
        if (isset($this->session->id_user)) {
            $data_user =
                [
                    "user" => $this->user->find($this->session->id_user)
                ];
            return view('page/user', $data_user);
        } else {
            return redirect()->to('/login');
        }
    }
    protected function update_data_user($data_user = "")
    {
        if ($data_user['newpw'] != null) {
            $userId = $this->session->id_user;
            $user = $this->user->where('id_user', $userId)->first();
            if ($user) {
                $passwordHash = password_hash($data_user['newpw'], PASSWORD_DEFAULT);
                if ($this->user->set("password", $passwordHash)->where('id_user', $userId)->update()) {
                    return redirect()->to('/user');
                } else {
                    return redirect()->to('/user');
                }
            } else {
                return redirect()->to('/login');
            }
        } else {
            // Check if keys exist before accessing them
            if (isset($data_user['name']) && isset($data_user['no_phone']) && isset($data_user['address'])) {
                if ($this->user->set('name', $data_user['name'])->set('no_phone', $data_user['no_phone'])->set('address', $data_user['address'])->where('id_user', $this->session->id_user)->update()) {
                    return redirect()->to('/user');
                } else {
                    return redirect()->to('/user');
                }
            } else {
                // Handle the case where key(s) are missing in $data_user
                return redirect()->to('/user');
            }
        }
    }

    public function user_settings()
    {
        $data_user = [
            "newpw" => $this->request->getPost('newpw'),
            "name" => $this->request->getPost("name"),
            "no_phone" => $this->request->getPost('phone'),
            "address" => $this->request->getPost('address') // Fix the key name here
        ];
        return $this->update_data_user($data_user);
    }
}
