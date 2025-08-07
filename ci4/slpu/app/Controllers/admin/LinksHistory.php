<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use Myth\Auth\Models\LinkModel;

class LinksHistory extends Controller
{
    public function index()
    {
        $data['title'] = 'Links History';
        $links = new LinkModel();
        $data['links'] = $links->findAll();

        return view('admin/links-history', $data);
    }
}