<?php

namespace App\Controllers\Login;

use App\Controllers\BaseController;
use App\Models\User;
use Config\Services;
use Google_Client;

class Login extends BaseController
{
    protected $google_service;
    protected $user;
    protected $has_pw;
    protected $data_user = [];
    protected $sesion;
    public function __construct()
    {
        $this->google_service = new Google_Client();
        $this->google_service->setClientId('1064019511830-7j820chkmcn3a3npetk1rfoo6pm0fef1.apps.googleusercontent.com');
        $this->google_service->setClientSecret('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');
        $this->google_service->setRedirectUri('http://localhost:8080/proses');
        $this->google_service->addScope('email');
        $this->google_service->addScope('profile');
        $this->user = new User();
    }

    public function index()
    {
        $link_login['link'] = $this->google_service->createAuthUrl();
        return view('page/login_page', $link_login);
    }

    //proses melakukan login
    public function login_proses()
    {
        $token = $this->google_service->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if (!isset($token['error'])) {
            $this->google_service->setAccessToken($token['access_token']);
            $google_service = new \Google_Service_Oauth2($this->google_service);
            $data = $google_service->userinfo->get();
            if ($this->data_user = $this->user->where('email', $data['email'])->findAll()) {
                $this->session->set('login', true);
                $this->session->set('id_user', $this->data_user[0]['id_user']);
                return redirect()->to('/');
            } else {
                $this->data_user = [
                    "nama" => $data['name'],
                    'password' => rand(),
                    'email' => $data["email"],
                    "no_phone" => '',
                    "addres" => "",
                    "photo" => $data['picture'],
                    "role" => 2
                ];
                if ($this->user->save($this->data_user)) {
                    if ($this->data_user = $this->user->where('email', $data['email'])->findAll());
                    $this->session->set('login', true);
                    $this->session->set('id_user', $this->data_user[0]['id_user']);
                    return redirect()->to('/');
                } else {
                    return redirect()->to('/login');
                }
            }
        }
    }

    public function loginform()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        if ($this->user->where('email', $email)->findAll()) {
            if ($this->data_user = $this->user->where('password', $password)->findAll()) {
                $this->session->set('login', true);
                $this->session->set('id_user', $this->data_user[0]['id_user']);
                return redirect()->to('/');
            } else {
                $this->session->set('pass', "email atau password anda salah!");
                return redirect()->to('/login');
            }
        } else {
            $this->session->set('pas', "email atau passwwor anda salah!");
            return redirect()->to('/login');
        }
    }
    public function Logout()
    {
        $id_user_to_logout = $this->session->id_user;
        if (!empty($id_user_to_logout)) {
            $stored_id_user = $this->session->get('id_user');

            if ($id_user_to_logout == $stored_id_user) {
                $this->session->set('login', false);
                $this->session->remove('id_user');
                return redirect()->to('/login');
            } else {
                echo "Gagal: ID User tidak sesuai";
            }
        } else {
            echo "Gagal: Parameter ID User tidak ditemukan";
        }
    }
}
