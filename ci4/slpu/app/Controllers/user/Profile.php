<?php

namespace App\Controllers\User;

use CodeIgniter\Controller;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Entities\User;

class Profile extends Controller
{
    public function index()
    {
        $users = new UserModel();
        $userId = user()->id;

        $data['users'] = $users->find($userId);

        return view('user/profile', $data);
    }

    public function resetPassword()
    {
        helper(['auth', 'form']);
        $session = session();
        $userModel = new UserModel();

        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if (!is_string($oldPassword) || !is_string($newPassword) || !is_string($confirmPassword)) {
            $session->setFlashdata('error', 'Invalid input data.');
            return redirect()->back();
        }

        $userId = user()->id;
        $user = $userModel->find($userId);

        if (!$user) {
            $session->setFlashdata('error', 'User not found.');
            return redirect()->back();
        }

        if (!password_verify($oldPassword, $user->password_hash)) {
            $session->setFlashdata('error', 'Current password is incorrect.');
            return redirect()->back();
        }

        if ($newPassword !== $confirmPassword) {
            $session->setFlashdata('error', 'New password and confirm password do not match.');
            return redirect()->back();
        }

        $user->password_hash = password_hash($newPassword, PASSWORD_DEFAULT);
        $userModel->save($user);

        $session->setFlashdata('success', 'Password has been updated successfully.');
        return redirect()->back();
    }
}
