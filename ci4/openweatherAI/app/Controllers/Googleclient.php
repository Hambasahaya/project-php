<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use Google\Task\Retryable;
use Google_Client;

class Googleclient extends BaseController
{
    protected $goggle;
    protected $User;
    public function __construct()
    {
        $this->goggle = new Google_Client();
        $this->goggle->setClientId('1064019511830-7j820chkmcn3a3npetk1rfoo6pm0fef1.apps.googleusercontent.com');
        $this->goggle->setClientSecret('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');
        $this->goggle->setRedirectUri('http://localhost:8080/googleapi');
        $this->goggle->addScope('email');
        $this->goggle->addScope('profile');
        $this->User = new User();
    }
    public function getlink()
    {
        return $this->goggle->createAuthUrl();
    }
    public function login_proses()
    {
        $token = $this->goggle->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if (!isset($token['error'])) {
            $this->goggle->setAccessToken($token['access_token']);
            $google_service = new \Google_Service_Oauth2($this->goggle);
            $data = $google_service->userinfo->get();
            if ($data_user = $this->User->where("email", $data["email"])->findAll()) {
                $this->session->set("id_user", $data_user["id_user"]);
                return redirect()->to("/");
            } else {
                $data_user = [
                    "email" => $data["email"],
                    "password" => rand(),
                    "nama" => $data["name"],
                    "jk" => 1,
                    "berat_badan" => 0,
                    "umur" => 0,
                    "tinggi_badan" => 0
                ];
                if ($this->User->save($data_user)) {
                    $newuser = $this->User->where("email", $data["email"])->findAll();
                    $this->session->set("id_user", $newuser[0]['id_user']);
                    return redirect()->to("/");
                }
            }
        }
    }
}
