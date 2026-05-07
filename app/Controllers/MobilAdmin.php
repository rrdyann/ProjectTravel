<?php

namespace App\Controllers;

use App\Models\MobilModel;

class MobilAdmin extends BaseController
{
    protected $MobilModel;

    public function __construct()
    {
        $this->MobilModel = new MobilModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Mobil',
            'mobil' => $this->MobilModel->findAll()
        ];

        return view('admin/mobil/index', $data);
    }

    public function tambah()
    {
        return view('admin/mobil/tambah');
    }

    public function simpan()
    {
        $this->MobilModel->save([
            'nama_mobil' => $this->request->getVar('nama_mobil'),
            'gambar'     => $this->request->getVar('gambar'),
            'kapasitas'  => $this->request->getVar('kapasitas'),
        ]);

        session()->setFlashdata('pesan', 'Mobil berhasil ditambahkan');
        return redirect()->to('/admin/mobil');
    }

    public function edit($id)
    {
        $data = [
            'mobil' => $this->MobilModel->find($id)
        ];

        return view('admin/mobil/edit', $data);
    }

    public function update($id)
    {
        $this->MobilModel->update($id, [
            'nama_mobil' => $this->request->getVar('nama_mobil'),
            'gambar'     => $this->request->getVar('gambar'),
            'kapasitas'  => $this->request->getVar('kapasitas'),
        ]);

        session()->setFlashdata('pesan', 'Mobil berhasil diperbarui');
        return redirect()->to('/admin/mobil');
    }

    public function hapus($id)
    {
        $this->MobilModel->delete($id);

        session()->setFlashdata('pesan', 'Mobil berhasil dihapus');
        return redirect()->to('/admin/mobil');
    }
}