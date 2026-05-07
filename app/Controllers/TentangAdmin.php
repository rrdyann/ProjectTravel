<?php

namespace App\Controllers;

use App\Models\TentangModel;

class TentangAdmin extends BaseController
{
    public function index()
    {
        $tentangModel = new TentangModel();
        $data['tentang'] = $tentangModel->first();

        return view('admin/edit_tentang', $data);
    }

    public function simpan()
{
    $tentangModel = new TentangModel();

    $tentang = $tentangModel->orderBy('id', 'DESC')->first();

    $id = $tentang['id'] ?? null;

    $tentangModel->save([
        'id'      => $id,
        'pembuka' => $this->request->getPost('pembuka'),
        'isi'     => $this->request->getPost('isi'),
        'penutup' => $this->request->getPost('penutup'),
        'claim'   => $this->request->getPost('claim'),
    ]);

    return redirect()->to('/admin/edit_tentang')->with('success', 'Data berhasil disimpan.');
}

}