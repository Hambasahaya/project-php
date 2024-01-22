<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Optionvote;
use App\Models\Users;
use App\Models\Vote;
use CodeIgniter\HTTP\ResponseInterface;

class Votee extends BaseController
{
    protected $data_vote = [];
    protected $session;
    protected $vote;
    protected $getdata;
    protected $user;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->getdata = new Optionvote();
        $this->vote = new Vote();
    }

    public function index()
    {
        if (!isset($this->session->nim)) {
            return redirect()->to('/');
        }
        $data = [
            "data_option" => $this->getdata->findAll()
        ];
        return view("page/vote.php", $data);
    }
    public function poling()
    {
        $pol = intval($this->request->getPost('poling'));
        $data_opt = $this->getdata->findAll();
        if (isset($data_opt[0]["id_option"]) == $pol) {
            $this->data_vote = [
                "kategori_voting" => 1,
                "pemilih" => $this->session->nim,
                "vote_to" => intval($pol),
                "point" => 1
            ];
            if ($this->vote->save($this->data_vote)) {
                $this->session->remove("nim");
                return redirect()->to('/selesai');
            } else {
                echo "gagal";
            }
        } else {
            echo "gagal";
        }
    }
}
