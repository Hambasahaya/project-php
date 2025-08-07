<?php

namespace App\Controllers\User;

use CodeIgniter\Controller;
use App\Models\LinkModel;

class MyUrl extends Controller
{
    public function index()
    {
        $linkModel = new LinkModel();
        $userId = user_id();

        $encryptionFilter = $this->request->getVar('encryption');
        $start_date = $this->request->getGet('start_date');
        $end_date = $this->request->getGet('end_date');

        $data['links'] = $linkModel->getLinksByUserId($userId);
        $data['links'] = $linkModel->getLinksByUserIdAndDate($userId, $start_date, $end_date);
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;

        if ($encryptionFilter === 'encrypted') {
            $data['links'] = $linkModel->getEncryptedLinksByUserIdAndDate($userId, $start_date, $end_date);
        } else {
            $data['links'] = $linkModel->getLinksByUserIdAndDate($userId, $start_date, $end_date);
        }

        return view('user/myurl', $data);
    }
}