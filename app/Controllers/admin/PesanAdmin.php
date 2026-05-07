<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PesananModel;

class PesanAdmin extends BaseController
{
    protected $pesanan;

    public function __construct()
    {
        $this->pesanan = new PesananModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();

        $data['pesan'] = $db->table('pesanan')
            ->select('pesanan.*, rute.asal, rute.tujuan, mobil.nama_mobil')
            ->join('rute', 'rute.id_rute = pesanan.id_rute')
            ->join('mobil', 'mobil.mobil_id = pesanan.mobil_id')
            ->where('pesanan.tanggal >=', date('Y-m-d'))
            ->orderBy('pesanan.tanggal', 'ASC')
            ->get()
            ->getResultArray();

        return view('admin/pesan/index', $data);
    }

    public function edit($id)
    {
        $data['pesan'] = $this->pesanan->find($id);

        $data['rute']  = \Config\Database::connect()->table('rute')->get()->getResultArray();
        $data['mobil'] = \Config\Database::connect()->table('mobil')->get()->getResultArray();

        return view('admin/pesan/edit', $data);
    }

    public function update($id)
    {
        $this->pesanan->update($id, [
            'nama'      => $this->request->getPost('nama'),
            'tanggal'   => $this->request->getPost('tanggal'),
            
            'id_rute'   => $this->request->getPost('id_rute'),
            'mobil_id'  => $this->request->getPost('mobil_id'),

            'kursi'     => $this->request->getPost('kursi'),
            'harga'     => $this->request->getPost('harga'),
        ]);

        return redirect()->to('/admin/pesan')->with('message', 'Pesanan berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $this->pesanan->delete($id);

        return redirect()->to('/admin/pesan')->with('message', 'Pesanan berhasil dihapus!');
    }
}
