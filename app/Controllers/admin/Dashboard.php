<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\MobilModel;
use App\Models\RuteModel;
use App\Models\PesananModel;
use App\Models\UserModel;
use App\Models\SliderModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $mobil = new MobilModel();
        $rute = new RuteModel();
        $pesanan = new PesananModel();
        $slider = new SliderModel();
        $today = date('Y-m-d');

    $pesanan_hari_ini = $pesanan
        ->select('pesanan.*, rute.tujuan AS tujuan, mobil.nama_mobil AS mobil')
        ->join('rute', 'rute.id_rute = pesanan.id_rute')
        ->join('mobil', 'mobil.mobil_id = pesanan.mobil_id')
        ->where('pesanan.tanggal', $today)
        ->findAll();

    $data = [
        'total_mobil'        => $mobil->countAllResults(),
        'total_rute'         => $rute->countAllResults(),
        'total_pesanan'      => $pesanan->countAllResults(),
        'pesanan_bulan'      => $pesanan->PesananBulan(),
        'slider'             => $slider->findAll(),
        'pesanan_hari_ini'   => $pesanan_hari_ini
    ];

    return view('admin/dashboard', $data);
}

    public function dataUser()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        return view('/admin/data_user', ['users' => $users]);
    }

    public function dataPesanan()
    {
        $pesananModel = new PesananModel();
        $data['pesanan'] = $pesananModel->findAll();
        return view('admin/pesan', $data);
    }

    public function editUser($id)
{
    $userModel = new UserModel();
    $auth = service('authorization');

    $user = $userModel->find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'User tidak ditemukan!');
    }

    $groups = $auth->groups();
    $userGroups = $auth->getGroupsForUser($id);

    return view('admin/edit_user', [
        'user' => $user,
        'groups' => $groups,
        'userGroups' => $userGroups
    ]);
}

public function updateUser($id)
{
    $userModel = new UserModel();
    $auth = service('authorization');

    $user = $userModel->find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'User tidak ditemukan');
    }

    $data = [
        'username' => $this->request->getPost('username'),
        'email'    => $this->request->getPost('email'),
    ];

    if ($password = $this->request->getPost('password')) {
        if (!empty($password)) {
            $data['password_hash'] = password_hash($password, PASSWORD_DEFAULT);
        }
    }

    $userModel->update($id, $data);

    $group = $this->request->getPost('group');
    if ($group) {
 
        $auth->removeUserFromAllGroups($id);
        $auth->addUserToGroup($id, $group);
    }

    return redirect()->to('/admin/dataUser')->with('success', 'User berhasil diperbarui!');
}

public function deleteUser($id)
{
    $userModel = new UserModel();
    $auth = service('authorization');

    $user = $userModel->find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'User tidak ditemukan!');
    }

    $auth->removeUserFromAllGroups($id);
    $userModel->delete($id);

    return redirect()->to('/admin/dataUser')->with('success', 'User berhasil dihapus!');
}

public function makeAdmin($id)
{
    $auth = service('authorization');

    if (! $auth->inGroup('admin', $id)) {
        $auth->addUserToGroup($id, 'admin');
    }

    return redirect()->back()->with('success', 'User berhasil jadi admin');
}


public function removeAdmin($id)
{
    $auth = service('authorization');

    if ($auth->inGroup('admin', $id)) {
        $auth->removeUserFromGroup($id, 'admin');
    }

    return redirect()->back()->with('success', 'Role admin dicabut');
}

}
