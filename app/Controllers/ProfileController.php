<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;
use CodeIgniter\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $session = session();

        if (!$session->has('logged_in')) {
            return redirect()->to('/login');
        }

        $id = $session->get('logged_in');

        $userModel = new UserModel();
        $users = $userModel->find($id);

        return view('profile/profile', ['users' => $users]);
    }
     public function edit()
    {
        $session = session();

        if (!$session->has('logged_in')) {
            return redirect()->to('/login');
        }

        $id = $session->get('logged_in');
        $userModel = new UserModel();
        $users = $userModel->find($id);

        return view('profile/edit_profile', ['users' => $users]);
    }

    public function update()
    {
        $session = session();

        if (!$session->has('logged_in')) {
            return redirect()->to('/login');
        }

        $id = $session->get('logged_in');
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'no_hp'    => $this->request->getPost('no_hp'),
            'email'    => $this->request->getPost('email'),
            'alamat'   => $this->request->getPost('alamat'),
            'kota'     => $this->request->getPost('kota'),
        ];

        $userModel->update($id, $data);

        return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui');
    }

    public function delete()
    {
    $session = session();
    $id = $session->get('logged_in');

    $userModel = new UserModel();

    $userModel->delete($id, true);

    $session->destroy();

    return redirect()->to('/login')->with('success', 'Akun berhasil dihapus permanen.');
    }

}
