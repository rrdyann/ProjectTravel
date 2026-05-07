<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\MobilModel;
use App\Models\RuteModel;
use App\Models\PesananModel;
use App\Models\UserModel;
use App\Models\GroupModel;
class Admin extends BaseController
{
    public function index()
    {
        $mobil = new MobilModel();
        $rute = new RuteModel();
        $pesanan = new PesananModel();

        $data = [
            'total_mobil'   => $mobil->countAllResults(),
            'total_rute'    => $rute->countAllResults(),
            'total_pesanan' => $pesanan->countAllResults(),
        ];
        

        return view('admin/dashboard', $data);
    }
    public function dataUser()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        return view('/admin/data_user', ['users' => $users]);
    }

}