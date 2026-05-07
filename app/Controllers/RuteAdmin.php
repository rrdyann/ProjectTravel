<?php

namespace App\Controllers;

use App\Models\RuteModel;

class RuteAdmin extends BaseController
{
    protected $RuteModel;

    public function __construct()
    {
        $this->RuteModel = new RuteModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Rute',
            'rute'  => $this->RuteModel->findAll()
        ];

        return view('admin/rute/index', $data);
    }

    public function tambah()
    {
        return view('admin/rute/tambah');
    }

    public function simpan()
    {
        $this->RuteModel->save([
            'asal'          => $this->request->getVar('asal'),
            'tujuan'        => $this->request->getVar('tujuan'),
            'jam_berangkat' => $this->request->getVar('jam_berangkat'),
            'jam_tiba'      => $this->request->getVar('jam_tiba'),
            'harga'         => $this->request->getVar('harga'),
        ]);

        session()->setFlashdata('pesan', 'Rute berhasil ditambahkan');
        return redirect()->to('/admin/rute');
    }

    public function edit($id)
    {
        $data = [
            'rute' => $this->RuteModel->find($id)
        ];

        return view('admin/rute/edit', $data);
    }

    public function update($id)
    {
        $this->RuteModel->update($id, [
            'asal'          => $this->request->getVar('asal'),
            'tujuan'        => $this->request->getVar('tujuan'),
            'jam_berangkat' => $this->request->getVar('jam_berangkat'),
            'jam_tiba'      => $this->request->getVar('jam_tiba'),
            'harga'         => $this->request->getVar('harga'),
        ]);

        session()->setFlashdata('pesan', 'Rute berhasil diperbarui');
        return redirect()->to('/admin/rute');
    }

    public function hapus($id)
    {
        $this->RuteModel->delete($id);
        session()->setFlashdata('pesan', 'Rute berhasil dihapus');
        return redirect()->to('/admin/rute');
    }
    public function indexView()
    {
        $model = new RuteModel();
        $data['rute'] = $model->findAll();

        return view('admin/rute/index', $data);
    }

    public function create()
    {
        return view('admin/rute/create');
    }

    public function store()
    {
        $model = new RuteModel();

        $model->insert([
            'nama_rute' => $this->request->getPost('nama_rute')
        ]);

        return redirect()->to('/admin/rute')->with('msg', 'Rute berhasil ditambahkan');
    }

    public function editView($id)
    {
        $model = new RuteModel();
        $data['rute'] = $model->find($id);

        return view('admin/rute/edit', $data);
    }

    public function updateView($id)
    {
        $model = new RuteModel();

        $model->update($id, [
            'nama_rute' => $this->request->getPost('nama_rute')
        ]);

        return redirect()->to('/admin/rute')->with('msg', 'Berhasil diupdate');
    }

    public function delete($id)
    {
        $model = new RuteModel();
        $model->delete($id);

        return redirect()->to('/admin/rute')->with('msg', 'Rute berhasil dihapus');
    }
}