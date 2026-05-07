<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function prosesLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $users = $userModel->where('email', $email)->first();

        if ($users && password_verify($password, $users['password_hash'])) {

            session()->set([
                'logged_in' => $users['id'],
                'role'      => $users['role']
            ]);

            if ($users['role'] === 'admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/profile');
            }

        } else {
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }
}
