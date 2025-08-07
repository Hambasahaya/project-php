<?php

namespace App\Controllers;

use Myth\Auth\Config\Auth as AuthConfig;

class Auth extends BaseController
{
    public function login()
    {
        $config = config(AuthConfig::class);

        return view('auth/login', ['config' => $config]);

        // return view('auth/login');
    }
    // public function attemptLogin()
    // {
    //     $auth = service('authentication');

    //     $credentials = $this->request->getPost(['email', 'password']);

    //     if (!$auth->attempt($credentials)) {
    //         return redirect()->back()->withInput()->with('error', lang('Auth.badAttempt'));
    //     }

    //     $user = $auth->user();

    //     // Redirect based on role
    //     if ($user->inGroup('admin')) {
    //         return redirect()->to('/admin/dashboard');
    //     } else if ($user->inGroup('user')) {
    //         return redirect()->to('/user/homepage');
    //     }

    //     return redirect()->to('/');
    // }
    public function register()
    {
        return view('auth/register');
    }
    public function logout()
    {
        return view('auth/logout');
    }
}
