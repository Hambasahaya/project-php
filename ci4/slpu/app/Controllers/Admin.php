<?php

namespace App\Controllers;

use App\Models\LinkModel;
use App\Controllers\BaseController;
use Myth\Auth\Models\LoginModel;

class Admin extends BaseController
{
    // public function index()
    // {
    //     // Menghitung jumlah login yang sukses
    //     $loginModel = new LoginModel();
    //     $totalLogins = $loginModel->where('success', 1)->countAllResults();

    //     // Mengirim data ke view
    //     $data['total_logins'] = $totalLogins;

    //     return view('dashboard', $data);
    // }

    public function index()
    {
        return view('admin/index');
    }

    // public function add_role()
    // {
    //     log_message('info', 'Attempting to add role to user');

    //     $data = $this->request->getJSON();
    //     $userId = $data->id;
    //     $newRole = $data->role;

    //     $userModel = new \Myth\Auth\Models\UserModel();
    //     $authGroupsModel = new \Myth\Auth\Authorization\GroupModel();

    //     $user = $userModel->find($userId);

    //     if (!$user) {
    //         log_message('error', 'User not found');
    //         return $this->response->setJSON(['success' => false, 'message' => 'User not found']);
    //     }

    //     $authGroupsModel->removeUserFromAllGroups($userId);

    //     if ($authGroupsModel->addUserToGroup($userId, $newRole)) {
    //         log_message('info', 'Role added successfully');
    //         return $this->response->setJSON(['success' => true]);
    //     } else {
    //         log_message('error', 'Failed to add role');
    //         return $this->response->setJSON(['success' => false]);
    //     }
    // }

    public function delete_user()
    {
        log_message('info', 'Attempting to delete user');
        $data = $this->request->getJSON();
        $userId = $data->id;

        $userModel = new \Myth\Auth\Models\UserModel();

        if ($userModel->delete($userId)) {
            log_message('info', 'User deleted successfully');
            return $this->response->setJSON(['success' => true]);
        } else {
            log_message('error', 'Failed to delete user');
            return $this->response->setJSON(['success' => false]);
        }
    }
}