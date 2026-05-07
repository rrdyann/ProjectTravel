<?php

namespace App\Controllers;

use App\Models\BantuanModel;

class BantuanAdmin extends BaseController
{
    public function index()
    {
        $bantuanModel = new BantuanModel();
        $data['bantuan'] = $bantuanModel->first();

        return view('admin/edit_bantuan', $data);
    }

    public function simpan()
    {
        $bantuanModel = new BantuanModel();

        $bantuan = $bantuanModel->orderBy('id', 'DESC')->first();
        $id = $bantuan['id'] ?? null;

        $bantuanModel->save([
            'id'    => $id,
            'judul' => $this->request->getPost('judul'),
            'isi'   => $this->request->getPost('isi'),
            'claim' => $this->request->getPost('claim'),
        ]);

        return redirect()->to('/admin/edit_bantuan')->with('success', 'Data berhasil disimpan.');
    }
}
