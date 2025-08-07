<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use Myth\Auth\Models\LoginModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Models\LinkModel;

class Dashboard extends Controller
{
    public function index()
    {
        // $data['title'] = 'Dashboard';
        $auth_logins = new LoginModel();
        $data['auth_logins'] = $auth_logins->where('success', 1)->countAllResults();

        $model = new UserModel();
        $data['users'] = $model->findAll();

        $model = new LinkModel();
        $data['links'] = $model->findAll();

        $userModel = new UserModel();
        $users = $userModel->findAll();

        $unitOrganisasi = array_column($users, 'unit_organisasi');
        $unitKerja = array_column($users, 'unit_kerja');

        $countUnitOrganisasi = array_count_values($unitOrganisasi);
        $countUnitKerja = array_count_values($unitKerja);

        $linkModel = new LinkModel();
        $urlsPerMonth = array_fill_keys([
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ], 0);

        for ($i = 0; $i < 12; $i++) {
            $month = date('Y-m', strtotime(date('Y') . "-$i-01"));
            $monthName = date('F', strtotime($month));
            $urlsPerMonth[$monthName] = $linkModel->where('created_at >=', "$month-01 00:00:00")
                ->where('created_at <', date('Y-m-01 00:00:00', strtotime("+1 month", strtotime($month))))
                ->countAllResults();
        }

        $userPerMonth = array_fill_keys([
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ], 0);

        for ($i = 0; $i < 12; $i++) {
            $month = date('Y-m', strtotime(date('Y') . "-$i-01"));
            $monthName = date('F', strtotime($month));
            $userPerMonth[$monthName] = $userModel->where('created_at >=', "$month-01 00:00:00")
                ->where('created_at <', date('Y-m-01 00:00:00', strtotime("+1 month", strtotime($month))))
                ->countAllResults();
        }

        $data = array_merge($data, [
            'unitOrganisasi' => $unitOrganisasi,
            'unitKerja' => $unitKerja,
            'countUnitOrganisasi' => $countUnitOrganisasi,
            'countUnitKerja' => $countUnitKerja,
            'userPerMonth' => $userPerMonth,
            'urlsPerMonth' => $urlsPerMonth,
        ]);

        return view('admin/index', $data);
    }
}