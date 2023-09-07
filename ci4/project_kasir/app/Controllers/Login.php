<?php

namespace App\Controllers;

use App\Models\Karyawan_data;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class Login extends BaseController
{
    private $data;
    public function __construct()
    {
        $this->data = new \App\Models\Karyawan_data();
    }

    public function index()
    {
        if (session()->get('id_user')) {
            // maka redirct ke halaman login
            if (session()->get("level_user") == 1) {
                return redirect()->to('/Admin');
            } elseif (session()->get("level_user") == 2) {
                return redirect()->to('/Admin');
            }
        } else {
            echo view("Admin/Login");
        }
    }

    public function userlog()
    {
        $data_u = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->data->where('username', $username)->first();
        if ($data) {
            if ($data["password"] == $password) {
                if ($data["jabtaan"] == 1 || $data["jabtaan"] == 2) {
                    $data = [
                        "id_user" => $data["id_karyawan"],
                        "nama_karyawan" => $data["nama_karyawan"],
                        "level_user" => $data["jabtaan"],
                        "foto" => $data['foto']
                    ];
                    $data_u->set($data);
                    return redirect()->to("/Admin");
                } elseif ($data["jabtaan"] == 3) {
                    $data = [
                        "id_user" => $data["id_karyawan"],
                        "nama_karyawan" => $data["nama_karyawan"],
                        "level_user" => $data["jabtaan"]
                    ];
                    $data_u->set($data);
                    return redirect()->to("/Home");
                }
            } else {
                session()->setFlashdata("password", "Maaf password anda salah");
                return redirect()->to("/");
            }
        } else {
            session()->setFlashdata("username", "username anda salah!");
            return redirect()->to("/");
        }
    }
    public function Out()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
    public function forgot()
    {
        $session = session();
        $username = $this->request->getVar("user");
        $data = $this->data->where("username", $username)->first();
        if ($data) {
            $data = [
                "id_userlp" => $data["id_karyawan"]
            ];
            $session->set($data);
            return redirect()->to("/Updatepw");
        } else {

            session()->setFlashdata("datano", "maaf, data anda tidak ditemukan harap hubungi pihak owner!");
            return redirect()->to("/");
        }
    }
    public function Newpw()
    {
        echo view("Admin/forgot");
    }
    public function pw($id)
    {
        $data = [
            "id_karyawan" => $id,
            "password" => $this->request->getVar('newpw')
        ];
        $this->data->save($data);
        session()->setFlashdata("new", "silahkan login dengan password yang baru!");
        $session = session();
        $session->destroy();
        return redirect()->to("/");
    }
}
